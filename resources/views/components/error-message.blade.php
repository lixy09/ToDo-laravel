@if(session('error'))
    <meta http-equiv="refresh" content="2;url={{ url()->current() }}">
    <div class="notification is-danger">
        {{ session('error') }}
    </div>
@endif
