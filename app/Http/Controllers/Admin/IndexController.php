<?php

namespace Corp\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Corp\Role;
use Corp\User;

use Gate;

class IndexController extends AdminController
{
    public function __construct(){

    	parent::__construct();
    
    	$this->template = env('THEME').'.admin.index';
        

    }

    public function index(){

        if (Gate::denies('VIEW_ADMIN')) {
            abort(403);
        }


    	$this->title = 'Панель администратора';
        
        
    	return $this->renderOutput();
    }
}
