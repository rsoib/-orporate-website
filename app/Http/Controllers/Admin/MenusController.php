<?php

namespace Corp\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Corp\Repositories\MenusRepository;
use Corp\Repositories\ArticlesRepository;
use Corp\Repositories\PortfoliosRepository;
use Gate;
use Menu;
use Corp\Category;
use Corp\Filter;


class MenusController extends AdminController
{
    
    protected $m_rep;


    public function __construct(MenusRepository $m_rep, ArticlesRepository $a_rep, PortfoliosRepository $p_rep)
    {
        parent::__construct();

        $this->m_rep = $m_rep;
        $this->a_rep = $a_rep;
        $this->p_rep = $p_rep;

        $this->template = env('THEME').'.admin.menus.menus';
    }

    public function index()
    {
        if (Gate::denies('VIEW_ADMIN_MENU')) {
            abort(403);
        }

        $this->title = "Меню";

        $menu = $this->getMenus();

         $this->content = view(env('THEME').'.admin.menus.menus_content')->with('menus',$menu)->render();

         return $this->renderOutput();
    }


    public function getMenus()
    {
        $menu = $this->m_rep->get();

        if ($menu->isEmpty()) {
            
            return false;
        }

        return Menu::make('forMenuPart',function($m) use($menu){

            foreach ($menu as $item) {
                if ($item->parent == 0) {
                    
                    $m->add($item->title,$item->path)->id($item->id);
                }else{

                    if ($m->find($item->parent)) {
                        $m->find($item->parent)->add($item->title,$item->path)->id($item->id);
                    }
                }
            }
        });
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->title = "Новый пункт меню";

        $tmp = $this->getMenus()->roots();

        /*  ПОЛУЧАЕМ МЕНЮ

            Метод reduce() уменьшает коллекцию к одному значению, передавая 
            результат каждой итерации в последующей итерации:
            В каестве второго параметра указываем значение для первого итерации
        */

        $menus = $tmp->reduce(function($returnMenus, $menu){

            $returnMenus[$menu->id] = $menu->title;
            return $returnMenus;  


        },['0' => 'Родительский пункт меню']);
        
        //ПОЛУЧАЕМ КАТЕГОРИИ

        $categories = Category::select(['cat_title','cat_alias','cat_parent_id','id'])->get();
        $list = array();

        $list = array_add($list,'0','Не используется');

        $list = array_add($list,'parent','Раздел блог');
        
        foreach ($categories as $category) {
             
             if ($category->cat_parent_id == 0) {
                    $list[$category->cat_title] = array();
                }else{
                    $list[$categories->where('id',$category->cat_parent_id)->first()->cat_title][$category->cat_alias] = $category->cat_title;

                }   

        }

        // ПОЛУЧАЕМ МАТЕРИАЛЫ

        $articles = $this->a_rep->get(['id','art_title','art_alias']);


        $articles = $articles->reduce(function($returnArticles,$article){

            $returnArticles[$article->art_alias] = $article->art_title;

            return $returnArticles;

        },[]);

        // ПОЛУЧАЕМ ФИЛТРЫ

        $filters = Filter::select('fil_id','fil_title','fil_alias')->get();
        
        $filters = $filters->reduce(function($returnFilters,$filter){

            $returnFilters[$filter->fil_alias] = $filter->fil_title;

            return $returnFilters;

        },['0' => 'Раздел портфолио']);

        //ПОЛУЧАЕМ ПОРТФОЛИО

        $portfolios = $this->p_rep->get(['port_id','port_title','alias']);

        $portfolios = $portfolios->reduce(function($returnPortfolios,$portfolio){

            $returnPortfolios[$portfolio->alias] = $portfolio->port_title;

            return $returnPortfolios;

        },[]);

        $this->content = view(env('THEME').'.admin.menus.menus_create_content')->with(['menus'=>$menus,'categories'=>$list,'articles'=>$articles,'filters'=>$filters,'portfolios'=>$portfolios])->render();

        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
