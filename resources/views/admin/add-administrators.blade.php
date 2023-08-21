@extends('layouts.user_type.auth')
@section('content')
<form action="{{ route('admin.AddAdministrators') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="exampleFormControlInput1">Name</label>
          <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="exampleFormControlInput1">Email</label>
          <input name="email" type="email" placeholder="Email" class="form-control" required/>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="exampleFormControlInput1">Password</label>
            <input name="password" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Password" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="exampleFormControlInput1">phone</label>
            <input name="phone" type="text" placeholder="Phone no" class="form-control"/>
          </div>
        </div>
      </div>
    <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="exampleFormControlInput1">Location</label>
            <input name="location" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Location">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="exampleFormControlInput1">About</label>
            <input name="about_me" type="text" placeholder="About" class="form-control"/>
          </div>
        </div>
      </div>
    <button type="submit" class="btn btn-primary btn-lg w-100">Submit</button>
  </form>
  
@endsection
