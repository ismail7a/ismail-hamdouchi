<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SkillController extends Controller
{
    /**
     * عرض صفحة التحكم في المهارات
     */
    public function create() {
        // كنجيبو كاع المهارات ديال المستخدم اللي داخل دابا
        $skills = Skill::where('user_id', Auth::id())->get();

        return view('admin.skills', compact('skills'));
    }

    /**
     * حفظ مهارة جديدة
     */
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required',
            'picture' => 'required|image|mimes:png,jpg,svg|max:1024',
        ]);

        // حفظ الصورة في المجلد public/skills
        $path = $request->file('picture')->store('skills', 'public');

        Skill::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'picture' => $path,
            'type' => $request->type,
        ]);

        return redirect()->back()->with('success', 'Skill added successfully!');
    }

    /**
     * تحديث مهارة موجودة
     */
    public function update(Request $request, $id) {
        $skill = Skill::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required',
            'picture' => 'nullable|image|mimes:png,jpg,svg|max:1024'
        ]);

        $data = [
            'name' => $request->name,
            'type' => $request->type,
        ];

        // تبديل الصورة القديمة بالجديدة إلا ترفعات
        if ($request->hasFile('picture')) {
            if ($skill->picture) {
                Storage::disk('public')->delete($skill->picture);
            }
            $data['picture'] = $request->file('picture')->store('skills', 'public');
        }

        $skill->update($data);

        return redirect()->back()->with('success', 'Skill updated successfully!');
    }

    /**
     * مسح المهارة
     */
    public function destroy($id) {
        $skill = Skill::findOrFail($id);

        // مسح ملف الصورة من السيرفر
        if ($skill->picture) {
            Storage::disk('public')->delete($skill->picture);
        }

        $skill->delete();

        return redirect()->back()->with('success', 'Skill deleted successfully!');
    }
}
