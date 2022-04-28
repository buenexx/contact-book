<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactCreateFormController extends Controller
{
    public function __invoke()
    {
        return view('contact.create-form');
    }
}
