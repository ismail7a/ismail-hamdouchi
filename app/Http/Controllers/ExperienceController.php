<?php
namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExperienceController extends Controller
{
    // Affiche la liste f l-profile
    public function index()
    {
        $experiences = Auth::user()->experiences;
        return view('welcome', compact('experiences'));
    }

    // Sauvegarder
    public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'company' => 'required|string|max:255',
        'start_date' => 'required|date',
        'end_date' => 'nullable|date',
        'description' => 'nullable|string',
    ]);

    // Tariqa tanya ila b9a mouchkil f l-ula:
    $data['user_id'] = Auth::id();
    Experience::create($data);

    return back()->with('success', 'Experience added successfully!');
}

    // Update (Bla Policy)
    public function update(Request $request, Experience $experience)
    {
        // Check wach had l-experience dyal had l-user li m-connecté
        if ($experience->user_id !== Auth::id()) {
            abort(403, 'Hada machi l-khidma dyalk!');
        }

        $data = $request->validate([
            'name' => 'required|string',
            'company' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'description' => 'nullable',
        ]);

        $experience->update($data);

        return back()->with('success', 'Updated!');
    }

    // Delete
    public function destroy(Experience $experience)
    {
        if ($experience->user_id !== Auth::id()) {
            abort(403);
        }

        $experience->delete();

        return back()->with('success', 'Deleted!');
    }
}
