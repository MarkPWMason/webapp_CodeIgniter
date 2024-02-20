<?php

namespace Admin\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Exceptions\PageNotFoundException;

class Users extends BaseController
{
    private UserModel $model;
    
    public function __construct(){
        $this->model = new UserModel;
    }
    
    public function index()
    {
        $users = $this->model->paginate(3);

        return view("Admin\Views\Users\index", [
            "users"=> $users,
            "pager" => $this->model->pager,
        ]);
    }

    
    public function show($id)
    {

        $user = $this->getUserOr404($id);

        return view("Admin\Views\Users\show", [
            "user" => $user
        ]);
    }

    private function getUserOr404($id): User{
        $user = $this->model->find($id);

        if ($user === null) {
            throw new PageNotFoundException("User with id $id not found ");
        }

        return $user;
    }
}
