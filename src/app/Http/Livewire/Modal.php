<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Contact;

class Modal extends Component
{
    public $showModal = false;
    public $contact;

    public function render(Request $request)
    {
        $contacts = Contact::with('category')->KeywordSearch($request->keyword)->GenderSearch($request->gender)->CategorySearch($request->category_id)->CalendarSearch($request->from)->paginate(7);

        return view('livewire.modal',compact('contacts'));
    }


    public function openModal($id)
    {
       $this->contact = Contact::with('category')->find($id);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }
}
