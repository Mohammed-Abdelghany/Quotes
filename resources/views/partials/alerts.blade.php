
@if ($errors->any())
    <div class="alert alert-danger">
       @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
       @endforeach
    </div>
    
@endif
@if (session('succsess'))
    <div class="alert alert-success">
       {{ session('succsess') }}
    </div>
@endif