<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #1abc9c, #16a085);
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        ::selection {
            background: rgba(26, 188, 156, 0.3);
        }

        .container {
            max-width: 440px;
            padding: 0 20px;
            margin: auto;
        }

        .wrapper {
            width: 100%;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .wrapper .title {
            height: 100px;
            background: #16a085;
            border-radius: 10px 10px 0 0;
            color: #fff;
            font-size: 30px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            text-transform: uppercase;
        }

        .wrapper form {
            padding: 40px 30px;
        }

        .wrapper form .row {
            margin-bottom: 20px;
            position: relative;
        }

        .wrapper form .row input {
            height: 50px;
            width: 100%;
            outline: none;
            padding-left: 60px;
            border-radius: 5px;
            border: 1px solid lightgrey;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        form .row input:focus {
            border-color: #16a085;
            box-shadow: 0 0 8px rgba(22, 160, 133, 0.2);
        }

        form .row input::placeholder {
            color: #999;
        }

        .wrapper form .row i {
            position: absolute;
            width: 50px;
            height: 50px;
            color: #fff;
            font-size: 18px;
            background: #16a085;
            border: 1px solid #16a085;
            border-radius: 5px 0 0 5px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .wrapper form .error-message {
            color: #e74c3c;
            font-size: 14px;
            margin-top: 5px;
        }

        .wrapper form .pass {
            margin: -10px 0 20px 0;
            text-align: right;
        }

        .wrapper form .pass a {
            color: #16a085;
            font-size: 16px;
            text-decoration: none;
        }

        .wrapper form .pass a:hover {
            text-decoration: underline;
        }

        .wrapper form .button input {
            color: #fff;
            font-size: 20px;
            font-weight: 500;
            background: #16a085;
            border: 1px solid #16a085;
            cursor: pointer;
            height: 50px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        form .button input:hover {
            background: #12876f;
        }

        .wrapper form .signup-link {
            text-align: center;
            margin-top: 25px;
            font-size: 16px;
        }

        .wrapper form .signup-link a {
            color: #16a085;
            text-decoration: none;
        }

        form .signup-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <div class="title"><span>Login</span></div>
            <form id="loginForm" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row">
                    <i class="fas fa-user"></i>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="Email or Phone" />
                    @error('email')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="password" name="password" required autocomplete="current-password" placeholder="Password" />
                    @error('password')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="pass">
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Forgot password?</a>
                    @endif
                </div>
                <div class="row button">
                    <input type="submit" value="Login">
                </div>
                <div class="signup-link">
                    Not a member? <a href="{{ route('register') }}">Signup now</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var statusMessage = document.getElementById('statusMessage');

            if (statusMessage) {
                setTimeout(function() {
                    statusMessage.style.display = 'none';
                }, 3000); // Hide the status message after 3 seconds
            }
        });
    </script>
    <script>
    @if(session('error'))
        alert("{{ session('error') }}");
    @endif

    @if(session('success'))
        alert("{{ session('success') }}");
    @endif
</script>

</body>

</html>
