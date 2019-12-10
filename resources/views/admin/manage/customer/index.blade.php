@extends('layouts.admins')

@section('content') 
<div class="container text-center">
    <h1>QUẢN LÝ KHÁCH HÀNG</h1>
    
    <table class="table mt-4">
        <thead class="thead-light">
            <tr>
                <th scope="col">Mã</th>
                <th scope="col">Tên Khách Hàng</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody id="coffees-container">
            @foreach($customers as $c)
            <tr>
                <th scope="row">{{$c->id}}</th>
                <div>
                    <td><a href="/admins/customer/{{$c->id}}">{{$c->name}}</a></td>
                </div>
                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection