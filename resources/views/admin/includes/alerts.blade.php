@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>
@endif

@if (session('msg'))
<div class="alert alert-success" role="alert">
    {{(session('msg'))}}
  </div>
@endif
