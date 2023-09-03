<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SliderController extends Controller
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
        $sliders = Slider::paginate(10);
        return view('slider.index', compact('sliders'));
    }


    public function create()
    {
        //
        return view('slider.create');
    }



    public function store(Request $request)
    {
        $data = [
            'logo' => 'required|image|max:2048',
            'background' => 'required|image|max:2048',
            'whatsapp_link' => 'required|string',
            'tiktok_link' => 'required|string',
            'snapcaht_link' => 'required|string',
            'instagram_link' => 'required|string',
            'youtube_link' => 'required|string',
            'maintenance_link' => 'required|string',
            'materials_link' => 'required|string',
        ];

        foreach (config('app.language') as $key => $value) {
            $data[$key . '*.main_title'] = 'required|string';
            $data[$key . '*.description'] = 'required|string';
            $data[$key . '*.maintenance_button'] = 'required|string';
            $data[$key . '*.materials_button'] = 'required|string';
            $data[$key . '*.question'] = 'required|string';
        }

        $validateData = $request->validate($data);

        // Upload and store background file
        $backgroundFile = $request->file('background');
        $backgroundName = uniqid() . '.' . $backgroundFile->getClientOriginalExtension();
        $backgroundFile->move(public_path('filebackgrounds'), $backgroundName);
        $validateData['background'] = $backgroundName;

        // Upload and store logo file
        $logoFile = $request->file('logo');
        $logoName = uniqid() . '.' . $logoFile->getClientOriginalExtension();
        $logoFile->move(public_path('filelogos'), $logoName);
        $validateData['logo'] = $logoName;

        $slider = Slider::create($validateData);

        if ($slider) {
            return redirect()->route('slider.index')->with('success', 'تم الحفظ بنجاح');
        } else {
            return redirect()->route('slider.create')->with('warning', 'حدث خطأ أثناء الحفظ');
        }
    }



    public function show(Slider $slider)
    {
        //
    }


    public function edit($id)
    {
        $slider = Slider::find($id);

        return view('slider.edit', compact('slider'));
    }


    public function update(Request $request, $id)
    {
        $data = [
            'whatsapp_link' => 'required|string',
            'tiktok_link' => 'required|string',
            'snapcaht_link' => 'required|string',
            'instagram_link' => 'required|string',
            'youtube_link' => 'required|string',
            'maintenance_link' => 'required|string',
            'materials_link' => 'required|string',
        ];

        foreach (config('app.language') as $key => $value) {
            $data[$key . '*.main_title'] = 'required|string';
            $data[$key . '*.description'] = 'required|string';
            $data[$key . '*.maintenance_button'] = 'required|string';
            $data[$key . '*.materials_button'] = 'required|string';
            $data[$key . '*.question'] = 'required|string';
        }

        $validateData = $request->validate($data);

        $slider = Slider::find($id);

        if (!$slider) {
            return redirect()->route('slider.index')->with('warning', 'لم يتم العثور على السلايدر');
        }

        // Update general data
        $slider->update($validateData);

        // Update background file if provided
        if ($request->hasFile('background')) {
            $backgroundFile = $request->file('background');
            $backgroundName = uniqid() . '.' . $backgroundFile->getClientOriginalExtension();
            $backgroundFile->move(public_path('filebackgrounds'), $backgroundName);
            $slider->background = $backgroundName;
        }

        // Update logo file if provided
        if ($request->hasFile('logo')) {
            $logoFile = $request->file('logo');
            $logoName = uniqid() . '.' . $logoFile->getClientOriginalExtension();
            $logoFile->move(public_path('filelogos'), $logoName);
            $slider->logo = $logoName;
        }

        $slider->save();

        return redirect()->route('slider.index')->with('success', 'تم التعديل بنجاح');
    }



    public function destroy($id)
    {
        // ابحث عن السلايدر المراد حذفه باستخدام المعرّف
        $slider = Slider::find($id);

        // التحقق مما إذا كان السلايدر موجودًا قبل الحذف
        if ($slider) {
            // قم بحذف السلايدر
            $slider->delete();

            return redirect()->route('slider.index')->with('danger', 'تمت الحذف بنجاح!');
        } else {
            return redirect()->route('slider.index')->with('danger', 'لم يتم العثور على السلايدر المحدد!');
        }
    }
}