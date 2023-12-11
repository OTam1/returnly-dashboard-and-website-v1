@extends('layouts.user_type.auth')

@section('content')

<div>
    {{-- <div class="alert alert-secondary mx-4" role="alert">
        <span class="text-white">
            <strong>Add, Edit, Delete features are not functional!</strong> This is a
            <strong>PRO</strong> feature! Click <strong>
            <a href="https://www.creative-tim.com/live/soft-ui-dashboard-pro-laravel" target="_blank" class="text-white">here</a></strong>
            to see the PRO product!
        </span> --}}
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">{{ __('dashboard.all-items') }}</h5>
                        </div>
                        {{-- <a href="#" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; New User</a> --}}
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('dashboard.id') }}
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        {{ __('dashboard.photo') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('dashboard.item') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('dashboard.color') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('dashboard.category') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('dashboard.sub-category') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('dashboard.address') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('dashboard.lost-datetime') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('dashboard.create-datetime') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('dashboard.status') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('dashboard.qrcode') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('dashboard.action') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                    <tr>
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->id }}</p>
                                        </td>
                                        <td>
                                            @if ($item->image != null)
                                            <div>
                                                <img src="{{ asset('storage/' . $item->image) }}" class="avatar avatar-sm me-3">
                                            </div>
                                            @else
                                            <div>
                                                <img src="{{ asset('assets/img/logo-ct.png') }}" class="avatar avatar-sm me-3">
                                            </div>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->item_name }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->color }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{$item->category}}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{$item->sub_category}}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{$item->place}}</p>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{$item->date}} {{$item->time}}</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{$item->created_at}}</span>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{$item->status}}</p>
                                        </td>
                                        <td class="text-center">
                                            <img hidden id="qrCodeImage{{ $item->id }}"  src="{{ asset($item->qr_code) }}" alt="QR Code">
                                            <button onclick="printQrCode({{ $item->id }})"  class="btn btn-primary">{{ __('dashboard.print-qrcode') }}</button>
                                        </td>
                                                                                
                                        <td class="text-center">
                                            <a href="{{ route('stored-items.show', ['item' => $item->id]) }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="View Request">
                                                <i class="fas fa-eye text-secondary"></i>
                                            </a>
                                            {{-- <span>
                                                <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                            </span> --}}
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <script>
    function printQrCode(itemId) {
        var qrCodeImage = document.getElementById('qrCodeImage' + itemId).src;
        var printWindow = window.open('', '_blank');
        
        // Create a new HTML document for printing
        printWindow.document.write('<html><head><title>Print QR Code</title></head><body>');
        printWindow.document.write('<style>@media print { body { margin: 0; } }</style>');
        printWindow.document.write('<img src="' + qrCodeImage + '" style="width:100%;">');
        printWindow.document.write('</body></html>');
        printWindow.document.close();

        // Wait for the image to load before triggering print
        printWindow.document.getElementsByTagName('img')[0].onload = function() {
            printWindow.print();
            printWindow.onafterprint = function() {
                printWindow.close();
            };
        };
    }
</script>

@endsection