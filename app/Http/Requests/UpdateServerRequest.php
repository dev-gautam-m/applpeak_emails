<?php

namespace App\Http\Requests;

use App\Models\Server;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateServerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('server_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'hostname' => [
                'string',
                'required',
            ],
            'username' => [
                'string',
                'required',
            ],
            'password' => [
                'string',
                'required',
            ],
            'port' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'from_email' => [
                'string',
                'required',
            ],
            'from_name' => [
                'string',
                'required',
            ],
        ];
    }
}
