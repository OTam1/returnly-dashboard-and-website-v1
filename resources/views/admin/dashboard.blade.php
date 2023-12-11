@extends('layouts.user_type.auth')

@section('content')

  <div class="row">
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{__('dashboard.todays-Registered-users')}}</p>
                <h5 class="font-weight-bolder mb-0">
                  {{$todayUsersCount}}
                  <span class="text-success text-sm font-weight-bolder">@php $percentage = ($todayUsersCount / $totalUsers) * 100; echo($percentage.'%'); @endphp
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{__('dashboard.total-Registered-users')}}</p>
                <h5 class="font-weight-bolder mb-0">
                  {{$totalUsers}}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{__('dashboard.todays-loggedin-users')}}</p>
                <h5 class="font-weight-bolder mb-0">
                  {{$todayUsersloginCount}}
                  <span class="text-success text-sm font-weight-bolder">@php
                    if ($totalUsers != 0){
                      $percentage = ($todayUsersloginCount / $totalUsers) * 100;
                      echo number_format($percentage, 2) . '%';
                    } else {
                        echo 'N/A'; // Handle the case where $totalItems is zero.
                    }
                @endphp                
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{__('dashboard.todays-requested-items')}}</p>
                <h5 class="font-weight-bolder mb-0">
                  {{$todayItemsCount}}
                  <span class="text-success text-sm font-weight-bolder">@php
                    if ($totalItems != 0) {
                        $percentage = ($todayItemsCount / $totalItems) * 100;
                        echo number_format($percentage, 2) . '%';
                    } else {
                        echo 'N/A'; // Handle the case where $totalItems is zero.
                    }
                @endphp                
                  </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{__('dashboard.total-requested-items')}}</p>
                <h5 class="font-weight-bolder mb-0">
                  {{$totalItems}}
                  </span>
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{__('dashboard.todays-actioned-requests')}} </p>
                <h5 class="font-weight-bolder mb-0">
                  {{$todayItemsActionedCount}}
                  <span class="text-success text-sm font-weight-bolder">@php
                    if ($totalItems != 0) {
                    $percentage = ($todayItemsActionedCount / $totalItems) * 100;
                    echo number_format($percentage, 2) . '%';
                    } else {
                        echo 'N/A'; // Handle the case where $totalItems is zero.
                    }
                @endphp                
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{__('dashboard.pending-requests')}}</p>
                <h5 class="font-weight-bolder mb-0">
                  {{$pendingCount}}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{__('dashboard.waiting-payment')}}</p>
                <h5 class="font-weight-bolder mb-0">
                  {{$waitingCount}}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{__('dashboard.delivered-requests')}}</p>
                <h5 class="font-weight-bolder mb-0">
                  {{$deliveredCount}}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{__('dashboard.cancelled-requests')}}</p>
                <h5 class="font-weight-bolder mb-0">
                  {{$cancelledCount}}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
  @endif


  {{-- <form action="{{ route('items.create') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input name="user_id" value="{{Auth::user()->id}}" hidden/>
    <input name="city_id" value="1" hidden/>
    <input name="place_id" value="1" hidden/>
    <input name="category_id" value="1" hidden/>
    <input name="sub_category_id" value="1" hidden/>
    <input name="status" value="Pending" hidden/>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="exampleFormControlInput1">Item name</label>
          <input name="item_name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Wallet" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="exampleFormControlInput1">Color</label>
          <input name="color" type="text" placeholder="Black" class="form-control" required/>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
            <label for="exampleFormControlInput1">City</label>            
            <select name="city" class="form-control" id="exampleFormControlSelect1" required>
              <option disabled selected>Select an option</option>
              <option>Dammam</option>
              <option>Lorem ipsum</option>
              <option>Lorem ipsum</option>
              <option>Lorem ipsum</option>
              <option>Lorem ipsum</option>
            </select>
            @error('city')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
            <label for="exampleFormControlInput1">Place</label>            
            <select name="place" class="form-control" id="exampleFormControlSelect1" required>
              <option disabled selected>Select an option</option>
              <option>King Fahd International Airport</option>
              <option>Lorem ipsum</option>
              <option>Lorem ipsum</option>
              <option>Lorem ipsum</option>
              <option>Lorem ipsum</option>
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
            <select name="category" class="form-control" id="exampleFormControlSelect1" required>
              <option disabled selected>Select an option</option>
              <option>Pocket Items</option>
              <option>Lorem ipsum</option>
              <option>Lorem ipsum</option>
              <option>Lorem ipsum</option>
              <option>Lorem ipsum</option>
            </select>
            @error('category')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
            <label for="exampleFormControlInput1">Sub-Category</label>            
            <select name="sub_category" class="form-control" id="exampleFormControlSelect1" required>
              <option disabled selected>Select an option</option>
              <option>Wallets</option>
              <option>Lorem ipsum</option>
              <option>Lorem ipsum</option>
              <option>Lorem ipsum</option>
              <option>Lorem ipsum</option>
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
          <input name="date" class="form-control" type="date" value="" id="example-date-input" onfocus="focused(this)" onfocusout="defocused(this)" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="example-time-input" class="form-control-label">Time</label>
          <input name="time" class="form-control" type="time" value="" id="example-time-input" onfocus="focused(this)" onfocusout="defocused(this)" required>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Description</label>
      <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" spellcheck="false" required></textarea>
    </div>
    <div class="form-group">
      <label for="exampleFormControlFile1">Image</label>
      <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
  </div>  
    <button type="submit" class="btn btn-primary btn-lg w-100">Submit</button>
  </form> --}}
  
