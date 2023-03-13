<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Registrasi Dashboard Super Maslahah">
    <meta name="keywords"
        content="Registrasi Dashboard Super Maslahah">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ url('public/img') }}/logo-suma-2.png" type="image/x-icon">
    <link rel="shortcut icon" href="{{ url('public/img') }}/logo-suma-2.png" type="image/x-icon">
    <title>Registrasi &mdash; Dashboard Maslahah</title>
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
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card">
                    <div>
                        <div><a class="logo" href="index.html">
                                <img class="img-fluid for-light"
                                    src="{{ url('public') }}/img/logo-suma-1-transparant.png" style="height: 50px"
                                    alt="looginpage">
                                <img class="img-fluid for-dark"
                                    src="{{ url('public') }}/img/logo-suma-1-transparant.png" style="height: 50px"
                                    alt="looginpage"></a>
                        </div>
                        <div class="login-main">
                            <form class="theme-form" method="POST" action="{{ route('register') }}">
                                @csrf

                                <h4>Create your account</h4>
                                <p>Enter your personal details to create account</p>
                                <!-- Name -->
                                <div class="form-group">
                                    <x-input-label for="name" :value="__('Name')" />
                                    <x-text-input id="name" class="form-control block mt-1 w-full" type="text"
                                        name="name" :value="old('name')" required autofocus />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <x-input-label for="nip" :value="__('NIP')" />
                                            <x-text-input id="nip" class="form-control block mt-1 w-full"
                                                type="text" name="nip" :value="old('nip')" required autofocus />
                                            <x-input-error :messages="$errors->get('nip')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="form-group">
                                            <x-input-label for="telepon" :value="__('Telepon')" />
                                            <x-text-input id="telepon" class="form-control block mt-1 w-full"
                                                type="text" name="telepon" :value="old('telepon')" required autofocus />
                                            <x-input-error :messages="$errors->get('telepon')" class="mt-2" />
                                        </div>
                                    </div>
                                </div>

                                <!-- Email Address -->
                                <div class="fprm-control mt-4">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="form-control block mt-1 w-full" type="email"
                                        name="email" :value="old('email')" required />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <!-- Password -->
                                <div class="form-group mt-4">
                                    <x-input-label for="password" :value="__('Password')" />

                                    <x-text-input id="password" class="form-control block mt-1 w-full"
                                        type="password" name="password" required autocomplete="new-password" />

                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <!-- Confirm Password -->
                                <div class="mt-4 form-group">
                                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                                    <x-text-input id="password_confirmation" class="form-control block mt-1 w-full"
                                        type="password" name="password_confirmation" required />

                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        href="{{ route('login') }}">
                                        {{ __('Already registered?') }}
                                    </a> --}}

                                    <x-primary-button class="btn btn-primary btn-block w-100">
                                        {{ __('Register') }}
                                    </x-primary-button>
                                </div>
                                <p class="mt-4 mb-0">Already have an account?<a class="ms-2"
                                        href="{{ route('login') }}">Sign in</a></p>
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
    </div>
</body>

</html>
