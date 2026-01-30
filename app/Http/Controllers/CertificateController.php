<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth; // ضروري باش Auth::id() تخدم

class CertificateController extends Controller
{
    // 1. عرض كاع الشهادات في صفحة Welcome (لأي واحد)
    public function index() {
        $certificates = Certificate::latest()->get();
        return view('welcome', compact('certificates'));
    }

    // 2. عرض شهادة واحدة بالتفصيل (لأي واحد)
    public function show(Certificate $certificate) {
        return view('certificates_show', compact('certificate'));
    }

    // 3. صفحة الإدارة (كنجيبو غير الشهادات ديال المستخدم اللي داخل)
    public function manage() {
        // الطريقة اللي اقترحتيها: مباشرة وواضحة
        $certificates = Certificate::where('user_id', Auth::id())->latest()->get();
        return view('certificates', compact('certificates'));
    }

    // 4. إضافة شهادة جديدة
    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = $request->file('image')->store('certificates', 'public');

        Certificate::create([
            'user_id' => Auth::id(), // ربط الشهادة بالمستخدم
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path,
        ]);

        return back()->with('success', 'تمت إضافة الشهادة بنجاح!');
    }

    // 5. صفحة التعديل (Edit)
    public function edit(Certificate $certificate) {
        // حماية: إلا حاول شي حد يدخل لـ ID ماشي ديالو
        if ($certificate->user_id !== Auth::id()) {
            abort(403, 'غير مسموح لك بتعديل هذه الشهادة');
        }
        return view('certificates_edit', compact('certificate'));
    }

    // 6. تحديث البيانات (Update)
    public function update(Request $request, Certificate $certificate) {
        if ($certificate->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $certificate->title = $request->title;
        $certificate->description = $request->description;

        if ($request->hasFile('image')) {
            // مسح التصويرة القديمة من Dossier Storage
            Storage::disk('public')->delete($certificate->image);
            // رفع التصويرة الجديدة
            $certificate->image = $request->file('image')->store('certificates', 'public');
        }

        $certificate->save();

        return redirect()->route('certificates.manage')->with('success', 'تم التحديث بنجاح!');
    }

    // 7. الحذف (Destroy)
    public function destroy(Certificate $certificate) {
        if ($certificate->user_id !== Auth::id()) {
            abort(403);
        }

        // مسح الملف من Storage
        Storage::disk('public')->delete($certificate->image);
        // مسح السجل من Database
        $certificate->delete();

        return back()->with('success', 'تم حذف الشهادة!');
    }
}
