    document.body.style = "transition: 0.5s;"
    const sun = "https://www.uplooder.net/img/image/55/7aa9993fc291bc170abea048589896cf/sun.svg";
    const moon = "https://www.uplooder.net/img/image/2/addf703a24a12d030968858e0879b11e/moon.svg"

    var theme = "dark";
    const root = document.querySelector(":root");
    const container = document.getElementsByClassName("theme-container")[0];
    const themeIcon = document.getElementById("theme-icon");
    container.addEventListener("click", setTheme);

    function setTheme() {
        switch (theme) {
            case "dark":
                setLight();
                theme = "light";
                break;
            case "light":
                setDark();
                theme = "dark";
                break;
        }
    }

    function setLight() {
        root.style.setProperty(
            "--bs-dark",
            "linear-gradient(318.32deg, #c3d1e4 0%, #dde7f3 55%, #d4e0ed 100%)"
        );

        // إضافة الأيقونة الشمس ديناميكياً
        const sunIcon = document.createElement("img");
        sunIcon.src = sun;
        sunIcon.classList.add("change"); // إضافة الكلاس لتفعيل الأنماط
        sunIcon.id = "sun-icon"; // تعيين معرف للأيقونة
        sunIcon.style.fill = "white"; // تغيير لون الأيقونة إلى الأبيض
        container.appendChild(sunIcon); // إضافة الأيقونة إلى الـ theme-container

        themeIcon.style.display = "none"; // إخفاء الأيقونة القمر
    }

    function setDark() {
        root.style.setProperty("--bs-dark", "#212529");
        
        // إزالة الأيقونة الشمس إذا كانت موجودة
        const sunIcon = document.getElementById("sun-icon");
        if (sunIcon) {
            container.removeChild(sunIcon);
        }
        
        // جعل الأيقونة القمر مرئية مرة أخرى
        themeIcon.style.display = "inline";

    }
