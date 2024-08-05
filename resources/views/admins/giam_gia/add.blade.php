@extends('layouts.admins.master')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="d-sm align-items-center justify-content-between mb-5">
        <div>
            <h1 class="h3 text-gray-800">{{ $title }}</h1>
        </div>
    </div>


    <form action="{{ route('admin.giam_gias.store') }}" class="mt-5" method="POST">
        {{-- Làm việc với form trong laravel --}}

        {{-- 
            CSRF field: là một trường ẩn bắt buộc phải có trong form khi sử dụng laravel 
        --}}
        {{-- cái này đặt ở đâu cũng được miễn là trong thẻ form --}}
        @csrf



        <div class="form-group">
            <label for="ma_giam_gia">Mã giảm giá:</label>
            <input type="text" class="form-control" id="ma_giam_gia" name="ma_giam_gia">
            @error('ma_giam_gia')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div class="form-group">
            <label for="noi_dung">Nội dung:</label>
            <textarea type="text" class="form-control" id="noi_dung" name="noi_dung"></textarea>
            @error('noi_dung')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group">
            <label for="gia">Giá:</label>
            <input type="number" class="form-control" id="gia" name="gia">
            @error('gia')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group">
            <label for="ngay_het_han">Ngày hết hạn:</label>
            <input type="date" class="form-control" id="ngay_het_han" name="ngay_het_han">
            @error('ngay_het_han')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <input class="btn btn-outline-success mr-2" type="submit" value="Thêm mới">

        <a href="{{ route('admin.giam_gias.index') }}"><button type="button" class="btn btn-info">Danh sách</button></a>
    </form>
@endsection
