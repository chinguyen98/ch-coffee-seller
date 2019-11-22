@extends('layouts.admins')

@section('content')

@if ( Session::has('flash_message') )

<div class="text-center popup-flash-mess">
    <h3>Thông báo:</h3>
    <p>{{Session::get('flash_message')}}</p>
</div>

@endif


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
                <div>
                    <td><a href="/admins/coffees/{{$coffee->id}}">{{$coffee->name}}</a></td>
                </div>
                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="{{asset('/js/admin-coffee-search.js')}}"></script>
@endsection