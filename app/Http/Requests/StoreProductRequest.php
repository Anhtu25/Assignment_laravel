<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nameProduct'=>'required',
            'imageProduct.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'authorProduct'=>'required',
            // 'publisherProduct'=>'required',
            // 'categoryProduct'=>'required',
            'priceProduct'=>'required',
            'priceSaleProduct'=>'required',
            'shortDescriptionProduct'=>'required|max:255',
            'descriptionProduct'=>'required',
            'yearPublishedProduct'=>'required',

        ];
    }

    public function messages():array{
        return[
            'imageProduct.*.required'   => 'Ảnh không được để trống',
            'imageProduct.*.image'  => 'File gửi lên không phải ảnh',
            'imageProduct.*.mimes'  => 'File gửi lên không phải ảnh',
            'imageProduct.*.max'  => 'File ảnh quá dung lượng cho phép',
            'nameProduct.required'=>'Tên không được để trống',
            'priceProduct.required'=>'Giá không được để trống',
            'priceSaleProduct.required'=>'Giá không được để trống',
            'shortDescriptionProduct.required'=>'Mô tả ngắn không được để trống',
            'shortDescriptionProduct.max'=>'Mô tả ngắn có độ dài tối đa là 255 ký tự',
            'descriptionProduct.required'=>'Mô tả không được để trống',
            'yearPublishedProduct.required'=>'Năm xuất bản không được để trống'
        ];
    }
}
