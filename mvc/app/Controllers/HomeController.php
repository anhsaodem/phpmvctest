<?php

namespace App\Controllers;

use Core\Controller;
use Core\View;

class HomeController extends Controller
{
    public function index()
    {
        //Xử lý logic
        // $data = [
        //     'title' => "Vovacode",
        //     'users_numb'=>20,
        //     'users'=>[
        //         'User 1 - Lan',
        //         'User 2 - Hoa',
        //         'User 3 - Mai',

        //     ],

        // ];
        $user_numb = 20;
        $title = 'List users';
        $users = [
            'User 1 - Lan',
            'User 2 - Hoa',
            'User 3 - Mai'
        ];
        // $data = [
        //     'title' => $title,
        //     'users' => $users
        // ];
        // $this->view("home/index", $data);
        // $this->view("home/index", compact('title', 'users'));
        View::render('home/index',compact('user_numb','title','users'));
    }
    public function report()
    {
        $this->view("home/report");
    }
}
