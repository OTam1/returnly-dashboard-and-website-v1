@extends('layouts.user_type.auth')
@section('content')
<form action="{{ route('cities.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input name="user_id" value="{{Auth::user()->id}}" hidden/>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="exampleFormControlInput1">City Name(EN)</label>
          <input name="city_name_en" type="text" class="form-control" id="exampleFormControlInput1" placeholder="City Name(EN)" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="exampleFormControlInput1">City Name(AR)</label>
          <input name="city_name_ar" type="text" placeholder="City Name(AR)" class="form-control" required/>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary btn-lg w-100">Submit</button>
  </form>
  
@endsection
