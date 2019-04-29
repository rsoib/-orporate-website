<?php 

namespace Corp\Repositories;

use Corp\Menu;
use Config;

abstract class Repository {

	protected $model = FALSE;

	public function get($select = '*',$take = FALSE, $pagination = FALSE, $where = FALSE){

		$builder = $this->model->select($select);

		if ($take) {

			$builder->take($take);
		}

		if ($where) {
			
			$builder->where($where[0],$where[1]);
		}

		if ($pagination) {
			return $this->check($builder->paginate(Config::get('settings.paginate')));
		}

		return $this->check($builder->get()); 	

	}

//переобразование json строка
	protected function check($result){

		if ($result->isEmpty()) 
		{
			return FALSE;	
		}

		$result->transform(function($item, $key){

		if (is_string($item->port_img) && is_object(json_decode($item->port_img)) && (json_last_error() == JSON_ERROR_NONE)) {
			
			$item->port_img = json_decode($item->port_img);
		}

		if (is_string($item->art_img) && is_object(json_decode($item->art_img)) && (json_last_error() == JSON_ERROR_NONE)) {
			
			$item->art_img = json_decode($item->art_img);
		}
			

			return $item;

		});

		return $result;

	}


	public function one($alias, $attr = array()){

		$result = $this->model->where('art_alias',$alias)->first();
		return $result;

	}


}


?>