<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEmailLogRequest;
use App\Http\Requests\StoreEmailLogRequest;
use App\Http\Requests\UpdateEmailLogRequest;
use App\Models\Contact;
use App\Models\ContactGroup;
use App\Models\EmailLog;
use App\Models\EmailTemplate;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;


class EmailLogController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('email_log_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $emailLogs = EmailLog::with(['user', 'contact', 'template'])->get();

        return view('admin.emailLogs.index', compact('emailLogs'));
    }

    public function create()
    {
        abort_if(Gate::denies('email_log_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contacts = ContactGroup::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $templates = EmailTemplate::pluck('subject', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.emailLogs.create', compact('contacts', 'templates'));
    }

    public function store(StoreEmailLogRequest $request)
    {
        $userId = auth()->id(); 
        $scheduledDate = $request->scheduled_at_date;
    
        $contacts = Contact::where('group_id', $request->group_id)->get(); 
        foreach ($contacts as $contact) {
            $code = Str::random(16);
            
            $startTime = strtotime("$scheduledDate 09:00:00");
            $endTime = strtotime("$scheduledDate 19:00:00");
            $randomTime = rand($startTime, $endTime);
    
            $scheduled_at = date('Y-m-d H:i:s', $randomTime);
    
            $emailLog = EmailLog::create(array_merge(
                $request->all(),
                [
                    'user_id' => $userId,
                    'code' => $code,
                    'contact_id' => $contact->id,
                    'scheduled_at' => $scheduled_at,
                ]
            ));
        }
    
        return redirect()->route('admin.email-logs.index');
    }
    
  
}
