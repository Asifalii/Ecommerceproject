<div class="card" style="width: 18rem;">
    <img src="{{ asset(Auth::user()->image) }}" class="card-img-top" style="border-radius:50%;" height="100%;"
        width="100%;" alt="card-img-top">
    <ul class="lsit-group list-group-flush">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
        <a href="{{ route('admin_image') }}" class="btn btn-primary btn-sm btn-block">update Image</a>
        <a href="{{ route('update_pass_view') }}" class="btn btn-primary btn-sm btn-block">update password</a>
        <a href="{{ route('logout') }}" class="btn btn-primary btn-sm btn-block" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
    
      
        </form>
        
    </ul>
</div>