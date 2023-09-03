<?php

namespace App\Http\Controllers;

use App\Models\Management;
use Illuminate\Http\Request;

class ManagementController extends Controller
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
        $managements = Management::paginate(10);
        return view('manage.management.index', compact('managements'));
    }

    public function create()
    {
        $existingRowsCount = Management::count();

        if ($existingRowsCount > 0) {
            return redirect()->route('management.index')->with('info', 'صفحة الإنشاء غير متاحة حيث يوجد بالفعل بيانات قم بالتعديل عليها');
        }

        return view('manage.management.create');
    }

    public function store(Request $request)
    {
        $validationRules = [
            'image1' => 'required|image',
        ];

        $languages = config('app.language');

        foreach ($languages as $key => $value) {
            $validationRules[$key . '*.main_title'] = 'required|string';
            $validationRules[$key . '*.description'] = 'required|string';
        }

        $validatedData = $request->validate($validationRules);

        $imagePaths = [];

        foreach (['image1'] as $imageKey) {
            $imageFile = $request->file($imageKey);
            $imageName = uniqid() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('file' . $imageKey), $imageName);
            $imagePaths[$imageKey] = $imageName;
        }

        $managementData = array_merge($validatedData, $imagePaths);

        $management = Management::create($managementData);

        if ($management) {
            return redirect()->route('management.index')->with('success', 'تم الحفظ بنجاح');
        } else {
            return redirect()->route('management.create')->with('warning', 'حدث خطأ أثناء الحفظ');
        }
    }

    public function edit($id)
    {
        $management = Management::find($id);

        return view('manage.management.edit', compact('management'));
    }

    public function update(Request $request, $id)
    {
        // Validation rules for images and multilingual fields
        $data = [
            'image1' => 'required|image',
        ];

        foreach (config('app.language') as $key => $value) {
            $data[$key . '*.main_title'] = 'required|string';
            $data[$key . '*.description'] = 'required|string';
            $data[$key . '*.address'] = 'required|string';
        }

        $validatedData = $request->validate($data);

        $management = Management::find($id);

        if (!$management) {
            return redirect()->route('management.index')->with('warning', 'لم يتم العثور على السلايدر');
        }

        // Update general data
        $management->update($validatedData);

        // Handle image uploads and update the paths in the database
        foreach (['image1'] as $imageKey) {
            $imageFile = $request->file($imageKey);
            $imageName = uniqid() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('file' . $imageKey), $imageName);
            $management->$imageKey = $imageName;
        }

        $management->save();

        return redirect()->route('management.index')->with('success', 'تم التعديل بنجاح');
    }

    public function destroy($id)
    {
        // ابحث عن السلايدر المراد حذفه باستخدام المعرّف
        $management = Management::find($id);

        // التحقق مما إذا كان السلايدر موجودًا قبل الحذف
        if ($management) {
            // قم بحذف السلايدر
            $management->delete();

            return redirect()->route('management.index')->with('danger', 'تمت الحذف بنجاح!');
        } else {
            return redirect()->route('management.index')->with('danger', 'لم يتم العثور على السلايدر المحدد!');
        }
    }
}