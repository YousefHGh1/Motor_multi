<?php

namespace App\Http\Controllers;

use App\Models\QA;
use Illuminate\Http\Request;

class QAController extends Controller
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
        $qas = QA::paginate(10);
        return view('Q_A.qa.index', compact('qas'));
    }

    public function create()
    {

        return view('Q_A.qa.create');
    }

    public function store(Request $request)
    {
        $validationRules = [
            'image1' => 'required|image',
        ];

        $languages = config('app.language');

        foreach ($languages as $key => $value) {
            $validationRules[$key . '*.question'] = 'required|string';
            $validationRules[$key . '*.answer'] = 'required|string';
        }

        $validatedData = $request->validate($validationRules);

        $imagePaths = [];

        foreach (['image1'] as $imageKey) {
            $imageFile = $request->file($imageKey);
            $imageName = uniqid() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('file' . $imageKey), $imageName);
            $imagePaths[$imageKey] = $imageName;
        }

        $qaData = array_merge($validatedData, $imagePaths);

        $qa = QA::create($qaData);

        if ($qa) {
            return redirect()->route('qa.index')->with('success', 'تم الحفظ بنجاح');
        } else {
            return redirect()->route('qa.create')->with('warning', 'حدث خطأ أثناء الحفظ');
        }
    }

    public function edit($id)
    {
        $qa = QA::find($id);

        return view('Q_A.qa.edit', compact('qa'));
    }

    public function update(Request $request, $id)
    {
        // Validation rules for images and multilingual fields
        $data = [
            'image1' => 'required|image',
        ];

        foreach (config('app.language') as $key => $value) {
            $data[$key . '*.question'] = 'required|string';
            $data[$key . '*.answer'] = 'required|string';
        }

        $validatedData = $request->validate($data);

        $qa = QA::find($id);

        if (!$qa) {
            return redirect()->route('qa.index')->with('warning', 'لم يتم العثور على السلايدر');
        }

        // Update general data
        $qa->update($validatedData);

        // Handle image uploads and update the paths in the database
        foreach (['image1'] as $imageKey) {
            $imageFile = $request->file($imageKey);
            $imageName = uniqid() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('file' . $imageKey), $imageName);
            $qa->$imageKey = $imageName;
        }

        $qa->save();

        return redirect()->route('qa.index')->with('success', 'تم التعديل بنجاح');
    }

    public function destroy($id)
    {
        // ابحث عن السلايدر المراد حذفه باستخدام المعرّف
        $qa = QA::find($id);

        // التحقق مما إذا كان السلايدر موجودًا قبل الحذف
        if ($qa) {
            // قم بحذف السلايدر
            $qa->delete();

            return redirect()->route('qa.index')->with('danger', 'تمت الحذف بنجاح!');
        } else {
            return redirect()->route('qaintro.index')->with('danger', 'لم يتم العثور على السلايدر المحدد!');
        }
    }
}
