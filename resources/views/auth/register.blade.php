<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Register &mdash; Super Maslahah</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ url('stisla/dist') }}/assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ url('stisla/dist') }}/assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ url('stisla/dist') }}/assets/modules/jquery-selectric/selectric.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ url('stisla/dist') }}/assets/css/style.css">
  <link rel="stylesheet" href="{{ url('stisla/dist') }}/assets/css/components.css">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="{{ url('stisla/dist') }}/assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>

              <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="form-control block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="form-control block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="form-control block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-text-input id="password_confirmation" class="form-control block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a> --}}

                        <x-primary-button class="btn btn-primary btn-lg btn-block">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
                <div class="mt-5 text-muted text-center">
                  Already registered? <a href="{{ route('login') }}">Sign In</a>
                </div>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; Super Maslahah
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ url('stisla/dist') }}/assets/modules/jquery.min.js"></script>
  <script src="{{ url('stisla/dist') }}/assets/modules/popper.js"></script>
  <script src="{{ url('stisla/dist') }}/assets/modules/tooltip.js"></script>
  <script src="{{ url('stisla/dist') }}/assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="{{ url('stisla/dist') }}/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="{{ url('stisla/dist') }}/assets/modules/moment.min.js"></script>
  <script src="{{ url('stisla/dist') }}/assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="{{ url('stisla/dist') }}/assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="{{ url('stisla/dist') }}/assets/modules/jquery-selectric/jquery.selectric.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="{{ url('stisla/dist') }}/assets/js/page/auth-register.js"></script>

  <!-- Template JS File -->
  <script src="{{ url('stisla/dist') }}/assets/js/scripts.js"></script>
  <script src="{{ url('stisla/dist') }}/assets/js/custom.js"></script>
</body>
</html>
