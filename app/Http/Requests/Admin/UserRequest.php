<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {

        return[
            'name'      => 'required|min:3|max:50',
            'notes'     => '',
            'dob'       => 'required|date',
        ] + ($this->isMethod('POST') ? $this->store() : $this->update() );;
       
    }

    /**
     * Edit validation wording
    */
    public function messages()
    {
        return [
            'name.min' => 'Minimal is 3 characters'
        ];
    }

    private function store(){
        return [
            'email'     => 'required|email|unique:users',
            'password'  => 'required|confirmed|min:6',
        ];
    }

    private function update(){
        return [
            'email'     => 'required|email|unique:users,email,'.$this->user()->email,
            'password'  => 'required|confirmed|min:6',
        ];
    }

}
