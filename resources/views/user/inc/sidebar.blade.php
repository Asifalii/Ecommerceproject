<div class="card" style="width: 18rem;">
    <img src="{{ asset(Auth::user()->image) }}" class="card-img-top" style="border-radius:50%;" height="100%;"
        width="100%;" alt="card-img-top">
    <ul class="lsit-group list-group-flush">
        <a href="{{ route('user.dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
        <a href="{{ route('user-image') }}" class="btn btn-primary btn-sm btn-block">Edit Image</a>
        <a href="{{ route('change_password_view_page') }}" class="btn btn-primary btn-sm btn-block">Change User Password</a>
        <a href="{{ route('logout') }}" class="btn btn-danger btn-sm btn-block"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Log
            Out</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        
    </ul>
</div>