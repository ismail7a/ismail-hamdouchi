<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Skill;
use App\Models\Education;
use App\Models\SocialLink;
use App\Models\User;

class ProjectController extends Controller
{


    public function showWelcome()
    {
        $me = \App\Models\User::first();
        $projects = Project::with('images')->latest()->get();
        $skills = Skill::all();
        $user = User::with('experiences')->first();

        $educations = Education::orderBy('start_date', 'desc')->get();
        $socials = SocialLink::all();
        $certificates = \App\Models\Certificate::latest()->get();
        return view('welcome', compact('projects', 'skills', 'educations', 'socials', 'user', 'me', 'certificates'));
    }
    public function Pprojects()
    {
        $projects = Project::with('images')->latest()->get();

        return view('projects', compact('projects'));
    }
    // هادي لي كتفتح الفورم
    public function create()
    {
        $projects = Project::with('images')->latest()->get(); // زدنا هادي
        return view('admin.create', compact('projects'));
    }

    // هادي لي كتحفظ المشروع والتصاور
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // حفظ المشروع
        $project = Project::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'project_link' => $request->project_link,
        ]);

        // حفظ التصاور (الـ 10 لي بغيتي)
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $file) {
                $path = $file->store('projects', 'public');
                $project->images()->create([
                    'image_path' => $path,
                    'is_main' => ($key == 0),
                ]);
            }
        }

        return redirect()->back()->with('success', 'Project added successfully!');
    }

    // ... داخل الكلاس

    public function destroy($id)
    {
        $project = Project::with('images')->findOrFail($id);

        // مسح التصاور من السيرفر (Storage)
        foreach ($project->images as $image) {
            Storage::disk('public')->delete($image->image_path);
        }

        // مسح المشروع (غادي يتمسحو التصاور من الداتابيز أوتوماتيكيا إلا كنتِ دايرة On Delete Cascade)
        $project->delete();

        return redirect()->back()->with('success', 'Project deleted successfully!');
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $project->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'project_link' => $request->project_link,
        ]);

        // إذا زاد تصاور جداد
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('projects', 'public');
                $project->images()->create([
                    'image_path' => $path,
                    'is_main' => false, // أو حددي المنطق لي بغيتي
                ]);
            }
        }

        return redirect()->back()->with('success', 'Project updated successfully!');
    }
}
