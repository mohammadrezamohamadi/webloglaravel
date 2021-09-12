<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title></title>
</head>
<body>

    @if(session('message'))
        <div class="alert alert-danger" role="alert">{{ session('message') }}</div>
    @endif
    @if(session('success'))
        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
    @endif

    <form class="mt-4" method="post" action="{{ route('auth.login') }}">
        @csrf

        <div class="container-fluid">
            <div class="row main-content bg-success text-center">
                <div class="col-md-4 text-center company__info">
                    <h4 class="company_title">Wellcome Back</h4>
                </div>
                <div class="col-md-8 col-xs-12 col-sm-12 login_form ">
                    <div class="container-fluid">
                        <div class="row">
                            <h2>Login</h2>
                        </div>
                        <div class="row">
                                <div class="row">
                                    <input type="text" name="input" id="input" class="form__input" placeholder="Email or Phone number">
                                </div>
                                <div class="row">

                                    <input type="password" name="password" id="password" class="form__input" placeholder="Password">
                                    @error('password')
                                    <div class="error alert-danger">{{ $message}}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <input type="submit" value="login" class="btn">
                                </div>
                        </div>
                        <div class="row">
                            <p>Don't have an account? <a href="register">register</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>
</html>
