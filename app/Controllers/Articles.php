<?php

namespace App\Controllers;

use App\Models\ArticleModel;
use App\Entities\Article;

class Articles extends BaseController
{
    private ArticleModel $model;

    public function __construct()
    {
        $this->model = new ArticleModel;
    }

    public function index()
    {

        $data = $this->model->findAll();

        return view("Articles/index", [
            "articles" => $data
        ]);
    }

    public function show($id)
    {

        $article = $this->model->find($id);

        return view("Articles/show", [
            "article" => $article
        ]);
    }

    public function new()
    {
        return view("Articles/new", [
            "article" => new Article
        ]);
    }

    public function create()
    {
        
        $article = new Article($this->request->getPost());

        $id = $this->model->insert($article);

        if ($id === false) {

            return redirect()->back()
                             ->with("errors", $this->model->errors())
                             ->withInput();

        }

        return redirect()->to("articles/$id")
                         ->with("message", "Article saved.");
    }

    public function edit($id)
    {
        $article = $this->model->find($id);

        return view("Articles/edit", [
            "article" => $article
        ]);
    }

    public function update($id)
    {

        $article = $this->model->find($id);
        $article->fill($this->request->getPost());
        // $article->title = $this->request->getPost("title");
        // $article->content = $this->request->getPost("content");
        
        if( ! $article->hasChanged()){
            return redirect()->back()->with('message', 'Nothing to update.');
        }
    
        if ($this->model->save( $article)) {

            return redirect()->to("articles/$id")
                             ->with("message", "Article updated.");

        }

        return redirect()->back()
                         ->with("errors", $this->model->errors())
                         ->withInput();
    }
}