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

    @else

    <h3>Hiện tại không có đơn hàng cần duyệt!</h3>

    @endif

</div>

@endsection