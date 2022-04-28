<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactUpdateController extends Controller
{
    public function __invoke(Contact $contact)
    {
        request()->validate([
            'name' => 'required|min:5|max:255',
            'email' => 'required|email|max:100|unique',
            'phone' => 'required|min:9|max:21|unique',
        ]);

        $contact->fill([
            'name' => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
        ]);

        $contact->save();

        return redirect(route('contact.show', $contact));
    }
}