@endsection
@push('dashboard')
  {{-- <script>
    window.onload = function() {
      var ctx = document.getElementById("chart-bars").getContext("2d");

      new Chart(ctx, {
        type: "bar",
        data: {
          labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          datasets: [{
            label: "Sales",
            tension: 0.4,
            borderWidth: 0,
            borderRadius: 4,
            borderSkipped: false,
            backgroundColor: "#fff",
            data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
            maxBarThickness: 6
          }, ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            }
          },
          interaction: {
            intersect: false,
            mode: 'index',
          },
          scales: {
            y: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
              },
              ticks: {
                suggestedMin: 0,
                suggestedMax: 500,
                beginAtZero: true,
                padding: 15,
                font: {
                  size: 14,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
                color: "#fff"
              },
            },
            x: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false
              },
              ticks: {
                display: false
              },
            },
          },
        },
      });


      var ctx2 = document.getElementById("chart-line").getContext("2d");

      var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

      gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
      gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
      gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

      var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

      gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
      gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
      gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

      new Chart(ctx2, {
        type: "line",
        data: {
          labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          datasets: [{
              label: "Mobile apps",
              tension: 0.4,
              borderWidth: 0,
              pointRadius: 0,
              borderColor: "#cb0c9f",
              borderWidth: 3,
              backgroundColor: gradientStroke1,
              fill: true,
              data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
              maxBarThickness: 6

            },
            {
              label: "Websites",
              tension: 0.4,
              borderWidth: 0,
              pointRadius: 0,
              borderColor: "#3A416F",
              borderWidth: 3,
              backgroundColor: gradientStroke2,
              fill: true,
              data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
              maxBarThickness: 6
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            }
          },
          interaction: {
            intersect: false,
            mode: 'index',
          },
          scales: {
            y: {
              grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [5, 5]
              },
              ticks: {
                display: true,
                padding: 10,
                color: '#b2b9bf',
                font: {
                  size: 11,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
              }
            },
            x: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
                borderDash: [5, 5]
              },
              ticks: {
                display: true,
                color: '#b2b9bf',
                padding: 20,
                font: {
                  size: 11,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
              }
            },
          },
        },
      });
    }
  </script> --}}
@endpush

