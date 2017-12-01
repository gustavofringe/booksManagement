<?php

namespace Http;

use App\Controller;
use function dd;
use Entity\Books;
use Entity\Categories;
use Entity\Pages;
use function print_r;

class PagesController extends Controller
{

    /**
     * accounts
     * @return mixed
     */
    public function books()
    {
        //dd($this->Request->post);
        $this->Session->isLogged('admin');
        //define title
        $var['title'] = "Les livres";
        //load model post for recover entry
        $this->loadModel('Post');
        //search all accounts
        $var['books'] = $this->Post->findAll('books b', [
            'leftjoin'=>['categories c'=>'c.categoryID=b.categoryID']
        ]);
        $var['categories'] = $this->Post->findAll('categories',[]);
        if(isset($this->Request->post->category)){
            $var['books'] = $this->Post->findAll('books b',[
                'leftjoin'=>['categories c'=>'c.categoryID=b.categoryID'],
                'conditions'=>['b.categoryID'=>$this->Request->post->category]
            ]);
            //dd($var['books']);

        }

        foreach ($var['books'] as $k => $v) {
            $var['books'][$k] = new Books(get_object_vars($v));
        }
        foreach ($var['categories'] as $k => $v) {
            $var['categories'][$k] = new Categories(get_object_vars($v));
        }
        //define session getAccount for display no error
        /*$var['count'] = count($var['accounts']);
        if ($var['count'] === 0) {
            $this->Session->write('getAccount', false);
        }*/


        $this->Views->render('pages', 'books', $var);
    }

    /**
     * modal
     * @param mixed $id
     * @return mixed
     */
    public function view($id)
    {

        $this->loadModel('Post');
        //find account with id
        $book = $this->Post->findFirst('books b', [
            'conditions' => 'b.bookID=' . $id
        ]);
        $book = new Books(get_object_vars($book));
        $title = "Livre | ".$book->getTitle();
        $this->Views->render('pages', 'view', compact('book','title'));
    }

    /**
     * @param $id
     */
    public function detail($id){
        $title = "Détail emprunt";
        $this->loadModel('Post');
        $detail = $this->Post->findAll('historicalBorrowers',[
            'conditions'=>'bookID='.$id
        ]);
        $this->Views->render('pages','detail',compact('title','detail'));
    }

    /**
     * logout
     * @return mixed
     */
    public function logout()
    {
        $this->Session->logout('user');
    }
}
