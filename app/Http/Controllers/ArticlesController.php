<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;
use Corp\Repositories\PortfoliosRepository;
use Corp\Repositories\ArticlesRepository;
use Corp\Repositories\CommentsRepository;
use Config;

class ArticlesController extends SiteController
{
    
	 public function __construct(PortfoliosRepository $p_rep, ArticlesRepository $a_rep, CommentsRepository $c_rep){

        parent::__construct(new \Corp\Repositories\MenusRepository(new \Corp\Menu));

        $this->p_rep = $p_rep;
        $this->a_rep = $a_rep;
        $this->c_rep = $c_rep;


        $this->bar = "right";
        $this->template = env('THEME').".articles";
        

        $this->vars = "title";

    }


    public function index()
    {

    	$this->vars = array();
       	
        $articles = $this->getArticles(); 

        $content = view(env('THEME').'.articles_content')->with('articles',$articles)->render();

        $this->vars = array_add($this->vars,'content',$content);

        $comments = $this->getComments();
        $portfolios = $this->getPortfolios();


        $this->contentRightBar = view(env('THEME').".articlesBar")->with(['comments' => $comments,'portfolios' => $portfolios])->render();

    	return $this->renderOutput();
       	
    }

    public function getComments(){

            $comments = $this->c_rep->get(['com_text','com_name','com_email','com_site','article_id','user_id'],config('settings.recent_comments'));

            if ($comments) {
                
                $comments->load('user','article');
            
            }

            return $comments;

    }

    public function getPortfolios(){

            $portfolios = $this->p_rep->get(['port_title','port_text','alias','port_customer','port_img','filter_alias'],config('settings.recent_portfolios'));

            return $portfolios;

    }

    public function getArticles($alias = FALSE)
    {

        $articles = $this->a_rep->get(['id','art_title','art_alias','created_at','art_img','art_desc','user_id','category_id'],FALSE,TRUE);


        if ($articles) {
            $articles->load('user','category','comments');
        }
       
        return $articles;
        
    }

}
