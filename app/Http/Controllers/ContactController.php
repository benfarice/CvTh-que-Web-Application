<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;



class ContactController extends Controller
{
    public function newContact(){
    	$newContact = new Contact();
    	$newContact->name = "Imzoughene Youssef";
    	$newContact->email="imzoughene@outlook.com";
    	$newContact->message="You will be rich insha Allah";
    	$newContact->save();
    }

    public function listContacts(){
    	$contacts_list = Contact::all();
    	dd($contacts_list);
    }
}
