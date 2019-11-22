@extends('layouts.admins')

@section('content')


@if ( Session::has('flash_message') )

<div class="text-center popup-flash-mess">
    <h3>Thông báo:</h3>
    <p>{{Session::get('flash_message')}}</p>
</div>

@endif

<div class="col col-md-12 text-center">
    <h1>Chi tiết sản phẩm</h1>
    <div class="container mt-4">
        <form action="/admins/coffees/{{$coffee->id}}" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
            @csrf
            @method('PUT')
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
            <div class="coffee-manage-image-container col col-md-12 mb-3 d-flex flex-column justify-content-center align-items-center">
                <img id="previewImg" src="{{asset('images/coffees/' . $coffee->image)}}" alt="Responsive image">
                <div class="input-group my-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Ảnh đại diện sản phẩm</span>
                    </div>
                    <div class="custom-file">
                        <input name="image" type="file" class="custom-file-input" id="inputGroupFile01" accept=".gif,.jpg,.jpeg,.png">
                        <label class="custom-file-label" for="inputGroupFile01">Nhấn để chọn upload hình</label>
                    </div>
                </div>
            </div>
            <input name="oldImage" type="hidden" value="{{$coffee->image}}">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="price">Giá</span>
                </div>
                <input name="price" type="text" value="{{$coffee->price}}" class="form-control" placeholder="Nhập giá sản phẩm" aria-label="price" aria-describedby="price" required>
                <h1 class="valid-err" id="price-err"></h1>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="info">Thông tin</span>
                </div>
                <textarea class="col col-md-12" name="info" id="txt_info" required>{{$coffee->info}}</textarea>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="specific">Đặc trưng</span>
                </div>
                <input name="specific" type="text" value="{{$coffee->specific}}" class="form-control" placeholder="Nhập đặc trưng của sản phẩm" aria-label="specific" aria-describedby="specific" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="ingredient">Nguyên liệu</span>
                </div>
                <input name="ingredient" type="text" value="{{$coffee->ingredient}}" class="form-control" placeholder="Nhập nguyên liệu" aria-label="ingredient" aria-describedby="ingredient" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="ingredient">Hạn sử dụng (tháng)</span>
                </div>
                <input name="expired" type="text" value="{{$coffee->expired}}" class="form-control" placeholder="Nhập hạn sử dụng" aria-label="ingredient" aria-describedby="ingredient" required>
                <h3 class="valid-err" id="expired-err"></h3>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="price">Trọng lượng</span>
                </div>
                <input name="capacity" type="text" value="{{$coffee->capacity}}" class="form-control" placeholder="Nhập giá sản phẩm" aria-label="price" aria-describedby="price" required>
                <h3 class="valid-err" id="capacity-err"></h3>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="unit">Đơn vị tính</span>
                </div>
                <select class="custom-select" name="id_unit" id="unit">
                    @foreach ($units as $unit)

                    @if ($unit->id==$coffee->id_unit)

                    <option value="{{$unit->id}}" selected>{{$unit->name}} ({{$unit->dram}})</option>

                    @else

                    <option value="{{$unit->id}}">{{$unit->name}} ({{$unit->dram}})</option>

                    @endif

                    @endforeach
                </select>

            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="unit">Nhãn hiệu</span>
                </div>
                <select class="custom-select" name="id_brand" id="unit">
                    @foreach ($brands as $brand)

                    @if ($brand->id==$coffee->id_brand)

                    <option value="{{$brand->id}}" selected>{{$brand->name}}</option>

                    @else

                    <option value="{{$brand->id}}">{{$brand->name}}</option>

                    @endif

                    @endforeach
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="type">Loại cà phê</span>
                </div>
                <select class="custom-select" name="id_type" id="type">
                    @foreach ($coffee_types as $coffee_type)

                    @if ($coffee_type->id==$coffee->id_type)

                    <option value="{{$coffee_type->id}}" selected>{{$coffee_type->name}}</option>

                    @else

                    <option value="{{$coffee_type->id}}">{{$coffee_type->name}}</option>

                    @endif

                    @endforeach
                </select>
            </div>
            <input class="btn btn-primary" type="submit" value="CẬP NHẬT">

        </form>
        <form action="/admins/coffees/{{$coffee->id}}" method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" value="{{$coffee->id}}">
            <input class="btn btn-danger" type="submit" value="XOÁ">
        </form>

    </div>
</div>

<script>
    const name = document.querySelector('input[name=name]');
    const price = document.querySelector('input[name=price]');
    const ingredient = document.querySelector('input[name=ingredient]');
    const expired = document.querySelector('input[name=expired]');
    const capacity = document.querySelector('input[name=capacity]');
    const info = document.querySelector('textarea');
    const validErrs = document.querySelectorAll('.valid-err');

    function validateForm(e) {
        let errors = [];
        validErrs.forEach(item => {
            item.innerHTML = "";
        })
        if (isNaN(price.value)) {
            errors.push({
                'id': 'price-err',
                'value': 'Vui lòng nhập đúng định dạng giá sản phẩm! (Vd: 500000)'
            });
        };
        if (isNaN(capacity.value)) {
            errors.push({
                'id': 'capacity-err',
                'value': 'Vui lòng nhập đúng định dạng trọng lượng! (Vd: 1000)'
            });
        }
        if (isNaN(expired.value)) {
            errors.push({
                'id': 'expired-err',
                'value': 'Vui lòng nhập đúng định dạng hạn sử dụng! (Vd: 12)'
            });
        }
        if (errors.length > 0) {
            alert("Có lỗi khi nhập liệu. Vui lòng kiểm tra lại!");
            errors.forEach(err => {
                document.querySelector(`#${err.id}`).innerHTML = err.value;
                document.querySelector(`#${err.id}`).style.color = "red";
            });
            return false;
        };
        return true;
    }
</script>
<script src="{{asset('js/changePreviewImage.js')}}"></script>

@endsection