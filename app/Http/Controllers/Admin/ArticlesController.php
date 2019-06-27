<?php

namespace Corp\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Corp\Repositories\ArticlesRepository;
use Corp\Repositories\CategoriesRepository;
use Corp\Http\Requests\ArticleRequest;
use Gate;
use Corp\Article;

class ArticlesController extends AdminController
{


     public function __construct(ArticlesRepository $a_rep, CategoriesRepository $c_rep){

        parent::__construct();

        $this->a_rep = $a_rep;
        $this->c_rep = $c_rep;

    
        $this->template = env('THEME').'.admin.articles.articles';
        

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if (Gate::denies('VIEW_ADMIN_ARTICLES')) {
            abort(403);
        }

        $this->title = 'Менеджер статтей';

        $articles = $this->getArticles();

        $this->content = view(env('THEME').'.admin.articles.articles_content')->with('articles',$articles)->render();

        return $this->renderOutput();
    }

    public function getArticles(){

        return $this->a_rep->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('save', new Article)) {
            abort(403);
        }

        $this->title = "Добавить новый материал";

        $categories = $this->getCategories();

        $list = array();

        foreach ($categories as $category) {
            
            
            if ($category->cat_parent_id == 0) {
                $list[$category->cat_title] = array();

            }
            else{

                $list[$categories->where('id',$category->cat_parent_id)->first()->cat_title][$category->id] = $category->cat_title;


            }
        }

        $this->content = view(env('THEME').'.admin.articles.articles_create_content')->with('categories',$list)->render();

        return $this->renderOutput();
        
    }

    public function getCategories(){

        $select = ['cat_title','cat_alias','cat_parent_id','id'];
        return $this->c_rep->get($select);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        
      $result = $this->a_rep->addArticle($request);

      if (is_array($result) && !empty($result['error'])) {
          
          return back()->withErrors($result);
      }else{
            
        return redirect('/admin')->with($result);

      }

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
    public function edit($art_alias)
    {   
        /**
        * Проверяем права у пользователья // Политика написана на файле Articlepolicy
        */

        if (Gate::denies('edit', new Article)) {
            abort(403);
        }

        //Получем редактируемого материала 

        $article = Article::where('art_alias',$art_alias)->first();

        $article->art_img = json_decode($article->art_img);

        $categories = $this->getCategories();

        $list = array();

        foreach ($categories as $category) {
            
            
            if ($category->cat_parent_id == 0) {
                $list[$category->cat_title] = array();

            }
            else{

                $list[$categories->where('id',$category->cat_parent_id)->first()->cat_title][$category->id] = $category->cat_title;


            }
        }

        $this->title = "Редактирование материала -".$article->art_title;
        
        $this->content = view(env('THEME').'.admin.articles.articles_create_content')->with(['article'=>$article,'categories'=>$list])->render();

        return $this->renderOutput();



    }

    /**
     * t the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $art_alias)
    {   
        $article = Article::where('art_alias',$art_alias)->first();

        $result = $this->a_rep->updateArticle($request,$article);

        if (is_array($result) && !empty($result['error'])) {
          
            return back()->withErrors($result);

        }else{
            
        return redirect('/admin')->with($result);

      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($art_alias)
    {       

        $article = Article::where('art_alias',$art_alias)->first();

        $result = $this->a_rep->deleteArticle($article);

        if (is_array($result) && !empty($result['error'])) {
          
            return back()->withErrors($result);

        }else{
            
        return redirect('/admin')->with($result);

      }


        
    }
}
