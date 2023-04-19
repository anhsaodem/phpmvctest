<?php
namespace App\Controllers;

use Core\Controller;
use Core\View;

class ProductController extends Controller{
    public function index(){
        //lOAD MODEL
        echo 'List Product';
        $title = 'Sản phẩm có trong cửa hàng';
        $products = [
            'laptops'=>[
                'Vaio 12',
                'Asus 34',
                'Dell 56'
            ],
            'telephones'=>[
                'Iphone 12',
                'Iphone 14',
                'Samsung A51'
            ],
        ];
        $content = '<h3>Nội dung bài viết</h3>';
        //XU LY LOGIC

        //RENDER RA VIEW
        // return $this->view('product/index',compact('title','products','content'));
        View::render('product/index',compact('title','products','content'));
    }
    public function add(){
        echo 'Them san pham';
    }
    public function edit($id,$slug){
        echo 'Sua san pham '.$id.' Slug - '.$slug;
    }
}