<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <title>Login & Register Form</title>
    < <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8" />
        <meta name="keywords"
            content="Validate Login & Register Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
        <script>
            addEventListener("load", function() {
                setTimeout(hideURLbar, 0);
            }, false);

            function hideURLbar() {
                window.scrollTo(0, 1);
            }
        </script>


        <!-- css files -->
        <link rel="stylesheet" href="{{ asset('admin-assets/css/style.css') }}" type="text/css" media="all" />
        <!-- Style-CSS -->
        <link href="{{ asset('admin-assets/css/font-awesome.min.css') }}" rel="stylesheet">
        <!-- Font-Awesome-Icons-CSS -->
        <!-- //css files -->
        <!-- web-fonts -->
        <link
            href="{{ asset('admin-assets/fonts/fonts.googleapis.com/css?family=Magra:400,700&amp;subset=latin-ext') }}"
            rel="stylesheet">
        <!-- //web-fonts -->
</head>

<body>
    <!-- title -->
    <h1>
        Validate Login & Register Forms
    </h1>
    <!-- //title -->

    <!-- content -->
    <div class="container-agille">
        <div class="formBox level-login">
            <div class="box boxShaddow"></div>
            <div class="box loginBox">
                <h3>Login Here</h3>
                @if (session('error'))
                    <div class="text-danger text-center">{{ session('error') }}</div>
                @endif
                <form class="form" action="{{ route('postLogin') }}" method="post">
                    @csrf
                    <div class="f_row-2">
                        <input name="email" type="text" class="input-field" placeholder="Email" required>
                    </div>                 
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <div class="f_row-2 last">
                        <input name="password" type="password" placeholder="Password" class="input-field" required>
                    </div>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input name="remember" type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                    </div>
                    <input class="submit-w3" type="submit" value="Login">
                    <div class="f_link">
                        <a href="" class="resetTag">Forgot your password?</a>
                    </div>
                </form>
            </div>
            <div class="box forgetbox agile">
                <a href="#" class="back icon-back">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        x="0px" y="0px" viewBox="0 0 199.404 199.404"
                        style="enable-background:new 0 0 199.404 199.404;" xml:space="preserve">
                        <polygon
                            points="199.404,81.529 74.742,81.529 127.987,28.285 99.701,0 0,99.702 99.701,199.404 127.987,171.119 74.742,117.876 
			  199.404,117.876 " />
                    </svg>
                </a>
                <h3>Reset Password</h3>
                <form class="form" action="#" method="post">
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.
                    </p>
                    <div class="f_row last">
                        <label>Email Id</label>
                        <input type="email" name="email" placeholder="Email" class="input-field" required>
                        <u></u>
                    </div>
                    <button class="btn button submit-w3">
                        <span>Reset</span>
                    </button>
                </form>
            </div>
            <div class="box registerBox wthree">
                <span class="reg_bg"></span>
                <h3>Register</h3>
                <form class="form" action="#" method="post">
                    <div class="f_row-2">
                        <input type="text" class="input-field" placeholder="Username" name="name" required>
                    </div>
                    <div class="f_row-2 last">
                        <input type="password" name="password" placeholder="Password" id="password1" class="input-field"
                            required>
                    </div>
                    <div class="f_row-2 last">
                        <input type="password" name="password" placeholder="Confirm Password" id="password2"
                            class="input-field" required>
                    </div>
                    <input class="submit-w3" type="submit" value="Register">
                </form>
            </div>
            <a href="#" class="regTag icon-add">
                <i class="fa fa-repeat" aria-hidden="true"></i>

            </a>
        </div>
    </div>
    <!-- //content -->

    <!-- copyright -->
    <div class="footer-w3ls">
        <h2>&copy; 2022 Validate Login & Register Form. All rights reserved | Design by
            <a href="https://www.google.com/">Nhật Hiếu</a>
        </h2>
    </div>
    <!-- //copyright -->


    <!-- js files -->
    <!-- Jquery -->
    <script src="{{ asset('admin-assets/js/jquery-2.2.3.min.js') }}"></script>
    <!-- //Jquery -->
    <!-- input fields js -->
    <script src="{{ asset('admin-assets/js/input-field.js') }}"></script>
    <!-- //input fields js -->

    <!-- password-script -->
    <script>
        window.onload = function() {
            document.getElementById("password1").onchange = validatePassword;
            document.getElementById("password2").onchange = validatePassword;
        }

        function validatePassword() {
            var pass2 = document.getElementById("password2").value;
            var pass1 = document.getElementById("password1").value;
            if (pass1 != pass2)
                document.getElementById("password2").setCustomValidity("Passwords Don't Match");
            else
                document.getElementById("password2").setCustomValidity('');
            //empty string means no validation error
        }
    </script>
    <!-- //password-script -->
    <!-- //js files -->
</body>

</html>
