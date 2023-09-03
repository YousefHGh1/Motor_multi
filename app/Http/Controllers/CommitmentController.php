<?php

namespace App\Http\Controllers;

use App\Models\Commitment;
use Illuminate\Http\Request;

class CommitmentController extends Controller
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
        $commitments = Commitment::paginate(10);
        return view('commitment.index', compact('commitments'));
    }

    public function create()
    {
        $existingRowsCount = Commitment::count();

        if ($existingRowsCount > 0) {
            return redirect()->route('commitment.index')->with('info', 'صفحة الإنشاء غير متاحة حيث يوجد بالفعل بيانات قم بالتعديل عليها');
        }

        return view('commitment.create');
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

        $commitmentData = array_merge($validatedData, $imagePaths);

        $commitment = Commitment::create($commitmentData);

        if ($commitment) {
            return redirect()->route('commitment.index')->with('success', 'تم الحفظ بنجاح');
        } else {
            return redirect()->route('commitment.create')->with('warning', 'حدث خطأ أثناء الحفظ');
        }
    }

    public function edit($id)
    {
        $commitment = Commitment::find($id);

        return view('commitment.edit', compact('commitment'));
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

        $commitment = Commitment::find($id);

        if (!$commitment) {
            return redirect()->route('commitment.index')->with('warning', 'لم يتم العثور على السلايدر');
        }

        // Update general data
        $commitment->update($validatedData);

        // Handle image uploads and update the paths in the database
        foreach (['image1'] as $imageKey) {
            $imageFile = $request->file($imageKey);
            $imageName = uniqid() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('file' . $imageKey), $imageName);
            $commitment->$imageKey = $imageName;
        }

        $commitment->save();

        return redirect()->route('commitment.index')->with('success', 'تم التعديل بنجاح');
    }

    public function destroy($id)
    {
        // ابحث عن السلايدر المراد حذفه باستخدام المعرّف
        $commitment = Commitment::find($id);

        // التحقق مما إذا كان السلايدر موجودًا قبل الحذف
        if ($commitment) {
            // قم بحذف السلايدر
            $commitment->delete();

            return redirect()->route('commitment.index')->with('danger', 'تمت الحذف بنجاح!');
        } else {
            return redirect()->route('commitment.index')->with('danger', 'لم يتم العثور على السلايدر المحدد!');
        }
    }
}