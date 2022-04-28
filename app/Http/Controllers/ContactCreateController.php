<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactCreateController extends Controller
{
    public function __invoke(): RedirectResponse
    {
        request()->validate([
            'name' => 'required|min:5|max:255',
            'email' => 'required|email|max:100|unique:contacts',
            'phone' => 'required|min:9|max:21|unique:contacts',
        ]);

        Contact::query()->create([
            'name' => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
        ]);

        return redirect(route('contacts.index'));
    }
}
