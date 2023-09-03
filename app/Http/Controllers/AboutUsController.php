<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
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
        //
        $about_uss = AboutUs::paginate(10);
        return view('about_us.index', compact('about_uss'));
    }

    public function create()
    {
        $existingRowsCount = AboutUs::count();

        if ($existingRowsCount > 0) {
            return redirect()->route('about_us.index')->with('info', 'صفحة الإنشاء غير متاحة حيث يوجد بالفعل بيانات قم بالتعديل عليها');
        }

        return view('about_us.create');
    }

    public function store(Request $request)
    {
        $validationRules = [
            'image1' => 'required',
            'image2' => 'required',
            'image3' => 'required',
        ];

        $languages = config('app.language');

        foreach ($languages as $key => $value) {
            $validationRules[$key . '*.main_title'] = 'required|string';
            $validationRules[$key . '*.description'] = 'required|string';
            $validationRules[$key . '*.address'] = 'required|string';
        }

        $validatedData = $request->validate($validationRules);

        $imagePaths = [];

        foreach (['image1', 'image2', 'image3'] as $imageKey) {
            $imageFile = $request->file($imageKey);
            $imageName = uniqid() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('file' . $imageKey), $imageName);
            $imagePaths[$imageKey] = $imageName;
        }

        $aboutUsData = array_merge($validatedData, $imagePaths);

        $aboutUs = AboutUs::create($aboutUsData);

        if ($aboutUs) {
            return redirect()->route('about_us.index')->with('success', 'تم الحفظ بنجاح');
        } else {
            return redirect()->route('about_us.create')->with('warning', 'حدث خطأ أثناء الحفظ');
        }
    }

    public function edit($id)
    {
        $about_us = AboutUs::find($id);

        return view('about_us.edit', compact('about_us'));
    }

    public function update(Request $request, $id)
    {
        // Validation rules for images and multilingual fields
        $data = [
            'image1' => 'required',
            'image2' => 'required',
            'image3' => 'required',
        ];

        foreach (config('app.language') as $key => $value) {
            $data[$key . '*.main_title'] = 'required|string';
            $data[$key . '*.description'] = 'required|string';
            $data[$key . '*.address'] = 'required|string';
        }

        $validatedData = $request->validate($data);

        $aboutUs = AboutUs::find($id);

        if (!$aboutUs) {
            return redirect()->route('about_us.index')->with('warning', 'لم يتم العثور على السلايدر');
        }

        // Update general data
        $aboutUs->update($validatedData);

        // Handle image uploads and update the paths in the database
        foreach (['image1', 'image2', 'image3'] as $imageKey) {
            $imageFile = $request->file($imageKey);
            $imageName = uniqid() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('file' . $imageKey), $imageName);
            $aboutUs->$imageKey = $imageName;
        }

        $aboutUs->save();

        return redirect()->route('about_us.index')->with('success', 'تم التعديل بنجاح');
    }

    public function destroy($id)
    {
        // ابحث عن السلايدر المراد حذفه باستخدام المعرّف
        $about_us = AboutUs::find($id);

        // التحقق مما إذا كان السلايدر موجودًا قبل الحذف
        if ($about_us) {
            // قم بحذف السلايدر
            $about_us->delete();

            return redirect()->route('about_us.index')->with('danger', 'تمت الحذف بنجاح!');
        } else {
            return redirect()->route('about_us.index')->with('danger', 'لم يتم العثور على السلايدر المحدد!');
        }
    }
}
