<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;
use Corp\Repositories\PortfoliosRepository;
use Config;
use Corp\Portfolio;

class PortfolioController extends SiteController
{
    //	

    public function __construct(PortfoliosRepository $p_rep){

        parent::__construct(new \Corp\Repositories\MenusRepository(new \Corp\Menu));

        $this->p_rep = $p_rep;
 
        $this->template = env('THEME').".portfolio.portfolios";
       

    }



   public function index()
    {

    	$this->vars = array();
       	

            $this->title = 'Портфолио';
            $this->meta_desc = 'Портфолио';
            $this->keywords = 'Blog Portfolio';
        
        $portfolios = $this->getPortfolios();



        $content = view(env('THEME').'.portfolio.portfolios_content')->with('portfolios',$portfolios)->render();

        $this->vars = array_add($this->vars,'content',$content);

    	return $this->renderOutput();
       	
    }



    public function getPortfolios($take = FALSE, $pagination = TRUE){

    	$portfolios = $this->p_rep->get('*',$take,$pagination);

    	if ($portfolios) {
    		
    		$portfolios->load('filter');
    	}

    	return $portfolios;
    }

    public function show($alias){

        $portfolio = Portfolio::where('alias',$alias)->first(); 

        if ($portfolio && $portfolio->port_img) {
            $portfolio->port_img = json_decode($portfolio->port_img);
        }
        $this->title = $portfolio->port_title;
        /*$this->meta_desc = $article->meta_desc;
        $this->keywords = $article->keywords;*/

    

        
        $portfolios = $this->getPortfolios(Config::get('settings.other_portfolios'),FALSE);

        $content = view(env('THEME').".portfolio.one_portfolio")->with(['portfolio'=>$portfolio,'portfolios'=>$portfolios])->render();
        $this->vars = array_add($this->vars,'content',$content);

        /*$this->contentRightBar = view(env('THEME').".articlesBar")->with(['comments' => $comments,'portfolios' => $portfolios])->render();
*/
        return $this->renderOutput();


    }
}
