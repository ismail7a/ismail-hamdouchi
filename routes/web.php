<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\SkillController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CertificateController;

// --- Routes للناس (Guest) ---
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


// --- Routes ديال Admin (Protected by Auth) ---
Route::middleware(['auth'])->group(function () {

    // عرض كاع الرسائل
    Route::get('/hamdouchi-ismail/messages', [ContactController::class, 'index'])->name('admin.messages');

    // مسح رسالة محددة
    Route::delete('/hamdouchi-ismail/messages/{id}', [ContactController::class, 'destroy'])->name('messages.destroy');

});
// Route::get('/', [CertificateController::class, 'index'])->name('welcome');
Route::get('/certificates/{certificate}/view', [CertificateController::class, 'show'])->name('certificates.show');

// غير المستخدم اللي مسجل (Auth)
Route::middleware(['auth'])->group(function () {
    Route::get('/hamdouchi-ismail/manage-certificates', [CertificateController::class, 'manage'])->name('certificates.manage');
    Route::post('/certificates/store', [CertificateController::class, 'store'])->name('certificates.store');
    Route::get('/certificates/{certificate}/edit', [CertificateController::class, 'edit'])->name('certificates.edit');
    Route::put('/certificates/{certificate}', [CertificateController::class, 'update'])->name('certificates.update');
    Route::delete('/certificates/{certificate}', [CertificateController::class, 'destroy'])->name('certificates.destroy');
});
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/hamdouchi-ismail/skills', [SkillController::class, 'create'])->name('admin.skills');
    Route::post('/skills', [SkillController::class, 'store'])->name('admin.skills.store');
    Route::put('/skills/{id}', [SkillController::class, 'update'])->name('admin.skills.update');
    Route::delete('/skills/{id}', [SkillController::class, 'destroy'])->name('admin.skills.destroy');
});
Route::get('/hamdouchi-ismail', [ProjectController::class, 'showWelcome'])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/hamdouchi-ismail/manage-profil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/hamdouchi-ismail/Edu-Exp/settings', [ProfileController::class, 'index'])->name('admin.profile');
    Route::put('/profile/education/{id}', [ProfileController::class, 'updateEducation'])->name('education.update');
    Route::delete('/profile/education/{id}', [ProfileController::class, 'destroyEducation'])->name('education.destroy');
    Route::post('/profile-settings/education', [ProfileController::class, 'storeEducation'])->name('admin.education.store');

    Route::post('/profile-settings/social', [ProfileController::class, 'storeSocial'])->name('admin.social.store');
    Route::put('/profile/social/{id}', [ProfileController::class, 'updateSocial'])->name('social.update');
    Route::delete('/profile/social/{id}', [ProfileController::class, 'destroySocial'])->name('social.destroy');
    Route::resource('experiences', ExperienceController::class);

    Route::resource('contacts', ContactController::class)->only(['index', 'update', 'destroy']);

    Route::prefix('admin')->group(function () {
        Route::get('/hamdouchi-ismail/projects', [ProjectController::class, 'create'])->name('admin.create');
        Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');

        Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('projects.update');
        Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    });
});

require __DIR__ . '/auth.php';
