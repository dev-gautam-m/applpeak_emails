<?php

namespace App\Imports;

use App\Models\Contact;
use App\Models\ContactGroup;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Session;


class ContactImport implements ToModel
{
    protected $contactGroup; 
    protected $duplicateCount = 0;


    public function __construct(ContactGroup $contactGroup)
    {
        $this->contactGroup = $contactGroup;
    }


    public function model(array $row)
    { 
        
        try {
            $contact = new Contact([
                'first_name' => $row[0],  
                'last_name' => $row[1],  
                'email' => $row[2],
                'group_id' => $this->contactGroup->id,
                'user_id' => auth()->id(),
            ]);

            $contact->save(); 

            $this->contactGroup->increment('total_emails');

        } catch (\Exception $e) {
            $this->duplicateCount++;
            Session::flash('error', 'Duplocate emails found: ' . $this->duplicateCount);
        }

        return null; 
    }
 
}
