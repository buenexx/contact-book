<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactDeleteController extends Controller
{
    public function __invoke(Contact $contact): RedirectResponse
    {
        $contact->delete();

        return redirect()->route('contacts.index')->with('message', 'Contact deleted successfully.');
    }
}
