@extends('layouts.loginmaster')
@section('content')
<div class="container home-height">
<div class="row">
 <div class="col-md-4 offset-md-4">
  @if ($errors->any())
  <div class="alert alert-danger">
    @if($errors->count() === 1)
    {{$errors->first()}}
    @else
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
     @endif
  </div>
@endif

@if(session()->has('message'))
<div class="alert alert-success">
  {{session('message')}}
  </div>
@endif

 <form action="{{route('register')}}" method="post" enctype="multipart/form-data">
 @csrf
  <div class="form-group">
    <input name="name" type="text" class="form-control" value="{{old('name')}}" placeholder="Enter Name">
  </div>
  <div class="form-group">
    <input name="email" type="email" class="form-control" value="{{old('email')}}" placeholder="Enter Email">
  </div>
  <div class="form-group">
  <select name="country" class="form-control">
      <option>Country</option>
      <option value="Afganistan">Afghanistan</option>
      <option value="Albania">Albania</option>
      <option value="Algeria">Algeria</option>
      <option value="American Samoa">American Samoa</option>
      <option value="Andorra">Andorra</option>
   </select>
  </div>
  <div class="form-group">
  <div class="form-check form-check-inline">
  <input name="gender" class="form-check-input" type="radio" value="Male">
  <label class="form-check-label">Male</label>
</div>
<div class="form-check form-check-inline">
  <input name="gender" class="form-check-input" type="radio" value="Female">
  <label class="form-check-label">Female</label>
</div>
</div>
<div class="form-group">
  <input name="photo" type="file" class="form-control">
</div>
  <div class="form-group">
    <input name="password" type="text" class="form-control"placeholder="Enter Password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
 </div>
</div>

</div>
@endsection