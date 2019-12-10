@extends('layouts.admins')

@section('content')


<div class="container">
    <h1 class="my-5 text-center">QUẢN LÝ ĐƠN HÀNG</h1>

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
                        <td scope="row">{{$order->created_at}}</td>
                        <td scope="row">{{$order->guest_name}}</td>

                        @if($order->id_customer==null)

                        <td scope="row">Khách vãng lai</td>

                        @else

                        <td scope="row">Khách đăng nhập</td>

                        @endif
                        <td scope="row"><a href="/admins/ordermanager/{{$order->id}}" class="btn btn-primary">Xem Chi Tiết Đơn Hàng</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection