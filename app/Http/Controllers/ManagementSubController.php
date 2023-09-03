<?php

namespace App\Http\Controllers;

use App\Models\ManagementSub;
use Illuminate\Http\Request;

class ManagementSubController extends Controller
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
        $submanagements = ManagementSub::paginate(10);
        return view('manage.submanagement.index', compact('submanagements'));
    }

    public function create()
    {
        return view('manage.submanagement.create');
    }

    public function store(Request $request)
    {
        $validationRules = [
            'image1' => 'required|image',
            'logo' => 'required|image',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'link1' => 'required|string',
            'link2' => 'required|string',
        ];

        $languages = config('app.language');

        foreach ($languages as $key => $value) {
            $validationRules[$key . '*.logo_title'] = 'required|string';
            $validationRules[$key . '*.short_title_logo'] = 'required|string';
            $validationRules[$key . '*.long_title_logo'] = 'required|string';
        }

        $validatedData = $request->validate($validationRules);

        $imagePaths = [];

        foreach (['image1', 'logo'] as $imageKey) {
            $imageFile = $request->file($imageKey);
            $imageName = uniqid() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('file' . $imageKey), $imageName);
            $imagePaths[$imageKey] = $imageName;
        }

        $submanagementData = array_merge($validatedData, $imagePaths);

        $submanagement = ManagementSub::create($submanagementData);

        if ($submanagement) {
            return redirect()->route('submanagement.index')->with('success', 'تم الحفظ بنجاح');
        } else {
            return redirect()->route('submanagement.create')->with('warning', 'حدث خطأ أثناء الحفظ');
        }
    }

    public function edit($id)
    {
        $submanagement = ManagementSub::find($id);

        return view('manage.submanagement.edit', compact('submanagement'));
    }

    public function update(Request $request, $id)
    {
        // Validation rules for images and multilingual fields
        $data = [
            'image1' => 'required|image',
            'logo' => 'required|image',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'link1' => 'required|string',
            'link2' => 'required|string'];

        foreach (config('app.language') as $key => $value) {
            $data[$key . '*.logo_title'] = 'required|string';
            $data[$key . '*.short_title_logo'] = 'required|string';
            $data[$key . '*.long_title_logo'] = 'required|string';
        }

        $validatedData = $request->validate($data);

        $submanagement = ManagementSub::find($id);

        if (!$submanagement) {
            return redirect()->route('submanagement.index')->with('warning', 'لم يتم العثور على السلايدر');
        }

        // Update general data
        $submanagement->update($validatedData);

        // Handle image uploads and update the paths in the database
        foreach (['image1', 'logo'] as $imageKey) {
            $imageFile = $request->file($imageKey);
            $imageName = uniqid() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('file' . $imageKey), $imageName);
            $submanagement->$imageKey = $imageName;
        }

        $submanagement->save();

        return redirect()->route('submanagement.index')->with('success', 'تم التعديل بنجاح');
    }

    public function destroy($id)
    {
        // ابحث عن السلايدر المراد حذفه باستخدام المعرّف
        $submanagement = ManagementSub::find($id);

        // التحقق مما إذا كان السلايدر موجودًا قبل الحذف
        if ($submanagement) {
            // قم بحذف السلايدر
            $submanagement->delete();

            return redirect()->route('submanagement.index')->with('danger', 'تمت الحذف بنجاح!');
        } else {
            return redirect()->route('subsubmanagement.index')->with('danger', 'لم يتم العثور على السلايدر المحدد!');
        }
    }
}