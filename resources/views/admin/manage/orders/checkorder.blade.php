@extends('layouts.admins')

@section('content')

<div class="container">
    <h1 class="my-5 text-center">Duyệt đơn hàng</h1>

    @if(count($orders)>0)

    <h3 class="text-danger text-center">Có {{count($orders)}} đơn hàng cần duyệt!</h3>

    <div>
        <div>
            <table class="table mt-4">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Mã</th>
                        <th scope="col">Ngày đặt hàng</th>
                        <th scope="col">Tên khách hàng</th>
                        <th scope="col">Loại khách hàng</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody id="coffees-container">
                    @foreach($orders as $order)
                    <tr>
                        <th scope="row">{{$order->id}}</th>
                        <td scope="row">{{date('d-m-Y H:i:s', strtotime($order->created_at))}}</td>
                        <td scope="row">{{$order->guest_name}}</td>

                        @if($order->id_customer==null)

                        <td scope="row">Khách vãng lai</td>

                        @else

                        <td scope="row">Khách đăng nhập</td>

                        @endif

                        <td scope="row"><a href="/admins/checkorder/{{$order->id}}" class="btn btn-primary">Xem đơn hàng {{$order->id}}</a></td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!--
    <div class="none-checkOrder-container">
        <div class="mt-5 border row">
            <div class="p-2 col col-md-4 border">
                <h3 class="text-danger text-center">Khách vãng lai:</h3>
                <div><span class="none-checkOrder-title mr-2">Mã đơn hàng:</span> <span class="none-checkOrder-content">69</span></div>
                <div><span class="none-checkOrder-title mr-2">Tên khách hàng:</span> <span class="none-checkOrder-content">Nguyễn Đắc Chí</span></div>
                <div><span class="none-checkOrder-title mr-2">Địa chỉ giao hàng:</span> <span class="none-checkOrder-content">GH</span></div>
                <div><span class="none-checkOrder-title mr-2">Số điện thoại:</span> <span class="none-checkOrder-content">123</span></div>
                <div><span class="none-checkOrder-title mr-2">Email:</span> <span class="none-checkOrder-content">email</span></div>
                <div><span class="none-checkOrder-title mr-2">Thành tiền:</span> <span class="none-checkOrder-content">5000000</span></div>
            </div>
            <div class="p-2 col col-md-4 border">
                <h3 class="text-info text-center">Đơn hàng:</h3>
                <div class="d-flex flex-row justify-content-between">
                    <h5>Cà phê gì đó</h5>
                    <p>x 25</p>
                </div>
                <div class="d-flex flex-row justify-content-between">
                    <h5>Cà phê gì đó</h5>
                    <p>x 25</p>
                </div>
                <div class="d-flex flex-row justify-content-between">
                    <h5>Cà phê gì đó</h5>
                    <p>x 25</p>
                </div>
            </div>
            <div class="p-2 col col-md-4 border">
                <h3 class="text-secondary text-center">Xét duyệt:</h3>
                <div class="text-center d-flex flex-column">
                    <a href="#" class="btn btn-success my-2">GỌI ĐIỆN</a>
                    <a href="#" class="btn btn-primary my-2">DUYỆT ĐƠN HÀNG</a>
                    <a href="#" class="btn btn-danger my-2">HUỶ ĐƠN HÀNG</a>
                </div>
            </div>
        </div>
    </div>
-->

    @else

    <h3>Hiện tại không có đơn hàng cần duyệt!</h3>

    @endif

</div>

@endsection