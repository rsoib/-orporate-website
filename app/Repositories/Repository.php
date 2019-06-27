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

	public function transliterate($string)
	{
		$str = mb_strtolower($string,'UTF-8');

		$leter_array = array(

			'a' => 'а',
            'b' => 'б',
            'v' => 'в',
            'g' => 'г',
            'd' => 'д',
            'e' => 'е,э',
            'jo' => 'ё',
            'zh' => 'ж',
            'z' => 'з',
            'i' => 'и,i',
            'j' => 'й',
            'k' => 'к',
            'l' => 'л',
            'm' => 'м',
            'n' => 'н',
            'o' => 'о',
            'p' => 'п',
            'r' => 'р',
            's' => 'с',
            't' => 'т',
            'u' => 'у',
            'f' => 'ф',
            'kh' => 'х',
            'ts' => 'ц',
            'ch' => 'ч',
            'sh' => 'ш',
            'shch' => 'щ',
            '' => 'ъ',
            'y' => 'ы',
            '' => 'ь',
            'yu' => 'ю',
            'ya' => 'я',

			);

		foreach ($leter_array as $leter => $kyr) {
			
			$kyr = explode(',',$kyr);
			
			$str = str_replace($kyr, $leter, $str);
		}
		
		$str = preg_replace('/(\s|[^A-Za-z0-9\-])+/', '-', $str);

		$str = trim($str,'-');

		return $str;
	}



	public function one($alias, $attr = array()){

		$result = $this->model->where('art_alias',$alias)->first();
		return $result;

	}


}


?>