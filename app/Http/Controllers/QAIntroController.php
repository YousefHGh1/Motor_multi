<?php

namespace App\Http\Controllers;

use App\Models\QAIntro;
use Illuminate\Http\Request;

class QAIntroController extends Controller
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
        $qaintros = QAIntro::paginate(10);
        return view('Q_A.qaintro.index', compact('qaintros'));
    }

    public function create()
    {
        $existingRowsCount = QAIntro::count();

        if ($existingRowsCount > 0) {
            return redirect()->route('qaintro.index')->with('info', 'صفحة الإنشاء غير متاحة حيث يوجد بالفعل بيانات قم بالتعديل عليها');
        }

        return view('Q_A.qaintro.create');
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

        $qaintroData = array_merge($validatedData, $imagePaths);

        $qaintro = QAIntro::create($qaintroData);

        if ($qaintro) {
            return redirect()->route('qaintro.index')->with('success', 'تم الحفظ بنجاح');
        } else {
            return redirect()->route('qaintro.create')->with('warning', 'حدث خطأ أثناء الحفظ');
        }
    }

    public function edit($id)
    {
        $qaintro = QAIntro::find($id);

        return view('Q_A.qaintro.edit', compact('qaintro'));
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
        }

        $validatedData = $request->validate($data);

        $qaintro = QAIntro::find($id);

        if (!$qaintro) {
            return redirect()->route('qaintro.index')->with('warning', 'لم يتم العثور على السلايدر');
        }

        // Update general data
        $qaintro->update($validatedData);

        // Handle image uploads and update the paths in the database
        foreach (['image1'] as $imageKey) {
            $imageFile = $request->file($imageKey);
            $imageName = uniqid() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('file' . $imageKey), $imageName);
            $qaintro->$imageKey = $imageName;
        }

        $qaintro->save();

        return redirect()->route('qaintro.index')->with('success', 'تم التعديل بنجاح');
    }

    public function destroy($id)
    {
        // ابحث عن السلايدر المراد حذفه باستخدام المعرّف
        $qaintro = QAIntro::find($id);

        // التحقق مما إذا كان السلايدر موجودًا قبل الحذف
        if ($qaintro) {
            // قم بحذف السلايدر
            $qaintro->delete();

            return redirect()->route('qaintro.index')->with('danger', 'تمت الحذف بنجاح!');
        } else {
            return redirect()->route('qaintro.index')->with('danger', 'لم يتم العثور على السلايدر المحدد!');
        }
    }
}