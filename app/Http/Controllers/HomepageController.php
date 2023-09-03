<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Commitment;
use App\Models\ContactUs;
use App\Models\Footer;
use App\Models\Goal;
use App\Models\Management;
use App\Models\ManagementSub;
use App\Models\QA;
use App\Models\QAIntro;
use App\Models\ServicesMain;
use App\Models\ServicesSub;
use App\Models\Slider;

class HomepageController extends Controller
{

    public function index()
    {
        $sliders = Slider::get();
        $AboutUs = AboutUs::get();
        $mainservices = ServicesMain::get();
        $subservices = ServicesSub::get();
        $footer = Footer::get();
        $management = Management::get();
        $submanagement = ManagementSub::get();

        $selectedLocale = session('locale', 'ar');
        app()->setLocale($selectedLocale);

        return view('homepage.home',
            compact('sliders',
                'AboutUs',
                'mainservices',
                'subservices',
                'footer',
                'management',
                'submanagement'));
    }

    public function goals()
    {
        $footer = Footer::get();
        $goals = Goal::get();

        $selectedLocale = session('locale', 'ar');
        app()->setLocale($selectedLocale);

        return view('homepage.goals',
            compact('footer', 'goals'));
    }

    public function engine()
    {
        $footer = Footer::get();
        $qaintro = QAIntro::get();
        $qas = QA::get();

        $selectedLocale = session('locale', 'ar');
        app()->setLocale($selectedLocale);

        return view('homepage.engine',
            compact('footer', 'qaintro', 'qas'));

    }

    public function contact_us()
    {
        $footer = Footer::get();
        $contactus = ContactUs::get();

        $selectedLocale = session('locale', 'ar');
        app()->setLocale($selectedLocale);

        return view('homepage.contact_us',
            compact('footer', 'contactus'));

    }

    public function commitments()
    {
        $footer = Footer::get();
        $commitment = Commitment::get();

        $selectedLocale = session('locale', 'ar');
        app()->setLocale($selectedLocale);

        return view('homepage.commitments',
            compact('footer', 'commitment'));

    }

    public function changeLocale($locale)
    {
        if (in_array($locale, ['en', 'ar'])) {
            session(['locale' => $locale]);
            app()->setLocale($locale);

            // تحديد اتجاه النصوص بناءً على اللغة المحددة
            $textDirection = ($locale === 'ar') ? 'rtl' : 'ltr';
            app()->setLocale($locale);

            // قم بتخزين اتجاه النصوص في الجلسة للاستخدام في القوالب
            session(['textDirection' => $textDirection]);
        }

        return redirect()->back();
    }

    // public function changeLocale($locale)
    // {
    //     if (in_array($locale, ['en', 'ar'])) {
    //         session(['locale' => $locale]);
    //         app()->setLocale($locale);
    //     }

    //     return redirect()->back();
    // }

}
