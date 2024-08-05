<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GiamGiaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ma_giam_gia'=>'required|max:10',
            'noi_dung'=>'max:255',
            'gia'=>'required',
            'ngay_het_han'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'ma_giam_gia.required'=>'Phải nhập mã giảm giá',
            'ma_giam_gia.max'=>'mã giảm giá không được quá 10 ký tự',
            'noi_dung.max'=>'nội dung không được quá 255 ký tự',
            'gia.required'=>'phải nhập giá',
            'ngay_het_han.required'=>'phải nhập ngày hết hạn'
        ];
    }
}
