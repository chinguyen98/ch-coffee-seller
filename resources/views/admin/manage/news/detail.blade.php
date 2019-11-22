@extends('layouts.admins')

@section('content')

<div class="col col-md-12 text-center">
    <h1>Chi tiết tin tức</h1>
    <div class="container mt-4">
        <form action="/admins/news/{{$news->id}}" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="id">Mã tin tức</span>
                </div>
                <input type="text" value="{{$news->id}}" class="form-control" aria-label="id" aria-describedby="name" disabled>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="title">Tiêu đề</span>
                </div>
                <input name="title" type="text" value="{{$news->title}}" class="form-control" placeholder="Nhập tiêu đề" aria-label="title" aria-describedby="title" required>
            </div>
            <div class="coffee-manage-image-container col col-md-12 mb-3 d-flex flex-column justify-content-center align-items-center">
                <img id="previewImg" src="{{asset('images/news/' . $news->image)}}" alt="Responsive image">
                <div class="input-group my-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Ảnh tiêu đề</span>
                    </div>
                    <div class="custom-file">
                        <input name="image" type="file" class="custom-file-input" id="inputGroupFile01" accept=".gif,.jpg,.jpeg,.png">
                        <label class="custom-file-label" for="inputGroupFile01">Nhấn để chọn upload hình</label>
                    </div>
                </div>
            </div>
            <input name="oldImage" type="hidden" value="{{$news->image}}">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="review">Giới thiệu</span>
                </div>
                <textarea class="col col-md-12" name="review" id="txt_review" required>{{$news->review}}</textarea>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="specific">Nội dung</span>
                </div>
                <textarea class="col col-md-12" name="content" id="txt_content" required>{!!$news->content!!}</textarea>
            </div>
            <input class="btn btn-primary" type="submit" value="CẬP NHẬT">

        </form>
        <form action="/admins/news/{{$news->id}}" method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" value="{{$news->id}}">
            <input class="btn btn-danger" type="submit" value="XOÁ">
        </form>

    </div>
</div>

<script src="{{asset('js/changePreviewImage.js')}}"></script>

@endsection