<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', '8Queens') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-white">
    <div class="container col-xl-10 col-xxl-8 px-4 py-5 ">
        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-md-6 mx-auto col-lg-5">
                <h1 class="text-center">{{ config('app.name', '8Queens') }}</h1>
                <form method="POST" action="{{ route('adminloginpost') }}"
                    class="p-4 p-md-5 border rounded-3 bg-light shadow">
                    @csrf
                    <div class="form-floating mb-3">
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            id="floatingInput" placeholder="name@example.com" value="{{ old('email') }}" required
                            autofocus>
                        <label for="floatingInput">Email address</label>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input name="password" type="password" class="form-control" id=" floatingPassword"
                            placeholder="Password" name="password" required autocomplete="current-password">
                        <label for="floatingPassword">Password</label>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="checkbox mb-3">
                        <label>
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            Remember me
                        </label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                    {{-- <hr class="my-4"> --}}
                    {{-- <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small> --}}
                </form>
            </div>
        </div>
    </div>
</body>

</html>
