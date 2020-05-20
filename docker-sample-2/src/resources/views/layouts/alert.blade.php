@if(Session::has('success'))
    <div class="alert alert-primary" role="alert">{{ Session::get('success') }}</div>
@endif

@if($errors->any())
    <div class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $error)
            <p>・{{ $error }}</p>
        @endforeach
    </div>
@endif