@php
    use App\Models\Likes;
@endphp
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
            .alertbox{
                width: 700px;
                height: 50px;
                margin-top: 140px;
                margin-left: 50px;
                margin-bottom: 10px;
            }
            .post-entry-box{
                width: 800px;
                height: 200px;
                background-color: rgb(135,210,229);
                border-radius: 10px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }
            .post-entry-input {
                width: 600px;
                height: 150px;
                margin-left: 100px;
                margin-top: 25px;
                padding: 10px;
                border: 2px solid rgb(72, 167, 191);
                background-color: rgb(200,229,237);
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                border-radius: 5px;
                box-sizing: border-box; 
                vertical-align: top; 
                resize: none;
            }
            .post-entry-input:focus {
                outline: none;
                border: 2px solid rgb(72, 167, 191);
            }
            .post-entry-button {
                margin-left: 14px;
                margin-top: 135px;
                background-color: rgb(72, 167, 191);
                transition: background-color 0.3s, transform 0.3s;
                border: 2px solid rgb(30, 126, 150);
            }
            .post-entry-button:hover {
                border: 2px solid rgb(30, 126, 150);
                background-color: rgb(30, 126, 150);
            }
            .post-list-box {
                width: 800px;
                background-color: rgb(135, 210, 229);  
                border-radius: 10px;
                margin-top: 20px;
                margin-bottom: 50px;
                padding-top: 10px;
                padding-bottom: 10px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }
            .post-item{
                position: relative;
                width: 700px;
                min-height: 160px;
                margin-left: 50px;
                margin-top: 10px;
                padding: 10px;
                background-color: rgb(200, 229, 237);
                border-radius: 10px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }
            .post-owner-info{
                position: relative;
                width: 650px;
                height: 50px;
            }
            .owner-photo-box{
                position: absolute;
                width: 50px;
                height: 50px;
                border-radius: 50%;
                overflow: hidden;
                display: flex;
                justify-content: center;
                align-items: center;
                border: 2px solid rgb(72, 167, 191);
                margin-bottom: 20px;
            }
            .owner-name-box{
                position: absolute;
                left: 50px;
                width: 600px;
                height: 50px;
                padding: 12px;
            }
            .owner-photo-box img {
                width: 100%;
                height: auto;
            }       
            .get-post-text{
                width: 650px;
            }
            .post-like-button{
                background-color: rgb(30,126,150);
                border: none;
                border-radius: 10px;
                color: rgb(200,229,237);
                cursor: pointer;
                font-size: 16px;
                position: absolute;
                outline: none;
                position: absolute;
                top: 10px;
                right: 10px;
            }
            .post-like-button:focus{
                outline: none;
            }
            .post-like-button.liked {
                color: red;
            }
            .like-count{
                background: none;
                border: none;
                color: rgb(30,126,150);
                cursor: pointer;
                font-size: 16px;
                position: absolute;
                outline: none;
                position: absolute;
                top: 36px;
                right: 10px;
            }
            .comment-button{
                background: none;
                border: none;
                color: rgb(30,126,150);
                cursor: pointer;
                font-size: 16px;
                position: absolute;
                outline: none;
                position: absolute;
                top: 62px;
                right: 10px;
            }
            .comment-button:focus{
                outline: none;
            }
            .delete-post-button{
                background: none;
                border: none;
                color: rgb(30,126,150);
                cursor: pointer;
                font-size: 16px;
                position: absolute;
                outline: none;
                position: absolute;
                top: 92px;
                right: 11px;
            }
            .delete-post-button:focus{
                outline: none;
            }
            .edit-post-hidden-button{
                background: none;
                border: none;
                color: rgb(30,126,150);
                cursor: pointer;
                font-size: 16px;
                position: absolute;
                outline: none;
                position: absolute;
                top: 122px;
                right: 7px;
            }
            .edit-post-hidden-button:focus{
                outline: none;
            }
            .edit-post-box{
                position: relative;
                display: none;
                width: 600px;
                margin-left: 40px;
                margin-bottom: 15px;
                padding: 10px;
                padding-bottom: 40px;
                background-color: rgb(135,210,229);
                border-radius: 10px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }
            .post-edit-input{
                width: 500px;
                height: 100px;
                margin-left: 40px;
                margin-top: 15px;
                padding: 10px;
                border: 2px solid rgb(72, 167, 191);
                background-color: rgb(200,229,237);
                border-radius: 5px;
                box-sizing: border-box; 
                resize: none;
            }
            .post-edit-input:focus{
                outline: none;
                border-color: rgb(72, 167, 191);
            }
            .edit-post-button{
                position: absolute;
                font-size: 12px;
                background-color: rgb(72, 167, 191);
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                right: 50px;
                top: 132px;
            }
            .edit-post-button:hover{
                background-color: rgb(30,126,150);
            }
            .comment-box{
                width: 600px;
                margin-left: 40px;
                padding: 10px;
                padding-bottom: 50px;
                background-color: rgb(135,210,229);
                display: none;
                border-radius: 10px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }
            .comment{
                position: relative;
                width: 500px;
                min-height: 70px;
                margin-left: 40px;
                margin-top: 10px;
                padding: 10px;
                background-color: rgb(200,229,237);
                border-radius: 10px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }
            .comment-owner-info{
                position: relative;
                width: 450px;
                height: 30px;
            }
            .comment-owner-photo{
                position: absolute;
                width: 30px;
                height: 30px;
                border-radius: 50%;
                overflow: hidden;
                display: flex;
                justify-content: center;
                align-items: center;
                border: 2px solid rgb(72, 167, 191);
                margin-bottom: 20px;
            }
            .comment-owner-photo img {
                width: 100%;
                height: auto;
            }
            .comment-owner-name-box{
                position: absolute;
                left: 50px;
                width: 600px;
                height: 30px;
                padding: 2px;
            }
            .comment-text{
                width: 450px;
            }
            .comment-delete-button{
                background: none;
                border: none;
                color: rgb(30,126,150);
                cursor: pointer;
                font-size: 16px;
                position: absolute;
                outline: none;
                top: 10px;
                right: 10px;
            }  
            .comment-delete-button:focus{
                outline: none;
            } 
            .comment-edit-button{
                background: none;
                border: none;
                color: rgb(30,126,150);
                cursor: pointer;
                font-size: 16px;
                position: absolute;
                outline: none;
                top: 36px;
                right: 6px;
            }  
            .comment-edit-button:focus{
                outline: none;
            }
            .edit-comment-box{
                position: relative;
                width: 400px;
                margin-left: 40px;
                margin-top: 25px;
                background-color: rgb(135,210,229);
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                border-radius: 10px;
                padding: 10px;
                padding-bottom: 40px;
                display: none;
            }
            .comment-edit-input{
                width: 300px;
                height: 100px;
                margin-left: 40px;
                margin-top: 15px;
                padding: 10px;
                border: 2px solid rgb(72, 167, 191);
                background-color: rgb(200,229,237);
                border-radius: 5px;
                box-sizing: border-box; 
                resize: none;
            }
            .comment-edit-input:focus{
                outline: none;
                border-color: rgb(72, 167, 191);
            }
            .edit-comment-button{
                position: absolute;
                font-size: 12px;
                background-color: rgb(72, 167, 191);
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                right: 50px;
                top: 132px;
            }
            .edit-comment-button:hover {
                background-color: rgb(30,126,150);
            }
            .add-comment-box{
                position: relative;
                width: 500px;
                margin-top: 15px;
                margin-left: 40px;
            }
            .comment-input{
                width: 500px;
                height: 100px;
                padding: 10px;
                border: 2px solid rgb(72, 167, 191);
                background-color: rgb(200,229,237);
                border-radius: 5px;
                box-sizing: border-box; 
                resize: none;
            }  
            .comment-input:focus{
                outline: none;
                border-color: rgb(72, 167, 191);
            }
            .add-comment-button{
                position: absolute;
                font-size: 12px;
                background-color: rgb(72, 167, 191);
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                right: 0px;
                top: 110px;
            }
            .add-comment-button:hover {
                background-color: rgb(30,126,150);
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
            <div class="alertbox">
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
            <div class="post-entry-box">
                <form action="{{route('addpost')}}" method="POST">
                    @csrf
                    <textarea class="post-entry-input" placeholder="Write here..." name="posttext"></textarea>
                    <button type="submit" class="btn btn-primary post-entry-button">Send</button>
                </form>
            </div>
            <div class="post-list-box">
                @foreach ($posts as $post)
                    <div class="post-item">
                        <div class="post-owner-info">
                            <div class="owner-photo-box">
                                <img src="{{ $post->owner->photo ? asset('storage/' . $post->owner->photo) : asset('storage/photos/default-image.png') }}">
                            </div>
                            <div class="owner-name-box">
                                {{ $post->owner->name }}:
                            </div>
                        </div>
                        <form action="{{ route('addremovelike', $post->id) }}" method="POST">
                            @csrf
                            @php
                                $userid = Auth::id();
                                $like = Likes::where('user_id', $userid)->where('post_id', $post->id)->first();
                            @endphp
                            <button class="post-like-button {{ $like ? 'liked' : '' }}">
                                <i class="fas fa-heart"></i>
                            </button>
                        </form>
                        <p class="like-count">{{ $post->likes->count() }}</p>
                        <p class="get-post-text">{{ $post->posttext }}</p>
                        @if ($post->ownerid === Auth::id())
                            <form action="{{ route('deletepost', $post->id) }}" method="POST" style="display: inline;">
                                @csrf
                                <button class="delete-post-button"><i class="fas fa-trash"></i></button>
                            </form>
                            <button class="edit-post-hidden-button" onclick="editpostvisibility(this)"><i class="fas fa-edit"></i></button>
                            <div class="edit-post-box">
                                <form action="{{ route('editpost', $post->id) }}" method="POST">
                                    @csrf
                                    <textarea class="post-edit-input" name="posteditinput">{{ $post->posttext }}</textarea>
                                    <button type="submit" class="btn btn-primary edit-post-button">Edit</button>
                                </form>
                            </div>
                        @endif
                        <button class="comment-button" onclick="toggleVisibility(this)"><i class="fas fa-comment"></i></button>
                        <div class="comment-box">
                            @foreach ($post->comments as $comment)
                                <div class="comment">
                                    <div class="comment-owner-info">
                                        <div class="comment-owner-photo">
                                            <img src="{{ $comment->owner->photo ? asset('storage/' . $comment->owner->photo) : asset('storage/photos/default-image.png') }}">
                                        </div>
                                        <div class="comment-owner-name-box">
                                            {{ $comment->owner->name }}:
                                        </div>
                                    </div>
                                    <p class="comment-text">{{ $comment->commenttext }}</p>
                                    @if ($comment->commentownerid === Auth::id())
                                        <form action="{{ route('deletecomment', $comment->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button class="comment-delete-button">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                        <button class="comment-edit-button" onclick="deletetogglevisibility(this)"><i class="fas fa-edit"></i></button>
                                        <div class="edit-comment-box">
                                            <form action="{{ route('editcomment', $comment->id) }}" method="POST">
                                                @csrf
                                                <textarea class="comment-edit-input" name="commenteditinput">{{ $comment->commenttext }}</textarea>
                                                <button type="submit" class="btn btn-primary edit-comment-button">Edit</button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                            <div class="add-comment-box">
                                <form action="{{ route('addcomment', $post->id) }}" method="POST">
                                    @csrf
                                    <textarea class="comment-input" placeholder="Write here..." name="commentinput"></textarea>
                                    <button type="submit" class="btn btn-primary add-comment-button">Add Comment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
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
            function toggleVisibility(button) {
                const hiddenItem = button.nextElementSibling;
                if (hiddenItem.style.display === "none" || hiddenItem.style.display === "") {
                    hiddenItem.style.display = "block";
                } else {
                    hiddenItem.style.display = "none";
                }
            } 
            function deletetogglevisibility(button) {
                const hiddenItem = button.nextElementSibling;
                if (hiddenItem.style.display === "none" || hiddenItem.style.display === "") {
                    hiddenItem.style.display = "block";
                } else {
                    hiddenItem.style.display = "none";
                }
            }  
            function editpostvisibility(button) {
                const hiddenItem = button.nextElementSibling;
                if (hiddenItem.style.display === "none" || hiddenItem.style.display === "") {
                    hiddenItem.style.display = "block";
                } else {
                    hiddenItem.style.display = "none";
                }
            }   
        </script>
    </body>
</html>