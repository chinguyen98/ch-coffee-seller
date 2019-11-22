@extends('layouts.admins')

@section('content')

<div class="container text-center">
    <h1>QUẢN LÝ TIN TỨC</h1>
    <a class="btn btn-primary" href="/admins/coffees/create">Thêm tin tức</a>
    <table class="table mt-4">
        <thead class="thead-light">
            <tr>
                <th scope="col">Mã</th>
                <th scope="col">Tiêu Đề</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody id="coffees-container">
            @foreach($news as $new)
            <tr>
                <th scope="row">{{$new->id}}</th>
                <div>
                    <td><a href="/admins/news/{{$new->id}}">{{$new->title}}</a></td>
                </div>
                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

