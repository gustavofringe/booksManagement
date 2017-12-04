<?php

namespace Http;

use App\Controller;
use function dd;
use Entity\Books;
use Entity\Borrowers;
use Entity\Categories;
use Entity\HistoricalBorrowers;
use Entity\Pages;
use function print_r;

class PagesController extends Controller
{

    /**
     * accounts
     * @return mixed
     */
    public function books($pages = 1)
    {
        $this->Session->isLogged('admin');
        //define title
        $var['title'] = "Les livres";
        //load model post for recover entry
        $this->loadModel('Post');
        //count book for pagination
        $countBook = $this->Post->findAll('books', [
            'count' => 'bookID',
            'as' => 'nbBook'
        ]);
        $nbBook = $countBook[0]->nbBook;
        //define card per page
        $perPage = 9;
        $var['nbPage'] = ceil($nbBook / $perPage);
        $defPage = $pages;
        //search all books
        $var['books'] = $this->Post->findAll('books b', [
            'leftjoin' => ['categories c' => 'c.categoryID=b.categoryID'],
            'limit' => (($defPage - 1) * $perPage) . ',' . $perPage
        ]);
        //search all categories
        $var['categories'] = $this->Post->findAll('categories',[]);
        //display books by categories
        if(isset($this->Request->post->category)){
            $var['books'] = $this->Post->findAll('books b',[
                'leftjoin'=>['categories c'=>'c.categoryID=b.categoryID'],
                'conditions'=>['b.categoryID'=>$this->Request->post->category]
            ]);
        }
        //insert entities
        foreach ($var['books'] as $k => $v) {
            $var['books'][$k] = new Books(get_object_vars($v));
        }
        foreach ($var['categories'] as $k => $v) {
            $var['categories'][$k] = new Categories(get_object_vars($v));
        }
        //render view
        $this->Views->render('pages', 'books', $var);
    }

    /**
     * modal
     * @param mixed $id
     * @return mixed
     */
    public function view($id)
    {
        $this->Session->isLogged('admin');
        //load model for recover entry
        $this->loadModel('Post');
        //find account with id
        $book = $this->Post->findFirst('books b', [
            'conditions' => 'b.bookID=' . $id
        ]);
        $book = new Books(get_object_vars($book));
        //define title
        $title = "Livre | ".$book->getTitle();
        //return view
        $this->Views->render('pages', 'view', compact('book','title'));
    }

    /**
     * detail book
     * @param $id
     *
     */
    public function detail($id){
        $this->Session->isLogged('admin');
        //title page
        $title = "Détail emprunt";
        //load model for find all results
        $this->loadModel('Post');
        $details = $this->Post->findAll('historicalBorrowers h', [
            'leftjoin' => ['books b' => 'b.bookID=h.bookID'],
            'conditions' => 'b.bookID=' . $id
        ]);
        foreach ($details as $k => $v) {
            $details[$k] = new HistoricalBorrowers(get_object_vars($v));
        }
        //return view with params
        $this->Views->render('pages', 'detail', compact('title', 'details'));
    }
    public function users(){
        //lock session
        $this->Session->isLogged('admin');
        //define title
        $title = "Les utilisateurs";
        //load all borrowers
        $this->loadModel('Post');
        $users = $this->Post->findAll('borrowers',[]);
        foreach ($users as $k => $v) {
            $users[$k] = new Borrowers(get_object_vars($v));
        }
        $this->Views->render('pages','users',compact('title','users'));
    }

    /**
     * logout
     * @return mixed
     */
    public function logout()
    {
        $this->Session->logout('admin');
    }
}
