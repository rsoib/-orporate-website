<?php

namespace Corp\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->canDo('ADD_ARTICLES');
    }


    //Метод для валидации данных
    protected function getValidatorInstance()
    {

        $validator = parent::getValidatorInstance();

        $validator->sometimes('art_alias','unique:articles|max:255',function($input){

           //Обход уникальност псевдонима при изменение данных

            if ($this->route()->hasParameter('articles')) {
               $model = $this->route()->parameter('articles');
               return ($model !== $input->art_alias && !empty($input->art_alias));
            }

            return !empty($input->art_alias);
        });

        return $validator;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        return [
            
            'art_title' => 'required|max:255',
            'art_desc' => 'required',
            'category_id' => 'required|integer',


        ];
    }
}
