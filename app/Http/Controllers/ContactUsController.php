<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:create', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:show', ['only' => ['index', 'show']]);
        $this->middleware('permission:delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $contactuss = ContactUs::paginate(10);
        return view('contactus.index', compact('contactuss'));
    }

    public function create()
    {
        $existingRowsCount = ContactUs::count();

        if ($existingRowsCount > 0) {
            return redirect()->route('contactus.index')->with('info', 'صفحة الإنشاء غير متاحة حيث يوجد بالفعل بيانات قم بالتعديل عليها');
        }

        return view('contactus.create');
    }

    public function store(Request $request)
    {
        $validationRules = [
            'phone1' => 'required|numeric',
            'phone2' => 'required|numeric',
            'email1' => 'required||email',
            'email2' => 'required|email',
        ];

        $languages = config('app.language');

        foreach ($languages as $key => $value) {
            $validationRules[$key . '*.main_title'] = 'required|string';
            $validationRules[$key . '*.description'] = 'required|string';
            $validationRules[$key . '*.address1'] = 'required|string';
            $validationRules[$key . '*.address2'] = 'required|string';
        }

        $validatedData = $request->validate($validationRules);

        $contactus = ContactUs::create($validatedData);

        if ($contactus) {
            return redirect()->route('contactus.index')->with('success', 'تم الحفظ بنجاح');
        } else {
            return redirect()->route('contactus.create')->with('warning', 'حدث خطأ أثناء الحفظ');
        }
    }

    public function edit($id)
    {

        $contactus = ContactUs::find($id);

        return view('contactus.edit', compact('contactus'));
    }

    public function update(Request $request, $id)
    {
        // Validation rules for images and multilingual fields
        $data = [
            'phone1' => 'required|numeric',
            'phone2' => 'required|numeric',
            'email1' => 'required||email',
            'email2' => 'required|email'];

        foreach (config('app.language') as $key => $value) {
            $data[$key . '*.main_title'] = 'required|string';
            $data[$key . '*.description'] = 'required|string';
            $data[$key . '*.address1'] = 'required|string';
            $data[$key . '*.address2'] = 'required|string';

        }

        $validatedData = $request->validate($data);

        $contactus = ContactUs::find($id);

        if (!$contactus) {
            return redirect()->route('contactus.index')->with('warning', 'لم يتم العثور على السلايدر');
        }

        // Update general data
        $contactus->update($validatedData);

        return redirect()->route('contactus.index')->with('success', 'تم التعديل بنجاح');
    }

    public function destroy($id)
    {
        // ابحث عن السلايدر المراد حذفه باستخدام المعرّف
        $contactus = ContactUs::find($id);

        // التحقق مما إذا كان السلايدر موجودًا قبل الحذف
        if ($contactus) {
            // قم بحذف السلايدر
            $contactus->delete();

            return redirect()->route('contactus.index')->with('danger', 'تمت الحذف بنجاح!');
        } else {
            return redirect()->route('contactus.index')->with('danger', 'لم يتم العثور على السلايدر المحدد!');
        }
    }
}
