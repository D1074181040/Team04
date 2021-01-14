<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCardRequest extends FormRequest
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
        if ($this->method()=="PATCH"){
            $rules= [
                'n_ID' =>'required|max:10',
                'p_time'=>'required|date',
                'status'=>'required|string',];

        }
        else{
            $rules=[
                'n_ID' =>'required|max:10',
                'p_time'=>'required|date',
                'status'=>'required|string',
            ];
        }
        return $rules;
            //
    }
    public function messages()
    {
       return[
           "n_ID.required"=>"卡號 為必填",
           "n_ID.max"=>"卡號 最多為10碼",
           "p_time.required"=>"通行時間 為必填",
           "status.required"=>"狀態 為必填",
       ];
    }
}
