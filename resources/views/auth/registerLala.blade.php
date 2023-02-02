<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ url('cuba') }}/assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="{{ url('cuba') }}/assets/images/favicon.png" type="image/x-icon">
    <title>Registrasi &mdash; Dashboard Maslahah</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('cuba') }}/assets/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ url('cuba') }}/assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ url('cuba') }}/assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ url('cuba') }}/assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ url('cuba') }}/assets/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ url('cuba') }}/assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ url('cuba') }}/assets/css/style.css">
    <link id="color" rel="stylesheet" href="{{ url('cuba') }}/assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ url('cuba') }}/assets/css/responsive.css">
</head>

<body>
    <!-- login page start-->
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card">
                    <div>
                        <div><a class="logo" href="index.html"><img class="img-fluid for-light"
                                    src="{{ url('cuba') }}/assets/images/logo/login.png" alt="looginpage"><img
                                    class="img-fluid for-dark"
                                    src="{{ url('cuba') }}/assets/images/logo/logo_dark.png" alt="looginpage"></a>
                        </div>
                        <div class="login-main" style="width: 1000px">
                            <form class="theme-form" method="POST" action="{{ route('register') }}">
                                @csrf

                                <h4>Create your account</h4>
                                <p>Enter your personal details to create account</p>
                                <div class="row">
                                    <div class="form-group col-sm-4">
                                        <x-input-label for="name" :value="__('CIF')" />
                                        <x-text-input id="cif" class="form-control block mt-1 w-full"
                                            type="text" name="cif" :value="old('cif')" required autofocus />
                                        <x-input-error :messages="$errors->get('cif')" class="mt-2" />
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <x-input-label for="name" :value="__('NIP')" />
                                        <x-text-input id="nip" class="form-control block mt-1 w-full"
                                            type="text" name="nip" :value="old('nip')" required autofocus />
                                        <x-input-error :messages="$errors->get('nip')" class="mt-2" />
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <x-input-label for="ttl" :value="__('TTL')" />
                                        <x-text-input id="ttl" class="form-control block mt-1 w-full"
                                            type="date" name="ttl" :value="old('ttl')" required autofocus />
                                        <x-input-error :messages="$errors->get('ttl')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <x-input-label for="noHp" :value="__('No HP')" />
                                        <x-text-input id="noHp" class="form-control block mt-1 w-full"
                                            type="text" name="noHp" :value="old('noHp')" required autofocus />
                                        <x-input-error :messages="$errors->get('noHp')" class="mt-2" />
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <x-input-label for="noKtp" :value="__('No KTP')" />
                                        <x-text-input id="noKtp" class="form-control block mt-1 w-full"
                                            type="text" name="noKtp" :value="old('noKtp')" required autofocus />
                                        <x-input-error :messages="$errors->get('noKtp')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-4">
                                        <x-input-label for="tipeHp" :value="__('Tipe HP')" />
                                        <x-text-input id="tipeHp" class="form-control block mt-1 w-full"
                                            type="text" name="tipeHp" :value="old('tipeHp')" required autofocus />
                                        <x-input-error :messages="$errors->get('tipeHp')" class="mt-2" />
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <x-input-label for="statusAktivasi" :value="__('Status Aktivasi')" />
                                        <x-text-input id="statusAktivasi" class="form-control block mt-1 w-full"
                                            type="text" name="statusAktivasi" :value="old('statusAktivasi')" required autofocus />
                                        <x-input-error :messages="$errors->get('statusAktivasi')" class="mt-2" />
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <x-input-label for="kodeUnik" :value="__('Kode Unik')" />
                                        <x-text-input id="kodeUnik" class="form-control block mt-1 w-full"
                                            type="text" name="kodeUnik" :value="old('kodeUnik')" required autofocus />
                                        <x-input-error :messages="$errors->get('kodeUnik')" class="mt-2" />
                                    </div>
                                </div>
                                <p style="padding-top: 25px">User Access</p><hr>
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <x-input-label for="aksesAbsen" :value="__('Akses Absen')" />
                                        <x-text-input id="aksesAbsen" class="form-control block mt-1 w-full"
                                            type="text" name="aksesAbsen" :value="old('aksesAbsen')" required autofocus />
                                        <x-input-error :messages="$errors->get('aksesAbsen')" class="mt-2" />
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <x-input-label for="aksesMpay" :value="__('Akses M-Pay')" />
                                        <x-text-input id="aksesMpay" class="form-control block mt-1 w-full"
                                            type="text" name="aksesMpay" :value="old('aksesMpay')" required autofocus />
                                        <x-input-error :messages="$errors->get('aksesMpay')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-4">
                                        <x-input-label for="aksesKpai" :value="__('Akses KPAI')" />
                                        <x-text-input id="aksesKpai" class="form-control block mt-1 w-full"
                                            type="text" name="aksesKpai" :value="old('aksesKpai')" required autofocus />
                                        <x-input-error :messages="$errors->get('aksesKpai')" class="mt-2" />
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <x-input-label for="aksesKunKer" :value="__('Akses Kunjungan Kerja')" />
                                        <x-text-input id="aksesKunKer" class="form-control block mt-1 w-full"
                                            type="text" name="aksesKunKer" :value="old('aksesKunKer')" required autofocus />
                                        <x-input-error :messages="$errors->get('aksesKunKer')" class="mt-2" />
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <x-input-label for="aksesListPekerjaan" :value="__('Akses List Pekerjaan')" />
                                        <x-text-input id="aksesListPekerjaan" class="form-control block mt-1 w-full"
                                            type="text" name="aksesListPekerjaan" :value="old('aksesListPekerjaan')" required autofocus />
                                        <x-input-error :messages="$errors->get('aksesListPekerjaan')" class="mt-2" />
                                    </div>
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
        <script src="{{ url('cuba') }}/assets/js/jquery-3.5.1.min.js"></script>
        <!-- Bootstrap js-->
        <script src="{{ url('cuba') }}/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
        <!-- feather icon js-->
        <script src="{{ url('cuba') }}/assets/js/icons/feather-icon/feather.min.js"></script>
        <script src="{{ url('cuba') }}/assets/js/icons/feather-icon/feather-icon.js"></script>
        <!-- scrollbar js-->
        <!-- Sidebar jquery-->
        <script src="{{ url('cuba') }}/assets/js/config.js"></script>
        <!-- Plugins JS start-->
        <!-- Plugins JS Ends-->
        <!-- Theme js-->
        <script src="{{ url('cuba') }}/assets/js/script.js"></script>
        <!-- login js-->
        <!-- Plugin used-->
    </div>
</body>

</html>
