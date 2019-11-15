@extends('layouts.admins')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    Chúc mừng {{Auth::user()->name}} đã đăng nhập thành công!!!!!!
                </div>
            </div>
        </div>
    </div>

    @if(Auth::user()->isSuperAdmin())

    <div class="col col-md-8">
        <a class="nav-link" href="/admins/register"><h3>Đăng ký tài khoản cho nhân viên</h3></a>
        <a class="nav-link" href="#"><h3>Quản lý nhân viên</h3></a>
    </div>

    @endif

</div>
@endsection