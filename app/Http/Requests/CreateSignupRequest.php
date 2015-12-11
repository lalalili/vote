<?php namespace app\Http\Requests;

use App\Http\Requests\Request;


class CreateSignupRequest extends Request
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
            'photo_id'   => 'required',
            'identity'   => 'required|size:10',
            'gender'     => 'required',
            'birth_year' => 'required|digits:4',
            'type'       => 'required',
            'level'      => 'required',
            'background' => 'required',
            'mobile'     => 'required|digits:10',
            'food'       => 'required',
            'emp_id'     => 'required|size:6',
            'group'      => 'required|digits:3',
            'project_id' => 'required',
            'course_id'  => 'required',
            'event_id'   => 'required',
        ];
    }

    public function messages()
    {
        return [
            'project_id.required' => '課程項目為必填欄位',
            'course_id.required'  => '課別為必填欄位',
            'event_id.required'   => '課程日期/場次為必填欄位',
            //右方欄
            'identity.required'   => '身分證號為必填欄位',
            'birth_year.required' => '出生年份為必填欄位',
            'mobile.required'     => '手機號碼為必填欄位',
            'emp_id.required'     => '工號為必填欄位',
            'group.required'      => '菁訓班梯次為必填欄位',
            //下拉選單
            'gender.required'     => '性別為必填欄位',
            'type.required'       => '人員別為必填欄位',
            'level.required'      => '階層別為必填欄位',
            'background.required' => '最高學歷為必填欄位',
            'food.required'       => '飲食習慣為必填欄位',
            'identity.size'       => '請輸入10位身分證號',
            'birth_year.digits'   => '請輸入4位數字生日年分',
            'mobile.digits'       => '請輸入10位數字手機號碼',
            'group.digits'        => '請輸入3位數字梯次號碼',
            'emp_id.size'         => '請輸入6位工號',
//            'project_id.min' => '課程項目為必填欄位',
//            'course_id.min' => '課別為必填欄位',
//            'event_id.min' => '課程日期/場次為必填欄位',
        ];
    }
}
