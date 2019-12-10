@extends('layouts.admins')

@section('content')
<div class="col col-md-12 text-center">
    <h1>CHI TIẾT ĐƠN HÀNG</h1>
    <div class="container mt-4">
        <div class="text-left text-font">
            <div class="input-group mb-3" >
                <div class="input-group-prepend">
                    <span class="input-group-text" id="id">Mã Đơn Hàng</span>
                </div>
                <input type="text"  value= "{{$order->id}}" class="form-control" aria-label="id" aria-describedby="name" disabled>
            </div>
            @if($customer==null)
            <div class="input-group mb-3" >
                <div class="input-group-prepend">
                    <span class="input-group-text" id="guest_name">Tên Khách Hàng</span>
                </div>
                <input type="text"  value= "{{$order->guest_name}}" class="form-control" aria-label="guest_name" aria-describedby="name" disabled>
            </div>
            <div class="input-group mb-3" >
                <div class="input-group-prepend">
                    <span class="input-group-text" id="guest_address">Địa Chỉ</span>
                </div>
                <input type="text"  value= "{{$order->guest_address}}" class="form-control" aria-label="guest_address" aria-describedby="name" disabled>
            </div>
            <div class="input-group mb-3" >
                <div class="input-group-prepend">
                    <span class="input-group-text" id="guest_email">Email</span>
                </div>
                <input type="text"  value= "{{$order->guest_email}}" class="form-control" aria-label="guest_email" aria-describedby="name" disabled>
            </div>
            <div class="input-group mb-3" >
                <div class="input-group-prepend">
                    <span class="input-group-text" id="guest_phone">Số Điện Thoại</span>
                </div>
                <input type="text"  value= "{{$order->guest_phone}}" class="form-control" aria-label="guest_phone" aria-describedby="name" disabled>
            </div>
            @else
            <div class="input-group mb-3" >
                <div class="input-group-prepend">
                    <span class="input-group-text" id="name">Tên Khách Hàng</span>
                </div>
                <input type="text"  value= "{{$customer->name}}" class="form-control" aria-label="name" aria-describedby="name" disabled>
            </div>
            <div class="input-group mb-3" >
                <div class="input-group-prepend">
                    <span class="input-group-text" id="address">Địa Chỉ</span>
                </div>
                <input type="text"  value= "{{$customer->address}}" class="form-control" aria-label="address" aria-describedby="name" disabled>
            </div>
            <div class="input-group mb-3" >
                <div class="input-group-prepend">
                    <span class="input-group-text" id="email">Email</span>
                </div>
                <input type="text"  value= "{{$customer->email}}" class="form-control" aria-label="email" aria-describedby="name" disabled>
            </div>
            <div class="input-group mb-3" >
                <div class="input-group-prepend">
                    <span class="input-group-text" id="phone_number">Số Điện Thoại</span>
                </div>
                <input type="text"  value= "{{$customer->phone_number}}" class="form-control" aria-label="phone_number" aria-describedby="name" disabled>
            </div>
            @endif
            <div class="input-group mb-3" >
                <div class="input-group-prepend">
                    <span class="input-group-text" id="created_at">Ngày Đặt Hàng</span>
                </div>
                <input type="text"  value= "{{$order->created_at}}" class="form-control" aria-label="created_at" aria-describedby="name" disabled>
            </div>
            <div class="input-group mb-3" >
                <div class="input-group-prepend">
                    <span class="input-group-text" id="id_admin">Mã Quản Trị</span>
                </div>
                <input type="text"  value= "{{$order->id_admin}}" class="form-control" aria-label="id_admin" aria-describedby="name" disabled>
            </div>
            <h2>Danh Sách Sản Phẩm</h2>
            <div>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên Sản Phẩm</th>
                            <th scope="col">Số Lượng</th>
                            <th scope="col">Giá Tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orderdetail as $item)
                        <tr>
                            <th scope="row">{{$loop->index +1}}</th>
                            <td>{{$item->coffee->name}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->price}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex flex-row justify-content-between">
                <h2>Tổng Tiền: </h2>
                <h2 class="font-weight-bold text-danger">{{number_format($totalprice)}}</h2>
            </div>


        </div>
    </div>
</div>
@endsection