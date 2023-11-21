@extends('layouts.user_type.auth')

@section('content')

<form>
    <label for="exampleFormControlInput1">Item image:</label>
    <div class="centered-image-container" style="text-align: center;">
        <img id="fullscreen-image" src="{{ asset('storage/' . $item->image) }}" alt="Image Title" width="8%">
    </div>
      @if ($item->status == "Waiting for verification")
      <div class="progress-wrapper">
        <div class="progress-info">
          <div class="progress-percentage">
            <span class="text-sm font-weight-normal">Status: {{$item->status}} - 80%</span>
          </div>
        </div>
        <div class="progress">
          <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
        </div>
      </div>
      @endif
      @if ($item->status == "Cancelled")
      <div class="progress-wrapper">
        <div class="progress-info">
          <div class="progress-percentage">
            <span class="text-sm font-weight-normal">Status: {{$item->status}} - 100%</span>
          </div>
        </div>
        <div class="progress">
          <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
        </div>
      </div>
      @endif
      @if ($item->status == "Delivered")
      <div class="progress-wrapper">
        <div class="progress-info">
          <div class="progress-percentage">
            <span class="text-sm font-weight-normal">Status: {{$item->status}} - 100%</span>
          </div>
        </div>
        <div class="progress">
          <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
        </div>
      </div>
      @endif
      @if ($item->status == "Pending")
      <div class="progress-wrapper">
        <div class="progress-info">
          <div class="progress-percentage">
            <span class="text-sm font-weight-normal">Status: {{$item->status}} - 20%</span>
          </div>
        </div>
        <div class="progress">
          <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
        </div>
      </div>
      @endif

      @if ($item->status == "Waiting for payment")
      <div class="progress-wrapper">
        <div class="progress-info">
          <div class="progress-percentage">
            <span class="text-sm font-weight-normal">Status: {{$item->status}} - 50%</span>
          </div>
        </div>
        <div class="progress">
          <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
        </div>
      </div>
      @endif

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="exampleFormControlInput1">Item name</label>
          <input name="item_name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Wallet" value="{{$item->item_name}}" disabled>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="exampleFormControlInput1">Color</label>
          <input name="color" type="text" placeholder="Black" class="form-control" value="{{$item->color}}" disabled/>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
            <label for="exampleFormControlInput1">City</label>            
            <select name="city" class="form-control" id="exampleFormControlSelect1"  disabled>
              <option disabled selected>{{$item->color}}</option>
            </select>
            @error('city')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
            <label for="exampleFormControlInput1">Place</label>            
            <select name="place" class="form-control" id="exampleFormControlSelect1" disabled>
                <option disabled selected>{{$item->place}}</option>
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
            <label for="exampleFormControlInput1">Category</label>            
            <select name="category" class="form-control" id="exampleFormControlSelect1" disabled>
                <option disabled selected>{{$item->category}}</option>
            </select>
            @error('category')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
            <label for="exampleFormControlInput1">Sub-Category</label>            
            <select name="sub_category" class="form-control" id="exampleFormControlSelect1" disabled>
                <option disabled selected>{{$item->sub_category}}</option>
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
          <label for="example-date-input" class="form-control-label">Date</label>
          <input name="date" class="form-control" type="date" value="{{$item->date}}" id="example-date-input" onfocus="focused(this)" onfocusout="defocused(this)" disabled>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="example-time-input" class="form-control-label">Time</label>
          <input name="time" class="form-control" type="time" value="{{$item->time}}" id="example-time-input" onfocus="focused(this)" onfocusout="defocused(this)" disabled>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Description</label>
      <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" spellcheck="false" disabled>{{$item->description}}</textarea>
    </div>
  </form>
@endsection