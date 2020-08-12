<?php

namespace App\Http\Controllers\Repo;

use App\Contact;
use Illuminate\Http\Request;

class ContactRepository{
 //sesuaikan dengan nama file reponya
    public function storeContact($request){
        $validatedData = $request->validate([
            'nm_kontak' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'desc_kontak' => 'required'
        ]);

        $contact = Contact::create($validatedData);
        $request->session()->flash('pesan', "Pesan baru dari {$validatedData['email']} ");
        return $contact;
    }


    public function destroyContact($request, $contact){
        $contact->delete();
        $request->session()->flash('pesan', "Hapus pesan $contact->email Berhasil");
        return $contact;
    }
}
