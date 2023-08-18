<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LOGIN</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap');

        * {
            font-family: 'Roboto', sans-serif;
        }

        body{
            background-color: #F8FAFE;
            font-weight: 400;
        }


        input {
            font-size: 0.813rem !important;
            padding: 1.5rem 1rem !important;
        }

        button {
            font-size: 0.813rem !important;
            padding: .75rem !important;
            font-weight: 600;
        }

        .login-ttl{
            font-size: 2rem;
            font-weight: 500;
        }
    </style>
</head>
<body>

    <div class="container px-5">
        <div class="row justify-content-center min-vh-100 align-items-center">
            <div class="col-md-5 mx-auto ">

                <form action="{{ route('login') }}" method="POST">
                @csrf
                    <h3 class="login-ttl mb-4 text-center">LOGIN</h3>

                    <div class="form-group mb-4">
                        <input class="form-control rounded-0" type="email" name="email"
                        placeholder="Enter Your Email Address" autocomplete="off" autofocus>
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                    </div>

                    <div class="form-group mb-4">
                        <input class="form-control rounded-0" type="password" name="password"
                        placeholder="Enter Your Password">
                        <small class="text-danger">{{ $errors->first('password') }}</small>
                    </div>

                    <div class="form-group text-center">
                        <button class="btn btn-outline-dark rounded-0 btn-block" type="submit">
                            LOGIN
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</body>
</html>
