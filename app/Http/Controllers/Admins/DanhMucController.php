<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DanhMucController extends Controller
{
    public $danhMucs;

    public function __construct()
    {
        $this->danhMucs = new DanhMuc();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Danh sách danh mục';
        $listDanhMucs = $this->danhMucs->getDanhMuc();
        return view('admins.danh_mucs.index', compact('listDanhMucs', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Thêm mới danh mục';
        return view('admins.danh_mucs.add', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('hinh_anh')) {
            $fileName = $request->file('hinh_anh')->store('uploads/danh_mucs', 'public');
        } else {
            $fileName = null;
        }

        $dataInsert = [
            'hinh_anh' => $fileName,
            'ten_danh_muc' => $request->ten_danh_muc,
            'mo_ta' => $request->mo_ta
        ];

        $this->danhMucs->createDanhMuc($dataInsert);
        return redirect()->route('danh-muc.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Sửa danh mục';
        $danhMuc = $this->danhMucs->find($id);
        if (!$danhMuc) {
            return redirect()->route('danh-muc.index');
        }
        return view('admins.danh_mucs.update', compact('danhMuc', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $danhMuc = $this->danhMucs->find($id);
        if ($request->hasFile('hinh_anh')) {
            if ($danhMuc->hinh_anh) {
                Storage::disk('public')->delete($danhMuc->hinh_anh);
            }
            $fileName = $request->file('hinh_anh')->store('uploads/danh_mucs', 'public');
        } else {
            $fileName = $danhMuc->hinh_anh;
        }

        $dataUpdate = [
            'hinh_anh' => $fileName,
            'ten_danh_muc' => $request->ten_danh_muc,
            'mo_ta' => $request->mo_ta
        ];

        $this->danhMucs->updateDanhMuc($dataUpdate, $id);
        return redirect()->route('danh-muc.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $danhMuc = $this->danhMucs->find($id);
        if (!$danhMuc) {
            return redirect()->route('danh-muc.index');
        }
        if ($danhMuc->hinh_anh) {
            Storage::disk('public')->delete($danhMuc->hinh_anh);
        }
        $danhMuc->delete();
        return redirect()->route('danh-muc.index');
    }
}
