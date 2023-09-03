  <!-- ======= Header 1 ======= -->
  <header id="header" class="fixed-top">
      <div class="container d-flex align-items-center justify-content-center">
          <nav id="navbar" class="navbar">
              <ul>
                  <li>
                      <a class="nav-link scrollto active" href="#header">{{ __('words.home') }}</a>
                  </li>
                  <li><a class="nav-link scrollto" href="#about">{{ __('words.about_us') }}</a></li>

                  <li class="dropdown" id="serves">
                      <a href="#"><span> {{ __('words.services') }} &nbsp;&nbsp;</span>
                          <i class="bi bi-chevron-down"></i></a>
                      <ul>
                          <li style="color: rgb(150, 147, 147)">
                              <a href="#services">{{ __('words.car maintenance') }}</a>
                          </li>
                          <li><a href="#">{{ __('words.Generators, crushers and electrical panels') }}</a></li>
                      </ul>
                  </li>
                  <li><a class="nav-link scrollto" href="{{ route('homepage.goals') }}">{{ __('words.goal') }}</a></li>
                  <li>
                      <a class="nav-link scrollto"
                          href="{{ route('homepage.commitments') }}">{{ __('words.commitment') }}</a>
                  </li>
                  <li class="dropdown">
                      <a href="#"><span> {{ __('words.contact_us') }} &nbsp;&nbsp;</span><i
                              class="bi bi-chevron-down"></i></a>
                      <ul>
                          <li><a href="{{ route('homepage.contact_us') }}">{{ __('words.contact_us') }}</a></li>
                      </ul>
                  </li>

                  <li class="dropdown" id="lang">
                      <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                              fill="currentColor" class="bi bi-globe-americas" viewBox="0 0 16 16">
                              <path
                                  d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0ZM2.04 4.326c.325 1.329 2.532 2.54 3.717 3.19.48.263.793.434.743.484-.08.08-.162.158-.242.234-.416.396-.787.749-.758 1.266.035.634.618.824 1.214 1.017.577.188 1.168.38 1.286.983.082.417-.075.988-.22 1.52-.215.782-.406 1.48.22 1.48 1.5-.5 3.798-3.186 4-5 .138-1.243-2-2-3.5-2.5-.478-.16-.755.081-.99.284-.172.15-.322.279-.51.216-.445-.148-2.5-2-1.5-2.5.78-.39.952-.171 1.227.182.078.099.163.208.273.318.609.304.662-.132.723-.633.039-.322.081-.671.277-.867.434-.434 1.265-.791 2.028-1.12.712-.306 1.365-.587 1.579-.88A7 7 0 1 1 2.04 4.327Z" />
                          </svg>
                      </a>
                      <ul>
                          <li><!-- في ملف العرض (blade) أو أي مكان في واجهة المستخدم -->
                              <a href="{{ route('change_locale', ['locale' => 'ar']) }}" id="toggle-btn">العربية</a>
                          </li>
                          <li>
                              <a href="{{ route('change_locale', ['locale' => 'en']) }}" id="toggle-btn1">English</a>
                          </li>
                      </ul>
                  </li>

                  <!-- dark & light mode -->
                  <div class="theme-container shadow-dark" id="mode-toggle">
                      <img id='theme-icon' width="40px" height="40px"
                          src='https://www.uplooder.net/img/image/2/addf703a24a12d030968858e0879b11e/moon.svg'
                          alt='ERR'>
                  </div>

              </ul>
              <i class="bi bi-list mobile-nav-toggle"></i>
          </nav>
          <!-- .navbar -->
      </div>
  </header>
  <!-- End Header -->


  {{-- @section('scripts')
      <script>
          // changeLocale.js
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
      </script>
  @endsection --}}