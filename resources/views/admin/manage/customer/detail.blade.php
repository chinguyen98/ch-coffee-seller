@extends('layouts.admins')

@section('content')
<div class="col col-md-12 text-center">
    <h1>Chi tiết khách hàng</h1>
    <div class="container mt-4">
        <form action="/admins/customer/{{$customers->id}}" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="id">Mã khách hàng</span>
                </div>
                <input type="text" value="{{$customers->id}}" class="form-control" aria-label="id" aria-describedby="name" disabled>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="email">Địa Chỉ Email</span>
                </div>
                <input type="text" value="{{$customers->email}}" class="form-control" aria-label="email" aria-describedby="name" disabled>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="name">Tên khách hàng</span>
                </div>
                <input type="text" value="{{$customers->name}}" class="form-control" aria-label="name" aria-describedby="name" disabled>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="address">Địa Chỉ</span>
                </div>
                <input type="text" value="{{$customers->address}}" class="form-control" aria-label="address" aria-describedby="name" disabled>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="phone_number">Số Điện Thoại</span>
                </div>
                <input type="text" value="{{$customers->phone_number}}" class="form-control" aria-label="phone_number" aria-describedby="name" disabled>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="created_at">Ngày Tạo Tài Khoản</span>
                </div>
                <input type="text" value="{{$customers->created_at}}" class="form-control" aria-label="created_at" aria-describedby="name" disabled>
            </div>
           
            
            <input class="btn btn-danger" type="submit" value="XÓA">

        </form>
    

    </div>
</div>
@endsection