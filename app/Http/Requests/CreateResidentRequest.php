<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateResidentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'n_ID'=>'required|max:10',
            'p_name'=>'required|string|max:20',
            'phone'=>'required|integer',
            'gender'=>'required|string',
            'region'=>'required|string',
            'floor'=>'required|numeric|min:1|max:20',
            //
        ];
    }
    public function messages()
    {
        return[
            "n_ID.required"=>"卡號 為必填",
            "n_ID.max"=>"卡號 最多10碼",
            "p_name.required"=>"姓名 為必填",
            "phone.required"=>"聯絡電話 為必填",
            "phone.integer"=>"連絡電話 必須為數字",
            "gender.required"=>"性別 為必填",
            "gender.string"=>"性別 必須為文字",
            "region.required"=>"區域 為必填",
            "region.string"=>"區域 必須為文字",
            "floor.required"=>"樓層 為必填",
            "floor.numeric"=>"樓層 為數字",
            "floor.min"=>"樓層 範圍必須介於1~20層樓之間",
            "floor.max"=>"樓層 範圍必須介於1~20層樓之間",
        ];
    }
}
