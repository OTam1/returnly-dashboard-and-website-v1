@extends('layouts.user_type.auth')

@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">{{__('dashboard.all-items')}}</h5>
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
                                        {{ __('dashboard.added-by-name') }}
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        {{ __('dashboard.added-by-email') }}
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        {{ __('dashboard.photo') }}
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('dashboard.item') }}
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('dashboard.color') }}
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('dashboard.category') }}
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('dashboard.sub-category') }}
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('dashboard.address') }}
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('dashboard.lost-datetime') }}
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('dashboard.create-datetime') }}
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('dashboard.status') }}
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('dashboard.show') }}
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('dashboard.action') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->id }}</p>
                                        </td>
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->user->name }}</p>
                                        </td>
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->user->email }}</p>
                                        </td>
                                        <td>
                                            <div>
                                                <img src="{{ asset('storage/' . $item->image) }}"
                                                    class="avatar avatar-sm me-3">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->item_name }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->color }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->category }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->sub_category }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->place }}</p>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $item->date }}
                                                {{ $item->time }}</span>
                                        </td>
                                        <td class="text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $item->created_at }}</span>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->status }}</p>
                                        </td>
                                        <td>
                                            <a href="{{ route('corprator.corpratorshow', ['item' => $item->id]) }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="View Request">
                                                <i class="fas fa-eye text-secondary"></i>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn bg-gradient-secondary dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false"
                                                style="margin-bottom: 0 !important;">
                                                {{ __('dashboard.action') }}
                                            </button>
                                            <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownMenuButton">
                                                {{-- <li>
                                                    <a class="dropdown-item border-radius-md"
                                                        href="{{ route('corprator.corpratorshow', ['item' => $item->id]) }}">
                                                        <i class="fas fa-eye text-secondary"></i> Show
                                                    </a>
                                                </li> --}}
                                                <li>
                                                    <a class="dropdown-item border-radius-md"
                                                        href="{{ route('corprator.itemstatus', ['item' => $item->id, 'status' => 'Pending']) }}">
                                                        <i class="fas fa-spinner text-secondary"></i> {{__('dashboard.pending')}}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item border-radius-md"
                                                        href="{{ route('corprator.itemstatus', ['item' => $item->id, 'status' => 'Waiting for verification']) }}">
                                                        <i class="fas fa-check text-secondary"></i> {{__('dashboard.waiting-for-verification')}}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item border-radius-md"
                                                        href="{{ route('corprator.itemstatus', ['item' => $item->id, 'status' => 'Waiting for payment']) }}">
                                                        <i class="fas fa-credit-card text-secondary"></i> {{__('dashboard.waiting-for-payment')}}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item border-radius-md"
                                                        href="{{ route('corprator.itemstatus', ['item' => $item->id, 'status' => 'Cancelled']) }}">
                                                        <i class="fas fa-ban text-secondary"></i> {{__('dashboard.cancelled')}}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item border-radius-md"
                                                        href="{{ route('corprator.itemstatus', ['item' => $item->id, 'status' => 'Delivered']) }}">
                                                        <i class="fas fa-truck-loading text-secondary"></i> {{__('dashboard.delivered')}}
                                                    </a>
                                                </li>
                                            </ul>
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
@endsection
