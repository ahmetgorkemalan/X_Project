<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>X</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            position: relative;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            background-color: rgb(200,229,237);
            flex-direction: column; /* Dikey hizalama için */
        }
        .box {
            width: 800px;
            height: 500px;
            background-color: rgb(135,210,229);  
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 20px;
            margin-top: 20px; /* Mesaj alanının altında bir boşluk bırakmak için */
        }
        .info_box, .password_box {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 300px;
            background-color: rgb(200,229,237);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .dropdown{
            position: fixed;
            top: 50px;
            right: 50px;
            width: 60px;
            height: 60px;
        }
        .dropdown-toggle {
            border-radius: 30px;
            width: 60px;
            height: 60px;
            padding: 0;
            font-size: 30px;
            background-color: rgb(200,229,237);
            color: rgb(72, 167, 191);
        }
        .dropdown-toggle::after {
            display: none;
        }
        .dropdown-toggle:hover{
            background-color: rgb(200,229,237);
            color: rgb(30, 126, 150);
        }
        .circular-img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
        }
        .dropdown-menu {
            right: 0;
            left: auto;
        }
        .delete-account {
            position: fixed;
            bottom: 20px;
            right: 20px;
            cursor: pointer;
            color: rgb(30,126,150);
            font-size: 18px;
            background-color: rgb(135,210,229);
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .alert-container {
            width: 800px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="dropdown">
        <button class="btn custom-dropdown-toggle dropdown-toggle" type="button" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false">
            <img src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('storage/photos/default-image.png') }}" alt="User Icon" class="circular-img">
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{ route('home') }}">Home</a>
            <a class="dropdown-item" href="{{route('profile')}}">Profile</a>
            <form action="{{ route('logout') }}" method="POST" class="dropdown-item" style="display:inline;">
                @csrf
                <button type="submit" style="background: none; border: none; color: inherit; padding: 0; text-align: left; width: 69%;">Log Out</button>
            </form>
        </div>
    </div>
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
        <div class="info_box">
            <form action="{{route('infoupdate')}}" method="POST" class="register_box">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="surname">Surname:</label>
                    <input type="text" class="form-control" id="surname" name="surname" required>
                </div>
                <div class="form-group">
                    <label for="email">E-Mail:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="controlpassword" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
        <div class="password_box">
            <form action="{{route('passwordupdate')}}" method="POST" class="register_box">
                @csrf
                <div class="form-group">
                    <label for="current_password">Current Password:</label>
                    <input type="password" class="form-control" id="current_password" name="controlpassword" required>
                </div>
                <div class="form-group">
                    <label for="new_password">New Password:</label>
                    <input type="password" class="form-control" id="new_password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Repeat Password:</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
    <div class="delete-account" onclick="confirmDelete();">
        Delete Account
    </div>
    <form id="deleteAccountForm" action="{{route('deleteaccount')}}" method="POST" style="display: none;">
        @csrf
    </form>
    <script>
        $(document).ready(function() {
            $('.dropdown').hover(
                function() {
                    $(this).find('.dropdown-menu').stop(true, true).slideDown(200);
                }, 
                function() {
                    $(this).find('.dropdown-menu').stop(true, true).slideUp(200);
                }
            );
        });
        function confirmDelete() {
            if (confirm("Are you sure you want to delete your account? This action cannot be undone.")) {
                document.getElementById('deleteAccountForm').submit();
            }
        }
    </script>
</body>
</html>