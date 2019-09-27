<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
		$id = $this->route()->parameters()['user'];
		$rules = [
			'name' => 'required',
			'email' => 'required|email|unique:users,email,'.$id ,
			'phone1' => 'required',
			'phone2' => 'required',
			'address1' => 'required',
			'address2' => 'required',
			'road1' => 'required',
			'subdistrict1' => 'required',
			'district1' => 'required',
			'province1' => 'required',
			'zipcode1' => 'required',
		];

		$input = $this->all();
		if(isset($input['password'])&& !empty($input['password'])){
			$rules['password'] = 'required|min:1';
		}

		return $rules;
	}
	public  function messages() {
		return [
			'Username.required' => 'กรุณากรอก Username',
			'Name.required' => 'กรุณากรอกชื่อ',
			'Sirname.required' => 'กรุณากรอกนามสกุล',
			'email.required' => 'กรุณากรอก Email',
			'email.email' => 'รูปแบบ Email ไม่ถูกต้อง',
			'email.unique' => 'Email ซ้ำในระบบ',
			'Phone1.required' => 'กรุณากรอกเบอร์โทรศัพท์',
			'Phone2.required' => 'กรุณากรอกเบอร์โทรศัพท์ (2)',
			'Address1.required' => 'กรุณากรอกที่อยู่',
			'Address2.required' => 'กรุณากรอกที่อยู่ (2)',
			'Road.required' => 'กรุณากรอกถนน',
			'Sub-District.required' => 'กรุณากรอกตำบล',
			'District.required' => 'กรุณากรอกอำเภอ',
			'Province.required' => 'กรุณากรอกจังหวัด',
			'Zipcode.required' => 'กรุณากรอกรหัสไปรษณีย์',
		];
	}
}
