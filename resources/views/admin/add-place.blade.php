@extends('layouts.user_type.auth')
@section('content')
<form action="{{ route('places.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input name="user_id" value="{{Auth::user()->id}}" hidden/>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="exampleFormControlInput1">Place Name(EN)</label>
          <input name="place_name_en" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Place Name(EN)" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="exampleFormControlInput1">Place Name(AR)</label>
          <input name="place_name_ar" type="text" placeholder="Place Name(AR)" class="form-control" required/>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
            <label for="exampleFormControlInput1">City</label>            
            <select name="city_id" class="form-control" id="exampleFormControlSelect1" required>
              <option disabled selected>Select an option</option>
              @foreach ($cities as $city)
              <option value="{{$city->id}}">{{$city->city_name_en}}</option>    
              @endforeach
            </select>
            @error('city')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary btn-lg w-100">Submit</button>
  </form>
  
@endsection
