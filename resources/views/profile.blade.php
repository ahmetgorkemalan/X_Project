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
                background-color: rgb(200,229,237);
                display: flex;
                justify-content: center;
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
            .centerbox{
                position: relative;
                width: 800px;
                min-height: 100vh;
            }
            .profile-box{
                position: relative;
                width: 800px;
                height: 500px;
                background-color: rgb(135, 210, 229);  
                border-radius: 10px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                margin-top: 200px;
            }
            .profile-info{
                position: absolute;
                width: 300px;
                height: 400px;
                margin: 50px;
            }
            .settings-icon{
                position: absolute;
                top: 0px;
                right: 0px;
                cursor: pointer;
                color: rgb(72, 167, 191);
                font-size:20px;
            }
            .settings-icon:hover {
                color: rgb(30, 126, 150);
            }
            .horizonal-hr{
                width: 100%;
                border: 1px solid rgb(72, 167, 191);
                margin: 40px 0;
            }
            .vertical-hr{
                position: absolute;
                top: 20px;
                left: 400px;
                width: 2px;
                height: 430px;
                border: none;
                background-color: rgb(72, 167, 191);
            }
            .profile-photo-box{
                position: absolute;
                width: 300px;
                height: 300px;
                margin-left: 450px;
                margin-top: 100px;
            }
            .profile-photo-box {
                position: absolute;
                width: 300px;
                height: 300px;
                margin-left: 450px;
                margin-top: 100px;
                text-align: center;
            }
            .circular-photo {
                width: 100%;
                height: 100%;
                border-radius: 50%;
                overflow: hidden;
                display: flex;
                justify-content: center;
                align-items: center;
                border: 2px solid rgb(72, 167, 191);
                margin-bottom: 20px;
            }
            .circular-photo img {
                width: 100%;
                height: auto;
            }
            .upload-form {
                margin-top: 20px;
            }
            .button-group {
                display: flex;
                gap: 10px;
                margin-top: 10px;
            }
            .upload-photo-button{
                width: 150px;
                height: 40px;
                padding: auto;
                background-color:rgb(72,167,191);
                border: none;
            }
            .upload-photo-button:hover{
                background-color: rgb(30,126,150);
            }
            .upload-form input[type="file"] {
                display: none;
            }
        </style>
    </head>
    <body>
        <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false">
                <img src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('storage/photos/default-image.png') }}" alt="User Icon" class="circular-img">
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{route('home')}}">Home</a>
                <a class="dropdown-item" href="{{route('profile')}}">Profile</a>
                <form action="{{ route('logout') }}" method="POST" class="dropdown-item" style="display:inline;">
                    @csrf
                    <button type="submit" style="background: none; border: none; color: inherit; padding: 0; text-align: left; width: 69%;">Log Out</button>
                </form>
            </div>
        </div>
        <div class="centerbox">
            <div class="profile-box">
                <div class="profile-info">
                    <i class="fas fa-cog settings-icon" onclick="location.href='{{route('settings')}}';"></i>
                    <p>Name:</p>
                    <label>{{ Auth::user()->name }}</label>
                    <hr class="horizonal-hr">
                    <p>Surname:</p>
                    <label>{{ Auth::user()->surname }}</label>
                    <hr class="horizonal-hr">
                    <p>E-Mail:</p>
                    <label>{{ Auth::user()->email }}</label>
                </div>
                <hr class="vertical-hr">
                <div class="profile-photo-box">
                    <div class="circular-photo">
                        <img src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('storage/photos/default-image.png') }}">
                    </div>
                    <form action="edituserphoto" method="POST" enctype="multipart/form-data" class="upload-form">
                        @csrf
                        <input type="file" name="photo" id="fileUpload" required>
                        <div class="button-group">
                            <label for="fileUpload" class="btn btn-primary upload-photo-button">Select Photo</label>
                            <button type="submit" class="btn btn-success upload-photo-button">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
        </script>
    </body>
</html>