@extends('layouts.user_type.auth')

@section('content')
@if(session('success'))
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
                            <h5 class="mb-0">All Items</h5>
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
                                        ID
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Added By (Name)
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Added By (Email)
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Photo
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Item
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Color
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Category
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Sub-Category
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Address
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Item Lost Date/Time
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Creation Date/Time
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Show
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
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
                                                <img src="{{ asset('storage/' . $item->image) }}" class="avatar avatar-sm me-3">
                                            </div>
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
                                            <a href="{{ route('adminitems.show', ['item' => $item->id]) }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="View Request">
                                                <i class="fas fa-eye text-secondary"></i>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn bg-gradient-secondary dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false"
                                                style="margin-bottom: 0 !important;">
                                                Actions
                                            </button>
                                            <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownMenuButton">
                                                {{-- <li>
                                                    <a class="dropdown-item border-radius-md"
                                                        href="{{ route('adminitems.show', ['item' => $item->id]) }}">
                                                        <i class="fas fa-eye text-secondary"></i> Show
                                                    </a>
                                                </li> --}}
                                                <li>
                                                    <a class="dropdown-item border-radius-md"
                                                        href="{{ route('admin.itemstatus', ['item' => $item->id, 'status' => 'Pending']) }}">
                                                        <i class="fas fa-spinner text-secondary"></i> Pending
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item border-radius-md"
                                                        href="{{ route('admin.itemstatus', ['item' => $item->id, 'status' => 'Waiting for verification']) }}">
                                                        <i class="fas fa-check text-secondary"></i> Waiting for verification
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item border-radius-md"
                                                        href="{{ route('admin.itemstatus', ['item' => $item->id, 'status' => 'Waiting for payment']) }}">
                                                        <i class="fas fa-credit-card text-secondary"></i> Waiting for
                                                        payment
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item border-radius-md"
                                                        href="{{ route('admin.itemstatus', ['item' => $item->id, 'status' => 'Cancelled']) }}">
                                                        <i class="fas fa-ban text-secondary"></i> Cancelled
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item border-radius-md"
                                                        href="{{ route('admin.itemstatus', ['item' => $item->id, 'status' => 'Delivered']) }}">
                                                        <i class="fas fa-truck-loading text-secondary"></i> Delivered
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