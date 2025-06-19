<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>
    <section class="w-100 d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card shadow-sm mx-auto">
            <div class="card-body p-4">
                <h3 class="card-title text-center mb-4">Sign In</h3>

                {{-- Global error message --}}
                @if ($errors->has('error'))
                    <div class="alert alert-danger">
                        {{ $errors->first('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login.submit') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            id="inputEmail" placeholder="Please enter email address" value="{{ old('email') }}"
                            required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Password</label>
                        <input type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" id="inputPassword"
                            placeholder="Please enter Password" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" name="remember" class="form-check-input" id="rememberCheck">
                        <label class="form-check-label" for="rememberCheck">Remember me</label>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Login</button>

                    <div class="mt-3 text-center">
                        <a href="#" class="link-secondary">Forgot password?</a>
                    </div>
                    <div class="mt-3 text-center">
                        <span>Don't have an account? <a href="#">Sign up</a></span>
                    </div>
                </form>
            </div>
        </div>
    </section>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
</script>

</html>
