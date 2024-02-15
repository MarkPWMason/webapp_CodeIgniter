<?php

namespace App\Controllers;

use App\Models\ArticleModel;

class Articles extends BaseController
{
    public function index()
    {

        $model = new ArticleModel;
        $data = $model->findAll();

        return view("Articles/index", [
            "articles" => $data
        ]);
    }

    public function show ($id){
        //dd($id);
        $model = new ArticleModel;
        $article = $model->find($id);
        return view("Articles/show", [
            'article' => $article
        ]);
    }

    public function new(){
        return view("Articles/new");
    }

    public function create(){
        
        $model = new ArticleModel;

        $id = $model->insert($this->request->getPost());
        
        if($id === false){

            return redirect()->back()->with("errors",$model->errors())->withInput();
        }
        dd($id);
    }
}
