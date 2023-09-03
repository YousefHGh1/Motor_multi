@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>&nbsp;&nbsp;
    </div>
@endif
@if ($message = Session::get('danger'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>&nbsp;&nbsp;
    </div>
@endif
@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>&nbsp;&nbsp;
    </div>
@endif
@if ($message = Session::get('info'))
    <div class="alert alert-info alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>&nbsp;&nbsp;
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        تحقق من الأخطاء الموجودة : &nbsp;
    </div>
@endif

{{--
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (Session::has('success'))
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Well Done !!',
            // showConfirmButton: true,
            confirmButtonText: '<i class="fa fa-thumbs-up"></i> Great!',
            timer: 1000,
        })
    </script>
@endif

@if (Session::has('danger'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'نأسف...',
            text: 'Opps Sorry !',
            timer: 1000,

        })
    </script>
@endif


@if ($message = Session::get('warning'))
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'تحذير...',
            text: 'انتبه تأكد من صحة البيانات',
            // footer: '<a href="">Why do I have this issue?</a>'
            timer: 1000,

        })
    </script>
@endif
@if ($message = Session::get('info'))
    <script>
        Swal.fire({
            icon: 'info',
            title: 'حسنا...',
            text: '!',
            timer: 1000,

        })
    </script>
@endif
@if ($message = Session::get('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'error...',
            text: '!',
            timer: 1000,

        })
    </script>
@endif
@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'تحذير...',
            text: 'انتبه تأكد من صحة البيانات',
            // footer: '<a href="">Why do I have this issue?</a>'
            timer: 1000,

        })
    </script>
@endif  --}}
