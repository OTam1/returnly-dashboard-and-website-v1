@extends('layouts.user_type.auth')

@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif


<form action="{{ route('corprator.store') }}" method="post" enctype="multipart/form-data">
@csrf
<!-- Add these hidden fields to your form -->
<input type="hidden" name="city" id="city" />
<input type="hidden" name="place" id="place" />
<input type="hidden" name="category" id="category" />
<input type="hidden" name="sub_category" id="sub_category" />
<input name="user_id" value="{{Auth::user()->id}}" hidden/>
<input name="status" value="Pending" hidden/>


<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="exampleFormControlInput1">{{ __('dashboard.item-name') }}</label>
      <input name="item_name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="{{ __('dashboard.wallet') }}" required>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label for="exampleFormControlInput1">{{ __('dashboard.color') }}</label>
      <input name="color" type="text" placeholder="{{ __('dashboard.black') }}" class="form-control" required/>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
        <label for="exampleFormControlInput1">{{ __('dashboard.city') }}</label>            
        <select name="city_id" class="form-control" id="city_id" required>
          <option disabled selected>{{ __('dashboard.select-an-option') }}</option>
          @foreach($cities as $city)
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
        <label for="exampleFormControlInput1">{{ __('dashboard.place') }}</label>            
        <select name="place_id" class="form-control" id="place_id" required>
          <option disabled selected>{{ __('dashboard.select-an-option') }}</option>
        </select>
        @error('place')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
        <label for="exampleFormControlInput1">{{ __('dashboard.category') }}</label>            
        <select name="category_id" class="form-control" id="category_id" required>
          <option disabled selected>{{ __('dashboard.select-an-option') }}</option>
          @foreach($categories as $category)
          <option value="{{$category->id}}">{{$category->category_name_en}}</option>
          @endforeach
        </select>
        @error('category')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
        <label for="exampleFormControlInput1">{{ __('dashboard.sub-category') }}</label>            
        <select name="sub_category_id" class="form-control" id="sub_category_id" required>
          <option disabled selected>{{ __('dashboard.select-an-option') }}</option>
        </select>
        @error('sub_category')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="example-date-input" class="form-control-label">{{ __('dashboard.date') }}</label>
      <input name="date" class="form-control" type="date" value="" id="example-date-input" onfocus="focused(this)" onfocusout="defocused(this)" required>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label for="example-time-input" class="form-control-label">{{ __('dashboard.time') }}</label>
      <input name="time" class="form-control" type="time" value="" id="example-time-input" onfocus="focused(this)" onfocusout="defocused(this)" required>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="exampleFormControlInput1">{{ __('dashboard.weight') }}</label>
      <input name="weight" type="number" step="0.5" min="0" class="form-control" id="exampleFormControlInput1" placeholder="{{ __('dashboard.weight-placeholder') }}" required>
    </div>
  </div>
</div>
<div class="form-group">
  <label for="exampleFormControlTextarea1">{{ __('dashboard.description') }}</label>
  <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" spellcheck="false" required></textarea>
</div>
<div class="form-group">
  <label for="exampleFormControlFile1">{{ __('dashboard.image') }}</label>
  <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
</div>  
<button type="submit" class="btn btn-primary btn-lg w-100">{{ __('dashboard.submit') }}</button>
</form>
@endsection

