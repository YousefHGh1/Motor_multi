$(document).ready(function() {
    let isArabic = false;
    let isRTL = false;

    // الدالة المسؤولة عن تغيير النص واللغة
    function toggleLanguageAndDirection() {
        isArabic = !isArabic;
        isRTL = !isRTL;

        if (isArabic) {
            $("html").attr("lang", "ar"); // تغيير لغة الصفحة إلى العربية
            localStorage.setItem("locale", "ar"); // تغيير قيمة locale في التخزين المحلي
        } else {
            $("html").attr("lang", "en"); // تغيير لغة الصفحة إلى الإنجليزية
            localStorage.setItem("locale", "en"); // تغيير قيمة locale في التخزين المحلي
        }

        if (isRTL) {
            $("body").css("direction", "ltr"); // تغيير اتجاه الموقع إلى اليمين إلى اليسار
        } else {
            $("body").css("direction", "rtl"); // تغيير اتجاه الموقع إلى اليسار إلى اليمين
        }
    }

    // استعادة قيمة locale من التخزين المحلي وتعيين اللغة والاتجاه الأوليين
    const storedLocale = localStorage.getItem("locale");
    if (storedLocale === "ar") {
        isArabic = true;
        toggleLanguageAndDirection();
    }

    // القيام بتبديل النص واللغة والاتجاه عند النقر على الزر
    $("#toggle-btn").click(function() {
        toggleLanguageAndDirection();
    });
});
$(document).ready(function() {
    let isArabic = false;
    let isRTL = false;

    // الدالة المسؤولة عن تغيير النص واللغة
    function toggleLanguageAndDirection() {
        isArabic = !isArabic;
        isRTL = !isRTL;

        if (isArabic) {
            $("html").attr("lang", "ar"); // تغيير لغة الصفحة إلى العربية
            localStorage.setItem("locale", "ar"); // تغيير قيمة locale في التخزين المحلي
        } else {
            $("html").attr("lang", "en"); // تغيير لغة الصفحة إلى الإنجليزية
            localStorage.setItem("locale", "en"); // تغيير قيمة locale في التخزين المحلي
        }

        if (isRTL) {
            $("body").css("direction", "ltr"); // تغيير اتجاه الموقع إلى اليمين إلى اليسار
        } else {
            $("body").css("direction", "rtl"); // تغيير اتجاه الموقع إلى اليسار إلى اليمين
        }
    }

    // استعادة قيمة locale من التخزين المحلي وتعيين اللغة والاتجاه الأوليين
    const storedLocale = localStorage.getItem("locale");
    if (storedLocale === "ar") {
        isArabic = true;
        toggleLanguageAndDirection();
    }

    // القيام بتبديل النص واللغة والاتجاه عند النقر على الزر
    $("#toggle-btn1").click(function() {
        toggleLanguageAndDirection();
    });
});
