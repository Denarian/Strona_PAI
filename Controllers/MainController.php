<?php

require_once 'AppController.php';


class MainController extends AppController {

    public function main()
    {
        $this->render('main');
    }
    /*
    public function getLatestPhotos()
    {   
        $database = new Database();
        $database->connect();

        $post1 = new Post('images.png', 2, 0);
        $post2 = new Post('images-1.png', 45, 0);
        $post3 = new Post('images-2.png', 12, 1);

        $data = [$post1, $post2, $post3];
        $this->render('board', ['posts' => $data]);
    }
    */
}