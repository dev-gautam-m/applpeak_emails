<?php

namespace App\Http\Requests;

use App\Models\ContactGroup;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateContactGroupRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('contact_group_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'total_emails' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
