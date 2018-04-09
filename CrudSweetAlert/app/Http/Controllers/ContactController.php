<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('welcome');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'name' => $request['name'],
            'email' => $request['email']
        ];

        return Contact::create($data);
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return $contact;
    }

    
    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);
        
        $contact->name = $request['name'];
        $contact->email = $request['email'];
        
        $contact->update();

        return $contact;
    }

    
    public function destroy($id)
    {
        return "Contact::destroy($id)".$id;
    }

    public function apiContact()
    {
        $contact = Contact::all();
 
        return Datatables::of($contact)
        ->addColumn('action', function($contact){
            return '<a href="#" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-eye-open"></i> Show</a> ' .
                   '<a onclick="editForm('. $contact->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
                   '<a onclick="deleteData('. $contact->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
        })->make(true);
    }
}
