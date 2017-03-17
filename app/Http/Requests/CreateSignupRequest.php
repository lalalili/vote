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
            'identity'   => 'required',
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
//            'project_id.min' => '課程項目為必填欄位',
//            'course_id.min' => '課別為必填欄位',
//            'event_id.min' => '課程日期/場次為必填欄位',
        ];
    }
}
