<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>X</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <style>
            body {
                margin: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                background-color: rgb(200,229,237);
                flex-direction: column;
            }
            .box {
                display: flex;
                width: 800px;
                height: 400px;
                background-color: rgb(135, 210, 229);
                border-radius: 10px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                padding-top:50px;
            }
            .login-box{
                width:325px;
                height:300px;
                margin-left:50px;
                background-color: rgb(200,229,237);
                border-radius: 10px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            }
            .register-box{
                width:325px;
                height:300px;
                margin-left:50px;
                background-color: rgb(200,229,237);
                border-radius: 10px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                padding-top:90px;
            }
            .alert-container {
                width: 800px;
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body>
        <div class="alert-container">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
        <div class="box">
            <div class="login-box">
                <form action="{{route('login')}}" method="POST" class="container mt-5">
                    @csrf
                    <div class="d-flex flex-column align-items-center">
                        <div class="form-group mb-3">
                            <label for="email">E-Mail:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Log In</button>
                    </div>
                </form>
            </div>
            <div class="register-box text-center">
                <p class="h3">Would you like to join us?</p>
                <a href="registerpage" class="btn btn-primary">Register</a>
            </div>
        </div>
    </body>      
</html>