@extends('layouts.user_type.auth')
@section('content')
<form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input name="user_id" value="{{Auth::user()->id}}" hidden/>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="exampleFormControlInput1">Category Name(EN)</label>
          <input name="category_name_en" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Category Name(EN)" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="exampleFormControlInput1">Category Name(AR)</label>
          <input name="category_name_ar" type="text" placeholder="Category Name(AR)" class="form-control" required/>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary btn-lg w-100">Submit</button>
  </form>
  
@endsection
