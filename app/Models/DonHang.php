<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DonHang extends Model
{
    use HasFactory, SoftDeletes;
    protected $table='don_hangs';
    protected $fillable = [
        'ma_don_hang',
        'user_id',
        'ten_nguoi_nhan',
        'email_nguoi_nhan',
        'so_dien_thoai_nguoi_nhan',
        'dia_chi_nguoi_nhan',
        'ngay_dat',
        'tong_tien',
        'ghi_chu',
        'phuong_thuc_thanh_toan_id',
        'trang_thai_id',
        'deleted',
        // 'deleted_at'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function chiTietDonHang(){
        return $this->hasMany(ChiTietDonHang::class);
    }

    public function khachHang()
    {
        return $this->belongsTo(KhachHang::class, 'user_id');
    }
    public function cartItems()
    {
        return $this->hasMany(GioHang::class, 'order_id');
    }
    public function phuongThucThanhToan()
    {
        return $this->belongsTo(PhuongThucThanhToan::class, 'phuong_thuc_thanh_toan_id');
    }
    public function trangThai()
    {
        return $this->belongsTo(TrangThaiDonHang::class, 'trang_thai_id');
    }

    
    public function getDH() {
        $list = DB::table('don_hangs')
        ->join('users', 'don_hangs.user_id','=','users.id')
        ->join('phuong_thuc_thanh_toans', 'don_hangs.phuong_thuc_thanh_toan_id','=','phuong_thuc_thanh_toans.id')
        ->join('trang_thai_don_hangs', 'don_hangs.trang_thai_id','=','trang_thai_don_hangs.id')
        ->select('don_hangs.*','users.name','phuong_thuc_thanh_toans.ten_phuong_thuc','trang_thai_don_hangs.ten_trang_thai');
        return $list;
    }

    public function createDonHang($data){
        DB::table('don_hangs')->insert($data);
    }

    public function  updateDonHang($data,$id) {
        DB::table('don_hangs')->where('id',$id)->update($data);
    }
}
