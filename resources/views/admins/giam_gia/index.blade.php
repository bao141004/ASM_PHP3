@extends('layouts.admins.master')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <div>
            <h1 class="h3 text-gray-800">{{ $title }}</h1>
        </div>

       <div class="div">
        <a href="{{ route('admin.giam_gias.create') }}" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-arrow-right"></i>
            </span>
            <span class="text">Thêm mới</span>
        </a>
        <a href="{{ url('admins/giam_gia/trash') }}" class="btn btn-secondary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-trash"></i>
            </span>
            <span class="text">Thùng rác</span>
        </a>
       </div>
    </div>
    @if (session('errors'))
        <div class="text-center alert alert-danger mb-3">
            <span style="color: red">{{ session('errors') }}</span>
        </div>
    @endif
    @if (session('success'))
        <div class="text-center alert alert-success mb-3">
            <span style="color: green">{{ session('success') }}</span>
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                @if (count($listGiamGia) > 0)
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Mã giảm giá</th>
                                <th>Tên</th>
                                <th>Giá</th>
                                <th>Ngày hết hạn</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Mã giảm giá</th>
                                <th>Tên</th>
                                <th>Giá</th>
                                <th>Ngày hết hạn</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($listGiamGia as $index => $giamgia)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $giamgia->ma_giam_gia }}</td>
                                    <td>{{ $giamgia->noi_dung }}</td>
                                    <td>{{ number_format($giamgia->gia) }}</td>
                                    <td>{{ (new DateTime($giamgia->ngay_het_han))->format('d-m-y')}}</td>
                                    <td >
                                        <div class="d-flex">

                                            <div class="mr-2">
                                                <a href="{{ route('admin.giam_gias.edit', $giamgia->id) }}" class="btn btn-warning">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </span>
                                                </a>
                                            </div>

                                            <div class="mr-2">
                                                <form action="{{ route('admin.giamgia.delete') }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$giamgia->id }}">
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?!??')">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-trash"></i>
                                                        </span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{$listGiamGia->links("pagination::bootstrap-5")}} --}}
                @else
                    <div class="d-flex justify-content-center align-items-center">
                        <p>Không có mã giảm giá nào được tìm thấy.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection