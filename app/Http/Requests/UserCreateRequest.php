<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            //
	        'name' => 'required',
	        'email' => 'required|email|unique:users',
	        'password' => 'required|min:1',
	        'phone1' => 'required',
	        //'phone2' => 'required',
	        'address1' => 'required',
			'road1' => 'required',
	        'subdistrict1' => 'required',
	        'district1' => 'required',
			'province1' => 'required',
			'zipcode1' => 'required',
 		    //  'address2' => 'required',
			// 'road2' => 'required',
	        // 'subdistrict2' => 'required',
	        // 'district2' => 'required',
			// 'province2' => 'required',
	        // 'zipcode2' => 'required',
			'typeofuser'  => 'required',
        ];
    }
    
}
