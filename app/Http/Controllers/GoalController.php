<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Illuminate\Http\Request;

class GoalController extends Controller
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
        $goals = Goal::paginate(10);
        return view('goal.index', compact('goals'));
    }

    public function create()
    {
        $existingRowsCount = Goal::count();

        if ($existingRowsCount > 0) {
            return redirect()->route('goal.index')->with('info', 'صفحة الإنشاء غير متاحة حيث يوجد بالفعل بيانات قم بالتعديل عليها');
        }

        return view('goal.create');
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

        $goalData = array_merge($validatedData, $imagePaths);

        $goal = Goal::create($goalData);

        if ($goal) {
            return redirect()->route('goal.index')->with('success', 'تم الحفظ بنجاح');
        } else {
            return redirect()->route('goal.create')->with('warning', 'حدث خطأ أثناء الحفظ');
        }
    }

    public function edit($id)
    {
        $goal = Goal::find($id);

        return view('goal.edit', compact('goal'));
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

        $goal = Goal::find($id);

        if (!$goal) {
            return redirect()->route('goal.index')->with('warning', 'لم يتم العثور على السلايدر');
        }

        // Update general data
        $goal->update($validatedData);

        // Handle image uploads and update the paths in the database
        foreach (['image1'] as $imageKey) {
            $imageFile = $request->file($imageKey);
            $imageName = uniqid() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('file' . $imageKey), $imageName);
            $goal->$imageKey = $imageName;
        }

        $goal->save();

        return redirect()->route('goal.index')->with('success', 'تم التعديل بنجاح');
    }

    public function destroy($id)
    {
        // ابحث عن السلايدر المراد حذفه باستخدام المعرّف
        $goal = Goal::find($id);

        // التحقق مما إذا كان السلايدر موجودًا قبل الحذف
        if ($goal) {
            // قم بحذف السلايدر
            $goal->delete();

            return redirect()->route('goal.index')->with('danger', 'تمت الحذف بنجاح!');
        } else {
            return redirect()->route('goal.index')->with('danger', 'لم يتم العثور على السلايدر المحدد!');
        }
    }
}
