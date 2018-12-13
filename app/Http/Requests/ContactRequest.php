<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // za [proveru smo koristilidd($this->route()->parametars['contact']->id);
        $contactId = $this->method() === 'PUT'
            ? $this->route()->parameters['contact']->id
            : null;

        return [
                 
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:contacts,email' .
                    ($contactId ? ",$contactId" : '')
                    
            
        ];
    }
}
