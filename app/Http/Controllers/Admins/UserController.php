<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\ChucVu;
use App\Models\KhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    protected $users;
    protected $chuc_vu;

    public function __construct()
    {
        $this->chuc_vu = new ChucVu();
        $this->users = new KhachHang();
       
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listUsers = $this->users->getList();
        $title ="Danh sách user";
        return view('admins.khachhang.index',compact('listUsers','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title ="Add user";
        $list = $this->chuc_vu->getList();

        return view('admins.khachhang.create',compact('title','list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->isMethod('POST')){
            $params = $request ->post();
            unset($params['_token']);
            $this->users ->createUser($params);
            return redirect()->route('users.index')->with('success','Thêm người dùng thành công');
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
