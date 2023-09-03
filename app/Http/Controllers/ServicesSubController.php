<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use App\Models\ManagementSub;
use App\Models\QA;
use App\Models\QAIntro;
use App\Models\ServicesSub;
use Illuminate\Http\Request;

class ServicesSubController extends Controller
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
        // $subservices = ServicesSub::get();
        $subservices = ServicesSub::with('managementSub')->get();
        // dd($subservices);

        return view('services.subservices.index', compact('subservices'));

    }

    public function create()
    {
        $management_sub = ManagementSub::get();

        return view('services.subservices.create', compact('management_sub'));
    }

    public function store(Request $request)
    {
        $validationRules = [
            'image1' => 'required|image',
            'logo' => 'required|image',
            'management_sub_id' => 'required',
        ];

        $languages = config('app.language');
        foreach ($languages as $key => $value) {
            $validationRules[$key . '*.logo_title'] = 'required|string';
            $validationRules[$key . '*.short_title_logo'] = 'required|string';
            $validationRules[$key . '*.long_title_logo'] = 'required|string';
        }

        $validatedData = $request->validate($validationRules);
        $validatedData['management_sub_id'] = $request->management_sub_id;
        $imagePaths = [];

        foreach (['image1', 'logo'] as $imageKey) {
            $imageFile = $request->file($imageKey);
            $imageName = uniqid() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('file' . $imageKey), $imageName);
            $imagePaths[$imageKey] = $imageName;
        }

        $subservicesData = array_merge($validatedData, $imagePaths);

        $subservices = ServicesSub::create($subservicesData);

        if ($subservices) {
            return redirect()->route('subservices.index')->with('success', 'تم الحفظ بنجاح');
        } else {
            return redirect()->route('subservices.create')->with('warning', 'حدث خطأ أثناء الحفظ');
        }
    }

    public function show($id)
    {
        $footer = Footer::get();
        $qaintro = QAIntro::get();
        $qas = QA::get();

        $subservices = ServicesSub::findOrFail($id)->with('managementSub')->first();

        return view('homepage.engine',
            compact('subservices', 'footer', 'qaintro', 'qas'));
    }

    public function edit($id)
    {
        $subservices = ServicesSub::findOrFail($id);
        $management_sub = ServicesSub::with('ManagementSub')->get();

        return view('services.subservices.edit', compact('subservices', 'management_sub'));
    }

    public function update(Request $request, $id)
    {
        // Validation rules for images and multilingual fields
        $data = [
            'image1' => 'required|image',
            'logo' => 'required|image',
        ];

        foreach (config('app.language') as $key => $value) {
            $data[$key . '*.logo_title'] = 'required|string';
            $data[$key . '*.short_title_logo'] = 'required|string';
            $data[$key . '*.long_title_logo'] = 'required|string';
            $data[$key . '*.management_sub_id'] = 'required';

        }

        $validatedData = $request->validate($data);

        $subservices = ServicesSub::find($id);

        if (!$subservices) {
            return redirect()->route('subservices.index')->with('warning', 'لم يتم العثور على السلايدر');
        }

        // Update general data
        $subservices->update($validatedData);

        // Handle image uploads and update the paths in the database
        foreach (['image1', 'logo'] as $imageKey) {
            $imageFile = $request->file($imageKey);
            $imageName = uniqid() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('file' . $imageKey), $imageName);
            $subservices->$imageKey = $imageName;
        }

        $subservices->save();

        return redirect()->route('subservices.index')->with('success', 'تم التعديل بنجاح');
    }

    public function destroy($id)
    {
        // ابحث عن السلايدر المراد حذفه باستخدام المعرّف
        $subservices = ServicesSub::find($id);

        // التحقق مما إذا كان السلايدر موجودًا قبل الحذف
        if ($subservices) {
            // قم بحذف السلايدر
            $subservices->delete();

            return redirect()->route('subservices.index')->with('danger', 'تمت الحذف بنجاح!');
        } else {
            return redirect()->route('subservices.index')->with('danger', 'لم يتم العثور على السلايدر المحدد!');
        }
    }
}