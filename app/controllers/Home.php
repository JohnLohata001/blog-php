<?php

 class Home extends Controller{

    public function index()
    {
        $postsModel = $this->load_model('PostsModel');
        $posts = $postsModel->getPublishedPosts();

        $categoriesModel = $this->load_model('Categories');
        $categories = $categoriesModel->getCategoryWithPostCount();

        // $categoryCounts = $categoriesModel->getCategoryWithPostCount();
        
        $this->view('home', [
            'posts' => $posts,
            'categories' => $categories,
            // 'categoryCounts' => $categoryCounts
        ]);
    }

}