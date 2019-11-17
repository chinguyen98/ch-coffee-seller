@extends('layouts.admins')

@section('content')
<div class="col col-md-12 text-center">
    <h1>Chi tiết sản phẩm</h1>
    <div class="container mt-4">
        <form action="#" method="post">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="id">Mã sản phẩm</span>
                </div>
                <input type="text" value="{{$coffee->id}}" class="form-control" aria-label="id" aria-describedby="name" disabled>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="name">Tên sản phẩm</span>
                </div>
                <input name="name" type="text" value="{{$coffee->name}}" class="form-control" placeholder="Nhập tên sản phẩm" aria-label="name" aria-describedby="name" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="price">Giá</span>
                </div>
                <input name="price" type="text" value="{{$coffee->price}}" class="form-control" placeholder="Nhập giá sản phẩm" aria-label="price" aria-describedby="price" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="price">Giá</span>
                </div>
                <input name="price" type="text" value="{{$coffee->price}}" class="form-control" placeholder="Nhập giá sản phẩm" aria-label="price" aria-describedby="price" required>
            </div>
        </form>
    </div>
</div>
@endsection