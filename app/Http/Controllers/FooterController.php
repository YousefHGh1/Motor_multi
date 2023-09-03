<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
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
        $footers = Footer::paginate(10);
        return view('footer.index', compact('footers'));
    }

    public function create()
    {
        $existingRowsCount = Footer::count();

        if ($existingRowsCount > 0) {
            return redirect()->route('footer.index')->with('info', 'صفحة الإنشاء غير متاحة حيث يوجد بالفعل بيانات قم بالتعديل عليها');
        }

        return view('footer.create');
    }

    public function store(Request $request)
    {
        $validationRules = [
            'image1' => 'required|image',
            'logo' => 'required|image',
            'link1' => 'required|string',
            'link2' => 'required|string',
            'link3' => 'required|string',
            'link4' => 'required|string',
            'link5' => 'required|string',
            'link6' => 'required|string',
            'link7' => 'required|string',
            'link8' => 'required|string',
            'link9' => 'required|string',
        ];

        $languages = config('app.language');

        foreach ($languages as $key => $value) {
            $validationRules[$key . '*.description'] = 'required|string';
            $validationRules[$key . '*.link_down'] = 'required|string';
            $validationRules[$key . '*.link_contact'] = 'required|string';
            $validationRules[$key . '*.address'] = 'required|string';
            $validationRules[$key . '*.allsave'] = 'required|string';
        }

        $validatedData = $request->validate($validationRules);

        $imagePaths = [];

        foreach (['image1', 'logo'] as $imageKey) {
            $imageFile = $request->file($imageKey);
            $imageName = uniqid() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('file' . $imageKey), $imageName);
            $imagePaths[$imageKey] = $imageName;
        }

        $footerData = array_merge($validatedData, $imagePaths);

        $footer = Footer::create($footerData);

        if ($footer) {
            return redirect()->route('footer.index')->with('success', 'تم الحفظ بنجاح');
        } else {
            return redirect()->route('footer.create')->with('warning', 'حدث خطأ أثناء الحفظ');
        }
    }

    public function edit($id)
    {
        $footer = Footer::find($id);

        return view('footer.edit', compact('footer'));
    }

    public function update(Request $request, $id)
    {
        // Validation rules for images and multilingual fields
        $data = [
            'image1' => 'required|image',
            'logo' => 'required|image',
            'link1' => 'required|string',
            'link2' => 'required|string',
            'link3' => 'required|string',
            'link4' => 'required|string',
            'link5' => 'required|string',
            'link6' => 'required|string',
            'link7' => 'required|string',
            'link8' => 'required|string',
            'link9' => 'required|string',
        ];

        foreach (config('app.language') as $key => $value) {
            $validationRules[$key . '*.description'] = 'required|string';
            $validationRules[$key . '*.link_down'] = 'required|string';
            $validationRules[$key . '*.link_contact'] = 'required|string';
            $validationRules[$key . '*.address'] = 'required|string';
            $validationRules[$key . '*.allsave'] = 'required|string';

        }

        $validatedData = $request->validate($data);

        $footer = Footer::find($id);

        if (!$footer) {
            return redirect()->route('footer.index')->with('warning', 'لم يتم العثور على السلايدر');
        }

        // Update general data
        $footer->update($validatedData);

        // Handle image uploads and update the paths in the database
        foreach (['image1', 'logo'] as $imageKey) {
            $imageFile = $request->file($imageKey);
            $imageName = uniqid() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('file' . $imageKey), $imageName);
            $footer->$imageKey = $imageName;
        }

        $footer->save();

        return redirect()->route('footer.index')->with('success', 'تم التعديل بنجاح');
    }

    public function destroy($id)
    {
        // ابحث عن السلايدر المراد حذفه باستخدام المعرّف
        $footer = Footer::find($id);

        // التحقق مما إذا كان السلايدر موجودًا قبل الحذف
        if ($footer) {
            // قم بحذف السلايدر
            $footer->delete();

            return redirect()->route('footer.index')->with('danger', 'تمت الحذف بنجاح!');
        } else {
            return redirect()->route('footer.index')->with('danger', 'لم يتم العثور على السلايدر المحدد!');
        }
    }
}
