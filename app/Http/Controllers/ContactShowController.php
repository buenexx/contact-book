<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactShowController extends Controller
{
    public function __invoke(Contact $contact)
    {
        return view('contact.show', compact('contact'));
    }
}
