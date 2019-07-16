<?php

namespace Corp\Http\Requests;

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
         return \Auth::user()->canDo('EDIT_USERS');
    }

     //Метод для валидации данных
    protected function getValidatorInstance()
    {

        $validator = parent::getValidatorInstance();

        $validator->sometimes('password','required|min:6|confirmed',function($input){

           //Обход уникальност псевдонима при изменение данных

            if (!empty($input->password) || (empty($input->password) && ($this->route()->getName() !== 'users.update'))) {
               return TRUE;
            }

            
        });

        return $validator;
    }


    public function rules()
    {
        if ($this->route()->parameter('users')) {
            $id = $this->route()->parameter('users');

        }else{
            $id = '';
        }

        return [
            'name' => 'required|max:255',
            'login' => 'required|max:255',
            'role_id' => 'required',
            'email' => 'required|email|max:255|unique:users,email,'.$id


        ];
    }
}
