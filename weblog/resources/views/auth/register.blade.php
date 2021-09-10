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



    <div class="container-fluid">
        <div class="row main-content bg-success text-center">
            <div class="col-md-4 text-center company__info">
                <span class="company__logo"><h2><span class="fa fa-android"></span></h2></span>
                <h4 class="company_title">Wellcome</h4>
            </div>
            <div class="col-md-8 col-xs-12 col-sm-12 login_form ">
                <div class="container-fluid">
                    <div class="row">
                        <h2>Register</h2>
                    </div>
                    <form class="mt-4" method="post" action="{{ route('auth.register') }}">
                        @csrf
                    <div class="row">
                            <input type="text" name="name" id="name" class="form__input" placeholder="Name">
                        @error('name')
                        <div class="error alert-danger">{{ $message }}</div>
                        @enderror
                        </div>

                        <div class="row">
                            <input type="text" name="phone_number" id="phone_number" class="form__input" placeholder="Phone number">
                            @error('phone_number')
                            <div class="error alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <input type="email" name="email" id="email" class="form__input" placeholder="Email">
                            @error('email')
                            <div class="error alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">

                            <input type="password" name="password" id="password" class="form__input" placeholder="Password">
                            @error('password')
                            <div class="error alert-danger">{{ $message}}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <input type="submit" value="register" class="btn">
                        </div>
                    </form>
                </div>
                <div class="row">
                    <p>Have an account? <a href="login">login</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>
</html>
