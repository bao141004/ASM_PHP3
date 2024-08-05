@extends('layouts.admins.master')

@section('title')
    {{ $title }}
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.2/ckeditor5.css">
    <style>
        .custom-control-input.bg-primary:checked~.custom-control-label::before {
            background-color: #007bff;
            border-color: #007bff;
        }

        .custom-control-input.bg-danger:checked~.custom-control-label::before {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .custom-control-input.bg-success:checked~.custom-control-label::before {
            background-color: #28a745;
            border-color: #28a745;
        }

        .ck.ck-editor__main>.ck-editor__editable:not(.ck-focused) {
            border-color: var(--ck-color-base-border);
            height: 200px;
        }
    </style>
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <div>
            <h1 class="h3 text-gray-800">{{ $title }}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="{{ route('admin.giam_gias.update', $giamGia->id) }}" method="POST" class="m-3">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="ma_giam_gia">Mã giảm giá:</label>
                            <input type="text" class="form-control" id="ma_giam_gia" name="ma_giam_gia" value="{{$giamGia->ma_giam_gia}}">
                            @error('ma_giam_gia')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="noi_dung">Nội dung:</label>
                            <textarea type="text" class="form-control" id="noi_dung" name="noi_dung">{{$giamGia->noi_dung}}</textarea>
                            @error('noi_dung')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="gia">Giá:</label>
                            <input type="number" class="form-control" id="gia" name="gia" value="{{$giamGia->gia}}">
                            @error('gia')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="ngay_het_han">Ngày hết hạn:</label>
                            <input type="date" class="form-control" id="ngay_het_han" name="ngay_het_han" value="{{$giamGia->ngay_het_han}}">
                            @error('ngay_het_han')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>

                        <input class="btn btn-outline-success mr-2" type="submit" value="Sửa">

                        <a href="{{ route('admin.giam_gias.index') }}"><button type="button" class="btn btn-info">Danh
                                sách</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection