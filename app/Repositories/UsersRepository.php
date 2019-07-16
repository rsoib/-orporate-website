<?php 

namespace Corp\Repositories;

use Corp\User;
use Gate;

class UsersRepository extends Repository {

	public function __construct(User $users){

		$this->model = $users;
	}

	public function addUser($request)
	{
		if (Gate::denies('create', $this->model)) {
            abort(403);
        }

        $data = $request->all();

        $user = User::create([

        						'name' => $data['name'],
        						'login' => $data['login'],
        						'email' => $data['email'],
        						'password' => bcrypt($data['password']),

        					]); 

        if ($user) {
        	$user->roles()->attach($data['role_id']);
        }

        return ['status' => 'Пользователь добавлен'];
	}

    public function updateUser($request,$id)
    {
        if (Gate::denies('create', $this->model)) {
            abort(403);
        }

        $user = User::find($id);
       
        $data = $request->all();

        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        $user->fill($data)->update();
        $user->roles()->sync($data['role_id']);

        return ['status' => 'Пользователь изменён'];
    }

    public function deleteUser($user)
    {
       if (Gate::denies('edit', $this->model)) {
            abort(403);
        } 

        $user->roles()->detach();

        if ($user->delete()) {
            return ['status' => 'Пользователь удален'];
        }
    }
}


?>