@extends('layouts.user_type.auth')
@section('content')
<form action="{{ route('admin.AssignCorpratorToPlace') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="row">
          <div class="form-group">
              <label for="exampleFormControlInput1">Corprator User</label>            
              <select name="user_id" class="form-control" id="exampleFormControlSelect1" required>
                <option disabled selected>Select an option</option>
                @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }} - ({{ $user->email }})</option>    
                @endforeach
              </select>
              @error('user_id')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
        </div>
  
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
            <label for="exampleFormControlInput1">City</label>            
            <select name="city_id" class="form-control" id="city_id" required>
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
      <div class="col-md-6">
        <div class="form-group">
            <label for="exampleFormControlInput1">Place</label>            
            <select name="place_id" class="form-control" id="place_id" required>
              <option disabled selected>Select an option</option>
            </select>
            @error('place_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
      </div>
  </div>
    <button type="submit" class="btn btn-primary btn-lg w-100">Submit</button>
  </form>
  
@endsection
