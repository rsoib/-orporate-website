<?php 

namespace Corp\Repositories;

use Corp\Category;




class CategoriesRepository extends Repository {

	public function __construct(Category $category){

		$this->model = $category;
	}

}


?>