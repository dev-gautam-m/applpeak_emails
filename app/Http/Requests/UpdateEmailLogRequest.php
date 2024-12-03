<?php

namespace App\Http\Requests;

use App\Models\EmailLog;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEmailLogRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('email_log_edit');
    }

    public function rules()
    {
        return [
            'contact_id' => [
                'required',
                'integer',
            ],
            'template_id' => [
                'required',
                'integer',
            ],
            'code' => [
                'string',
                'nullable',
            ],
            'scheduled_at' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'opened_at' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
