<?php

namespace Corp\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Response;
use Corp\Comment;
use Corp\Article;

class CommentController extends SiteController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $data = $request->except('_token','comment_post_ID','comment_parent');

        $data['article_id'] = $request->input('comment_post_ID');
        $data['parent_id'] = $request->input('comment_parent');

        //print_r($data);
        $validator = Validator::make($data,[

                                    'article_id' => 'integer|required',
                                    'parent_id' => 'integer|required',
                                    'com_text' => 'string|required'

                                ]); 
        $validator->sometimes(['com_name','com_email'],'required|max:255',function($input){

            return !Auth::check();

        });

        if ($validator->fails()) {
            
            return Response::json(['error'=>$validator->errors()->all()]);
        }

        $user = Auth::user();

        $comment = new Comment($data);
        
        if ($user) {
            
            $comment->user_id = $user->id;
        }   

        $post = Article::find($data['article_id']);

        $post->comments()->save($comment);

        //После сохранение комментария в бд вернём комментария пользователью

        $comment->load('user');

        $data['com_id'] = $comment->id;

        $data['com_email'] = (!empty($data['com_email'])) ? $data['com_email'] : $comment->user->email;
        $data['com_name'] = (!empty($data['com_name'])) ? $data['com_name'] : $comment->user->name; 

        $data['hash'] = md5($data['com_email']);
       
        $view_comment = view(env('THEME').'.content_one_comment')->with('data',$data)->render();

        return Response::json(['success'=>TRUE, 'comment'=>$view_comment,'data'=>$data]);

       exit();

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
