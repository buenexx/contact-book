<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactUpdateController extends Controller
{
    public function __invoke(Contact $contact)
    {
       // TODO: create validation for the email to remain unique when it is updated.

        request()->validate([
            'name' => 'required|min:5|max:255',
            'email' => 'required|email|max:100',
            'phone' => 'required|min:9|max:21',
        ]);

        $contact->fill([
            'name' => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
        ]);

        $contact->save();

        return redirect(route('contact.show', $contact))->with('message', 'Contact updated!');
    }
}
