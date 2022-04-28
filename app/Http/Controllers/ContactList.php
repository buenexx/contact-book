<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactList extends Controller
{
    public function __invoke()
    {
        return view('contact.list', ['contacts' => Contact::all()]);
    }
}
