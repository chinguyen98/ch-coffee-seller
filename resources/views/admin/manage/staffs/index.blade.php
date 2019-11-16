@extends('layouts.admins')

@section('content')
<h1 class="ml-5 mb-5">Danh sách nhân viên quản trị</h1>
<div class="container d-flex flex-md-row text-center mb-3">
    <div class="col col-md-2">
        <h4>STT</h4>
    </div>
    <div class="col col-md-4">
        <h4>Họ và tên</h4>
    </div>
    <div class="col col-md-6">

    </div>
</div>
<div class="container">
    @foreach($staffs as $staff)

    <div class="d-flex flex-md-row text-center flex-wrap border p-2 mb-2 justify-content-center align-items-center">
        <div class="col col-md-2">
            <span>{{$loop->index+1}}</span>
        </div>
        <div class="col col-md-4">
            <span>{{$staff->name}}</span>
        </div>
        <div class="col col-md-6">
            <span class="btn btn-primary" href="#">Sửa thông tin</span>
            <span class="btn btn-danger" href="#">Xoá tài khoản</span>
        </div>
    </div>

    @endforeach
</div>
@endsection