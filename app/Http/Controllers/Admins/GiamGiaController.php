<?php

namespace App\Http\Controllers\Admins;

use App\Models\GiamGia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\GiamGiaRequest;
use Illuminate\Support\Facades\Redis;

class GiamGiaController extends Controller
{
    protected $giamGia;
    public function __construct()
    {
        $this->giamGia = new GiamGia();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title ='Giảm giá';
        $listGiamGia = GiamGia::all();
        return view('admins.giam_gia.index',compact('title','listGiamGia'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title ='Thêm mã giảm giá';
        return view('admins.giam_gia.add',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        GiamGia::create($request->all());
        return redirect()->route('admin.giam_gias.index');
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
    public function edit(GiamGia $giamGia)
    {
        $title =' Edit giảm giá';
        return view('admins.giam_gia.update',compact('title','giamGia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GiamGia $giamGia)
    {
        $giamGia->update($request->all());
        return redirect()->route('admin.giam_gias.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GiamGia $giamGia)
    {
        $giamGia ->delete();
        return redirect()->route('admin.giam_gias.index');
    }
}
