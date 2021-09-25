<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $paddymail = 'paddipay.app@gmail.com';
        $request->validate([
            'name' => 'string|min:1|max:70',
            'email' => 'string|min:1|max:50',
            'message' => 'string|min:1|max:300',
        ]);

        $data = new Contact();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->subject = "Contact Us";
        $data->message = $request->message;
        $data->save();
        try {
            Mail::to($data->email)->send(new ContactMail($data));
        } catch (\Throwable $th) {
            //throw $th;
        }
        return response()->json(['message'=>'Mail sent successfully!',$data ], 200);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $contact_reply = Contact::find($id);
        // if($contact_reply){
        //     $request->validate([
        //         'name' => 'string|min:1|max:70',
        //         'email' => 'string|min:1|max:50',
        //         'message' => 'string|min:1|max:300',
        //     ]);


        //     $contact_reply->name = $request->name;
        //     $contact_reply->email = $request->email;
        //     $contact_reply->subject = "Reply Mail";
        //     $contact_reply->message = $request->message;

        //     try {
        //         Mail::to($request->email)->send(new ContactMail(request()->all()));
        //         $contact_reply->update();

        //     } catch (\Throwable $th) {
        //         //throw $th;
        //     }

        //     return response()->json(['message'=>'Mail sent successfully!',$contact_reply ], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
