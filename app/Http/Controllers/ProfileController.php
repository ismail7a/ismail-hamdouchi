<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Education;
use App\Models\User;
use App\Models\SocialLink;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
public function pageEX() {
    // find(1) kat-jbed l-user l-awwal
    $user = User::with(['experiences']);

    return view('welcome', compact('user'));
}

    public function index() {
        $education = Education::where('user_id', Auth::id())->get();
        $socials = SocialLink::where('user_id', Auth::id())->get();
        return view('profile.index', compact('education', 'socials'));
    }

    public function storeEducation(Request $request) {
       $data = $request->validate([
        'school_name' => 'required', // بدلناها من institution لـ school_name
        'degree' => 'required',
        'start_date' => 'required|date',
        'end_date' => 'nullable|date',
        'description' => 'nullable',
    ]);
        $data['user_id'] = Auth::id();
        Education::create($data);
        return back()->with('success', 'Education added!');
    }
public function storeSocial(Request $request) {
    $request->validate([
        'platform' => 'required',
        'url' => 'required|url', // هنا كنتاكدو من الفورم
    ]);

    SocialLink::create([
        'user_id' => Auth::id(),
        'platform' => $request->platform,
        'link' => $request->url, // لاحظ هنا: عطينا قيمة url للحقل link لي كاين فالداتابيز
    ]);

    return back()->with('success', 'Social Link added!');
}

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    // public function update(ProfileUpdateRequest $request): RedirectResponse
    // {
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return Redirect::route('profile.edit')->with('status', 'profile-updated');
    // }
public function update(ProfileUpdateRequest $request): RedirectResponse
{
    $me = $request->user(); //
    $me->fill($request->validated()); //

    if ($request->hasFile('picture')) {
        // 2. Mسi7 tswira l-9dima ila kant
        if ($me->picture && Storage::disk('public')->exists($me->picture)) {
            Storage::disk('public')->delete($me->picture);
        }

        // 3. Khzzen l-jdida f folder 'picture'
        $path = $request->file('picture')->store('picture', 'public');
        $me->picture = $path;
    }

    $me->location = $request->location; //
    $me->save(); //

    return Redirect::route('profile.edit')->with('status', 'profile-updated');
}
    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    // --- الدوال الخاصة بـ Education ---

public function updateEducation(Request $request, $id) {
    $education = Education::where('user_id', Auth::id())->findOrFail($id);

    $data = $request->validate([
        'school_name' => 'required',
        'degree' => 'required',
        'start_date' => 'required|date',
        'end_date' => 'nullable|date',
        'description' => 'nullable',
    ]);

    $education->update($data);
    return back()->with('success', 'Education updated successfully!');
}

public function destroyEducation($id) {
    $education = Education::where('user_id', Auth::id())->findOrFail($id);
    $education->delete();
    return back()->with('success', 'Education deleted!');
}

// --- الدوال الخاصة بـ Social Links ---

public function updateSocial(Request $request, $id) {
    $social = SocialLink::where('user_id', Auth::id())->findOrFail($id);

    $request->validate([
        'platform' => 'required',
        'url' => 'required|url',
    ]);

    $social->update([
        'platform' => $request->platform,
        'link' => $request->url, // ديما ردي البال لاسم الحقل فالداتابيز
    ]);

    return back()->with('success', 'Social Link updated!');
}

public function destroySocial($id) {
    $social = SocialLink::where('user_id', Auth::id())->findOrFail($id);
    $social->delete();
    return back()->with('success', 'Social Link deleted!');
}
}
