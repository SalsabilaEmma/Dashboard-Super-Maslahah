<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="Login Dashboard BPR Super Maslahah">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ url('public/img') }}/logo-suma-2.png" type="image/x-icon">
    <link rel="shortcut icon" href="{{ url('public/img') }}/logo-suma-2.png" type="image/x-icon">
    <title>Login &mdash; Dashboard Maslahah</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('public/cuba') }}/assets/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ url('public/cuba') }}/assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ url('public/cuba') }}/assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ url('public/cuba') }}/assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ url('public/cuba') }}/assets/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ url('public/cuba') }}/assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ url('public/cuba') }}/assets/css/style.css">
    <link id="color" rel="stylesheet" href="{{ url('public/cuba') }}/assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ url('public/cuba') }}/assets/css/responsive.css">
</head>

<body>
    <!-- login page start-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6"><img class="bg-img-cover bg-center"
                    style="width:10px; height: auto; object-fit: cover;" src="{{ url('public/img') }}/desain.png"
                    alt="looginpage"></div>
            <div class="col-xl-6 p-0">
                <div class="login-card">
                    <div>
                        <div><a class="logo text-start" href="">
                                <img class="bg-img-cover bg-center"
                                    src="{{ url('public/img') }}/logo-suma-1-transparant.png" alt="looginpage">
                                <img class="img-fluid for-dark"
                                    src="{{ url('public/img') }}/logo-suma-1-transparant.png" alt="looginpage">
                            </a>
                        </div>
                        <div class="login-main">
                            <x-auth-session-status class="mb-4" :status="session('status')" />
                            <form class="theme-form" method="POST" action="{{ route('login') }}">
                                @csrf
                                <h4>Sign in to account</h4>
                                <p>Enter your email & password to login</p>
                                <!-- Email Address -->
                                <div class="form-group">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="form-control block mt-1 w-full" type="email"
                                        name="email" :value="old('email')" required autofocus />
                                    <x-input-error :messages="$errors->get('email')" class="form-control mt-2" />
                                </div>
                                <!-- Password -->
                                <div class="form-group mt-4">
                                    <x-input-label for="password" :value="__('Password')" />

                                    <x-text-input id="password" class="form-control block mt-1 w-full" type="password"
                                        name="password" required autocomplete="current-password" />

                                    <x-input-error :messages="$errors->get('password')"
                                        class="form-control
                            mt-2" />
                                </div>
                                <!-- Remember Me -->
                                <div class="block mt-4">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me checkbox1" type="checkbox"
                                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                            name="remember">
                                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                    </label>
                                </div>
                                {{-- batas recapt --}}
                                <div class="text-center mt-4 mb-3">
                                    <div class="text-job text-muted">
                                        <h5>klik angka <span id="rc"></span></h5>
                                    </div>
                                </div>
                                <div class="row sm-gutters" style="padding-left: 25px">
                                    <input type="hidden" name="captcha" id="c-captcha">
                                    <div class="col-2" style="margin-left:1px;margin-right:1px;">
                                        <canvas class="cv" style="border:1px solid #747672;" width="50"
                                            height="50" id="canvas_0" data-canvas="0"></canvas>
                                    </div>
                                    <div class="col-2" style="margin-left:1px;margin-right:1px;">
                                        <canvas class="cv" style="border:1px solid #747672;" width="50"
                                            height="50" id="canvas_1" data-canvas="1"></canvas>
                                    </div>
                                    <div class="col-2">
                                        <canvas class="cv" style="border:1px solid #747672;" width="50"
                                            height="50" id="canvas_2" data-canvas="2"></canvas>
                                    </div>
                                    <div class="col-2" style="margin-left:1px;margin-right:1px;">
                                        <canvas class="cv" style="border:1px solid #747672;" width="50"
                                            height="50" id="canvas_3" data-canvas="3"></canvas>
                                    </div>
                                    <div class="col-2" style="margin-left:1px;margin-right:1px;">
                                        <canvas class="cv" style="border:1px solid #747672;" width="50"
                                            height="50" id="canvas_4" data-canvas="4"></canvas>
                                    </div>
                                    <div class="col-1"
                                        style="display: flex;align-items: center;justify-content:center;">
                                        <div id="re_recapt">
                                            <i class="fas fa-sync-alt"></i>
                                        </div>
                                    </div>
                                </div>
                                {{-- batas recapt --}}
                                <div class="flex items-center justify-end mt-4">
                                    {{-- @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif --}}
                                    {{-- <input type="hidden" name="status" id="status"> --}}
                                    <x-primary-button class="btn btn-primary btn-block w-100">
                                        {{ __('Log in') }}
                                    </x-primary-button>
                                </div>
                                <p class="mt-4 mb-0 text-center">Don't have account?<a class="ms-2"
                                        href="{{ route('register') }}">Create Account</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- latest jquery-->
        <script src="{{ url('public/cuba') }}/assets/js/jquery-3.5.1.min.js"></script>
        <!-- Bootstrap js-->
        <script src="{{ url('public/cuba') }}/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
        <!-- feather icon js-->
        <script src="{{ url('public/cuba') }}/assets/js/icons/feather-icon/feather.min.js"></script>
        <script src="{{ url('public/cuba') }}/assets/js/icons/feather-icon/feather-icon.js"></script>
        <!-- scrollbar js-->
        <!-- Sidebar jquery-->
        <script src="{{ url('public/cuba') }}/assets/js/config.js"></script>
        <!-- Plugins JS start-->
        <!-- Plugins JS Ends-->
        <!-- Theme js-->
        <script src="{{ url('public/cuba') }}/assets/js/script.js"></script>
        <!-- login js-->
        <!-- Plugin used-->

        <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        @if (Session::has('error'))
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
                integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script>
                toastr['error']("{{ session('error') }}", 'Error !', {
                    closeButton: true,
                    tapToDismiss: false,
                    timeOut: 5000,
                });
            </script>
        @endif

        @if (Session::has('success'))
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
                integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script>
                toastr['success']("{{ session('success') }}", 'Sukses !', {
                    closeButton: true,
                    tapToDismiss: false,
                    timeOut: 5000,
                });
            </script>
        @endif

        <script>
            $(document).ready(function(e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });
                get_recaptcha();
                $('#re_recapt').click(function(e) {
                    get_recaptcha();
                });

                $('#bt_check').click(function(e) {
                    let recapt_val = $('canvas[class="cv active"]').data('canvas');
                    e.preventDefault();
                    $.ajax({
                        type: "post",
                        // url: "http://localhost:8000/check_captcha",
                        url: '{{ route('cek_captcha') }}',
                        data: {
                            _token: "{{ csrf_token() }}",
                            recaptcha: recapt_val
                        },
                        dataType: "JSON",
                        success: function(res) {
                            console.log(res);
                        }
                    });
                });
            });

            function get_recaptcha() {
                $.ajax({
                    type: "GET",
                    // url: 'http://localhost:8000/get_recaptcha',
                    url: '{{ route('get_recaptcha') }}',
                    dataType: "JSON",
                    success: function(res) {
                        $('#rc').text(res.rc);
                        for (const key in res.captcha) {
                            make_canvas(res.captcha[key], key);
                        }
                    }
                });
            }

            function make_canvas(text, index) {
                $('canvas[class="cv active"]').attr('class', 'cv').css('border', '1px solid #747672');

                var canvas = document.getElementById("canvas_" + index);
                var ctx = canvas.getContext("2d");
                ctx.save();
                ctx.font = " italic bold 20px Comic Sans";
                let random_number = Math.floor(Math.random() * 14) + 1;
                ctx.rotate(random_number * Math.PI / 180);
                generate_noise(ctx);
                ctx.fillText(text, 18, 30);
                ctx.restore();
            }

            //generate noise background
            function generate_noise(ctx) {
                var w = ctx.canvas.width,
                    h = ctx.canvas.height,

                    /* This creates a new ImageData object
                    with the specified dimensions(i.e canvas
                    width and height). All pixels are set to
                    transparent black (i.e rgba(0,0,0,0)). */
                    idata = ctx.createImageData(w, h),

                    // Creating Uint32Array typed array
                    buffer32 = new Uint32Array(idata.data.buffer),
                    buffer_len = buffer32.length,
                    i = 0

                for (; i < buffer_len; i++) buffer32[i] = ((150 * Math.random()) | 0) << 24;
                /* The putImageData() method puts the image
                     data (from a specified ImageData object) back onto the canvas. */
                ctx.putImageData(idata, 0, 0);
            }

            $(document).on('click', '.cv', function() {
                $('canvas[class="cv active"]').attr('class', 'cv').css('border', '1px solid #747672');
                $(this).css('border', '4px solid #EB4747').attr('class', 'cv active');
                $('#c-captcha').val($(this).data('canvas'));
                console.log($(this).data('canvas'));
            });
        </script>
    </div>
</body>

</html>
