@extends('layouts.admins')

@section('content')
<div class="container text-center">
    <h1>Quản lý sản phẩm</h1>
    <div class="input-group my-4">
        <div class="input-group-prepend">
            <span class="input-group-text">Tìm kiếm sản phẩm</span>
        </div>
        <input id="coffee-name" name="name" type="text" aria-label="First name" class="form-control" placeholder="Nhập tên sản phẩm tại đây">
    </div>
    <a class="btn btn-primary" href="/admins/coffees/create">Thêm sản phẩm</a>
    <table class="table mt-4">
        <thead class="thead-light">
            <tr>
                <th scope="col">Mã</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody id="coffees-container">
            @foreach($coffees as $coffee)
            <tr>
                <th scope="row">{{$coffee->id}}</th>
                <td>{{$coffee->name}}</td>
                <td>
                    <div>
                        <a class="btn btn-secondary" href="/admins/coffees/{{$coffee->id}}">Xem thông tin</a>
                        <a class="btn btn-danger" href="#">Xoá</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="{{asset('/js/admin-coffee-search.js')}}"></script>
@endsection