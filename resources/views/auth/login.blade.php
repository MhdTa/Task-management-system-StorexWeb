<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }

    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="../index.html"><img class="logo-img"
                        src="../assets/images/logo.png" alt="logo"></a><span class="splash-description">Please enter
                    your user information.</span></div>
            <div class="card-body">
                <form action="{{ route('login') }}" method="post">
                      @csrf
                    <div class="form-group">
                        <input type="text" name="tel" id="tel" placeholder="Your Phone Number"
                            class="form-control form-control-lg @error('tel') border-red-500 @enderror"
                            value="{{ old('tel') }}">
                        @error('tel')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" placeholder="Choose a password"
                            class="form-control form-control-lg @error('password') border-red-500 @enderror" value="">
                        @error('password')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="remember" id="remember">
                            <span for="remember" class="custom-control-label">Remember Me</span>
                        </label>

                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Log in</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
                <div style="align:center" class="card-footer-item card-footer-item-bordered">
                    <a href="{{route('register')}}" class="footer-link">Create An Account</a>
                </div>
                
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>
