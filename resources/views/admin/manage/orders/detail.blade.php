@extends('layouts.admins')

@section('content')

<div class="none-checkOrder-container container">
    <a href="/admins/checkorder" class="btn btn-info">Quay lại</a>
    <div class="p-2 col col-md-12 border text-center mt-3 bg-dark">
        <div class="text-center d-flex flex-row justify-content-around align-items-center">
            <h3 class="text-muted text-center">Xét duyệt:</h3>
            <a href="#" class="btn btn-success my-2">GỌI ĐIỆN</a>
            <a href="#" class="btn btn-primary my-2">DUYỆT ĐƠN HÀNG</a>
            <a href="#" class="btn btn-danger my-2">HUỶ ĐƠN HÀNG</a>
        </div>
    </div>
    <div class="mt-5 row">
        <div class="p-2 col col-md-5 border">
            @if($order->id_guest==null)

            <h3 class="text-danger text-center">Khách vãng lai</h3>
            <div><span class="none-checkOrder-title mr-2">Mã đơn hàng:</span> <span class="none-checkOrder-content">{{$order->id}}</span></div>
            <div><span class="none-checkOrder-title mr-2">Tên khách hàng:</span> <span class="none-checkOrder-content">{{$order->guest_name}}</span></div>
            <div><span class="none-checkOrder-title mr-2">Địa chỉ giao hàng:</span> <span class="none-checkOrder-content">{{$order->guest_address}}</span></div>
            <div><span class="none-checkOrder-title mr-2">Số điện thoại:</span> <span class="none-checkOrder-content">{{$order->guest_phone}}</span></div>
            <div><span class="none-checkOrder-title mr-2">Email:</span> <span class="none-checkOrder-content">{{$order->guest_email}}</span></div>
            <div><span class="none-checkOrder-title mr-2">Thành tiền:</span> <span class="none-checkOrder-content text-danger">{{number_format($totalPrice)}} VND</span></div>

            @else

            @endif
        </div>
        <div class="p-2 col col-md-7 border">
            <h3 class="text-info text-center">Đơn hàng:</h3>
            <div class="mt-2">
                @foreach($order->order_details as $item)

                <div class="d-flex flex-row justify-content-between flex-wrap">
                    <p>{{$item->coffee_name->name}}</p>
                    <div class="d-flex flex-row justify-content-between">
                        <p>{{number_format($item->price)}} VND</p>
                        <p class="ml-5">x {{$item->quantity}}</p>
                    </div>
                </div>

                @endforeach
            </div>
        </div>

    </div>
</div>

@endsection