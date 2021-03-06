@extends('layouts.admins')

@section('content')

@if($order_count>0)

<div class="text-center popup-flash-approval-order">
    <h3>Thông báo:</h3>
    <p>Hiện tại có {{$order_count}} đơn hàng cần duyệt</p>
    <a href="/admins/checkorder" class="btn btn-danger">Xem đơn hàng cần duyệt</a>
</div>

@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thông báo</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if(Auth::user()->isSuperAdmin())
                    Chào mừng SUPER ADMIN website CH_Coffee!!!!!
                    @else
                    Xin chào ADMIN {{Auth::user()->name}} !
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
<div class=" col col-md-12 d-flex flex-wrap text-center mt-4">
    <a class="nav-link col col-md-6" href="/admins/coffees">
        <h3>Quản lý sản phẩm</h3>
    </a>
    <a class="nav-link col col-md-6" href="/admins/news">
        <h3>Quản lý tin tức</h3>
    </a>
    <a class="nav-link col col-md-6" href="/admins/customer">
        <h3>Quản lý khách hàng</h3>
    </a>
    <a class="nav-link col col-md-6" href="/admins/ordermanager">
        <h3>Quản lý đơn hàng</h3>
    </a>
    <a class="nav-link col col-md-6" href="/admins/checkorder">
        <h3>Duyệt đơn hàng</h3>
    </a>
</div>

@if(Auth::user()->isSuperAdmin())
<hr>
<div class="container ml-5">
    <a class="nav-link col col-md-6" href="/admins/register">
        <h3>Đăng ký tài khoản cho nhân viên</h3>
    </a>
    <a class="nav-link col col-md-6" href="/admins/staffs">
        <h3>Quản lý nhân viên</h3>
    </a>
</div>
@endif

@endsection