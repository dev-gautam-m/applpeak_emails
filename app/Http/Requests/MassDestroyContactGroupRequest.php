<?php

namespace App\Http\Requests;

use App\Models\ContactGroup;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyContactGroupRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('contact_group_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:contact_groups,id',
        ];
    }
}
