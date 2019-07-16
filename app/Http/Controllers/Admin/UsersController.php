<?php

namespace Corp\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;

use Corp\Repositories\MenusRepository;
use Corp\Repositories\UsersRepository;
use Corp\Repositories\RolesRepository;
use Corp\Http\Requests\UserRequest;
use Corp\User;
use Gate;

class UsersController extends AdminController
{


    protected $us_rep;
    protected $rol_rep;

    public function __construct(MenusRepository $m_rep, UsersRepository $us_rep, RolesRepository $rol_rep){

        parent::__construct();

        $this->m_rep = $m_rep;
        $this->us_rep = $us_rep;
        $this->rol_rep = $rol_rep;
        
        $this->template = env('THEME').'.admin.users.users';
        
    }
    
    public function index()
    {
        if (Gate::denies('EDIT_USERS')) {
            abort(403);
        }

        $this->title = 'Пользователи';

        $users = $this->getUsers();


        $this->content = view(env('THEME').'.admin.users.users_content')->with('users',$users)->render();

        return $this->renderOutput();
    }

    //get users

    public function getUsers(){

        $users = $this->us_rep->get();
        return $users;
    }

   
    public function create()
    {
        $this->title = 'Добавление новго ползователья';

        $roles = $this->getRoles()->reduce(function($returnRoles, $role){

            $returnRoles[$role->id] = $role->name;
            return $returnRoles;  


        },[]);


        $this->content = view(env('THEME').'.admin.users.users_create_content')->with('roles',$roles)->render();

        return $this->renderOutput();
    }

    // Get roles
    public function getRoles()
    {
        $roles = $this->rol_rep->get();

        return $roles;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $result = $this->us_rep->addUser($request);

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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::denies('EDIT_USERS')) {
            abort(403);
        }

        $user = User::find($id);

        $this->title = 'Редактирование ползователья';

        $roles = $this->getRoles()->reduce(function($returnRoles, $role){

            $returnRoles[$role->id] = $role->name;
            return $returnRoles;  


        },[]);


        $this->content = view(env('THEME').'.admin.users.users_create_content')->with(['user'=>$user,'roles'=>$roles])->render();

        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $result = $this->us_rep->updateUser($request,$id);

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
    public function destroy($id)
    {
    
          $user = User::find($id);

          $result = $this->us_rep->deleteUser($user);
         
          if (is_array($result) && !empty($result['error'])) {
          
              return back()->withErrors($result);
        
          }else{
            
            return redirect('/admin')->with($result);

          }
    }
}
