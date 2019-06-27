<?php 

namespace Corp\Repositories;

use Corp\Article;
use Gate;
use Image;
use Config;
use Auth;


class ArticlesRepository extends Repository {

	public function __construct(Article $articles){

		$this->model = $articles;
	}

	public function one($alias, $attr = array()){

		$article = parent::one($alias, $attr);

		if ($article && !empty($attr)) 
		{
			$article->load('comments');

			$article->comments->load('user');
		}

		return $article;

		
	}

	//Метод для добпаление новой статьи в бд
	public function addArticle($request){

		//проверяем права у пользователья

		if (Gate::denies('save',$this->model)) {
			
			abort(403);
		}

		//Get data from form кроме поле _token и art_imgn

		$data = $request->except('_token','art_img');

		if (empty($data)) {
			return array('error' => 'Нет данных');
		}

		if (empty($data['art_alias'])) {
			$data['art_alias'] = $this->transliterate($data['art_title']);
		}


		//Проверяем уникальность псевдонима
		if ($this->one($data['art_alias'],FALSE)) {
			 
			 $request->merge(array('art_alias' => $data['art_alias']));

			$request->flash();

			return ['error' => 'Данный псевдоним уже используется'];
			

		}

		$data['art_img'] = $this->loadImage($request);


			$data['user_id'] = Auth::user()->id;


			$article = new Article;
			//dd($data);
			$article->art_title = $data['art_title'];
			$article->art_img = $data['art_img']['art_img'];
			$article->art_alias = $data['art_alias'];
			$article->art_text = $data['art_text'];
			$article->art_desc = $data['art_desc'];
			$article->keywords = $data['keywords'];
			$article->meta_desc = $data['meta_desc'];
			$article->category_id = $data['category_id'];
			$article->art_desc = $data['art_desc'];
			$article->user_id = $data['user_id'];


			//$this->model->fill($data);


			if ($article->save()) {
					return ['status' => 'Материал добавлен'];
			}

	}



	public function updateArticle($request,$article){

		//проверяем права у пользователья

		if (Gate::denies('edit',$this->model)) {
			
			abort(403);
		}

		//Get data from form кроме поле _token и art_imgn

		$data = $request->except('_token','art_img','_method');

		if (empty($data)) {
			return array('error' => 'Нет данных');
		}

		//Если поле псевдоним пустой то автоматический сформируем псевдоним через метод transliterate
		if (empty($data['art_alias'])) {
			$data['art_alias'] = $this->transliterate($data['art_title']);
		}	

		$result = $this->one($data['art_alias'],FALSE);

		if (isset($result->id) && $result->id != $article->id) {
			 
			 $request->merge(array('art_alias' => $data['art_alias']));

			$request->flash();

			return ['error' => 'Данный псевдоним уже используется'];
			

		}

		$data = $this->loadImage($request);


				$article->fill($data);

				if ($article->update()) {
					return ['status' => 'Материал обновлен'];
				}


	}


	public function deleteArticle($article){

		if (Gate::denies('destroy',$article)) {
			abort(403);
		}

		$article->comments()->delete();

		if ($article->delete()) {
			return ['status' => 'Материал удален'];
		}

	}

	public function loadImage($request)
	{
		if ($request->hasFile('art_img')) 
		{
			$art_image = $request->file('art_img');	

			//если изображение без ошибочно загрузился на сервер
			if ($art_image->isValid()) {
				
				$str = str_random(8);

				$obj = new \stdClass;

				$obj->mini = $str.'_mini.jpg';
				$obj->max = $str.'_max.jpg';
				$obj->path = $str.'.jpg';

				$img = Image::make($art_image);

				$img->fit(Config::get('settings.image')['width'],
						Config::get('settings.image')['height'])->save(public_path().'/'.env('ASSETS').'/images/articles/'.$obj->path);

				$img->fit(Config::get('settings.articles_img')['max']['width'],
						Config::get('settings.articles_img')['max']['height'])->save(public_path().'/'.env('ASSETS').'/images/articles/'.$obj->max);

				$img->fit(Config::get('settings.articles_img')['mini']['width'],
						Config::get('settings.articles_img')['mini']['height'])->save(public_path().'/'.env('ASSETS').'/images/articles/'.$obj->mini);
				
				$data['art_img'] = json_encode($obj);

				

			}
			return $data;
		}
	}

}


?>