<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateEmployeeRequest extends Request
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
            'birth_year' => 'required|digits:4',
            'mobile'     => 'required|digits:10',
            'emp_id'     => 'required|size:6',
            'group'      => 'required|digits:3',
            'gender'     => 'required',
            'food'       => 'required',
            'level'      => 'required',
            'background' => 'required',
        ];
    }

    public function messages()
    {
        return [
            //右方欄
            'identity.required'   => '身分證號為必填欄位',
            'birth_year.required' => '出生年份為必填欄位',
            'mobile.required'     => '手機號碼為必填欄位',
            'emp_id.required'     => '工號為必填欄位',
            'group.required'      => '菁訓班梯次為必填欄位',
            //下拉選單
            'gender.required'     => '性別為必填欄位',
            'food.required'       => '飲食習慣為必填欄位',
            //'type.required'       => '人員別為必填欄位',
            'level.required'      => '階層別為必填欄位',
            'background.required' => '最高學歷為必填欄位',

            'identity.size'       => '請輸入10位身分證號',
            'birth_year.digits'   => '請輸入4位數字生日年分',
            'mobile.digits'       => '請輸入10位數字手機號碼',
            'group.digits'        => '請輸入3位數字梯次號碼',
            'emp_id.size'         => '請輸入6位工號',
        ];
    }
}
