<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Contact;

class ProfileController extends Controller
{
    public function profileShow() {
        $data = [
            'LoggedUserInfo' => Customer::where('id','=',session('LoggedUserId'))->first(),
            'ContactsInfo' => Contact::where('customer_id','=',session('LoggedUserId'))->get()
        ];
        return view('user.profile', $data);
    }

    public function contactCreate(Request $request) {
        $request->validate([
            'country' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'phone' => 'required'
        ]);

        $contact = new Contact;
        $contact->country = $request->country;
        $contact->city = $request->city;
        $contact->postal_code = $request->postal_code;
        $contact->phone = $request->phone;
        $contact->customer_id = session('LoggedUserId');
        $contact->save();
        return back();
    }

    public function contactUpdate(Request $request, $id) {
        $contact = Contact::find($id);
        $contact->update($request->all());
        return back();
    }

    public function contactDelete($id) {
        $contact = Contact::destroy($id);
        return back();
    }
}
