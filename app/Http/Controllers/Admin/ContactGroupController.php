<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyContactGroupRequest;
use App\Http\Requests\StoreContactGroupRequest;
use App\Http\Requests\UpdateContactGroupRequest;
use App\Models\ContactGroup;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ContactImport;
use App\Models\Contact;

class ContactGroupController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('contact_group_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contactGroups = ContactGroup::all();

        return view('admin.contactGroups.index', compact('contactGroups'));
    }

    public function create()
    {
        abort_if(Gate::denies('contact_group_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.contactGroups.create');
    }

    public function store(StoreContactGroupRequest $request)
    {
        $userId = auth()->id(); 
        $contactGroup = ContactGroup::create($request->all(), ['user_id' => $userId]);

        if ($request->hasFile('csv_file') && $request->file('csv_file')->isValid()) {
            $path = $request->file('csv_file')->store('csv_files');
     
            Excel::import(new ContactImport($contactGroup), storage_path('app/' . $path));
     
            Storage::delete($path);
        }

        return redirect()->route('admin.contact-groups.index');
    } 

    public function show(ContactGroup $contactGroup)
    {
        abort_if(Gate::denies('contact_group_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contacts = Contact::where('group_id', $contactGroup->id)->get(); 
        return view('admin.contactGroups.show', compact('contactGroup', 'contacts'));
    }

 
}
