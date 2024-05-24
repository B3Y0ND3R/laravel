<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPassword extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'password' => 'required|confirmed|min:6',
        ];
    }
}

?>