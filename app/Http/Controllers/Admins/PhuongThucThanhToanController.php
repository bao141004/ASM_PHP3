<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\PhuongThucThanhToan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhuongThucThanhToanController extends Controller
{
    protected $phuong_thuc_thanh_toan;

    public function __construct()
    {
        $this -> phuong_thuc_thanh_toan = new PhuongThucThanhToan();
    }   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Danh sách phương thức thanh toán";
        $list = DB::table('phuong_thuc_thanh_toans')->get();
        return view('admins.phuongthucthanhtoan.index',[
            'title' => $title,
            'list' => $list,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Danh sách phương thức thanh toán";
     
        return view('admins.phuongthucthanhtoan.create',[
            'title' => $title,
           
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->isMethod('POST')){
            
            $params = $request->post();
            unset($params['_token']);
            $this->phuong_thuc_thanh_toan->createPhuongThuc($params);
            return redirect()->route('phuong_thuc_thanh_toans.index')->with('success','Thêm phương thức thành công');
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
