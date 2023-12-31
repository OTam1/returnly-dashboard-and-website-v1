@extends('layouts.user_type.guest')

@section('content')

  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">{{__('dashboard.welcome')}}</h3>
                  <p class="mb-0"> {{__('dashboard.please-enter-email')}}</p>
                </div>
                <div class="card-body">
                  <form role="form" method="POST" action="{{ route('admin.login.submit') }}">
                    @csrf
                    <label>{{__('dashboard.email')}}</label>
                    <div class="mb-3">
                      <input type="email" class="form-control" name="email" id="email" placeholder="{{__('dashboard.email')}}" value="" aria-label="Email" aria-describedby="email-addon">
                      @error('email')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                      @enderror
                    </div>
                    <label>{{__('dashboard.password')}}</label>
                    <div class="mb-3">
                      <input type="password" class="form-control" name="password" id="password" placeholder="{{__('dashboard.password')}}" value="" aria-label="Password" aria-describedby="password-addon">
                      @error('password')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                      @enderror
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                      <label class="form-check-label" for="rememberMe">{{__('dashboard.remember-me')}}</label>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">{{__('dashboard.signin')}}</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

@endsection
