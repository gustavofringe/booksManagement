<?php

namespace Http;

use App\Controller;
use function date;
use function dd;
use Entity\Books;
use Entity\Borrowers;
use Entity\Posts;
use function method_exists;

class PostsController extends Controller
{
    /**
     * Edit book
     * @param $id
     */
    public function edit($id){
        // lock session
        $this->Session->isLogged('admin');
        //title page
        $var['title'] = "Emprunts";
        $this->loadModel('Post');
        //find book with id
        $var['book'] = $this->Post->findFirst('books',[
            'conditions'=>['bookID='.$id]
        ]);
        //find all borrowers
        $var['borrowers'] = $this->Post->findAll('borrowers',[]);
        $var['book'] = new Books(get_object_vars($var['book']));
        foreach ($var['borrowers'] as $k => $v) {
            $var['borrowers'][$k] = new Borrowers(get_object_vars($v));
        }
        //if change borrower
        if (isset($this->Request->post->borrower)) {
            $borrower = $this->Post->findFirst('borrowers', [
                'conditions' => ['memberID' => $this->Request->post->borrower]
            ]);
            //save available book
            $this->Post->save('books',[
                'bookID'=>$id,
                'available'=>0
            ]);
            //save historical borrower
            $this->Post->save('historicalBorrowers', [
                'name' => $borrower->name,
                'memberID' => $this->Request->post->borrower,
                'date' => date("Y-m-d"),
                'bookID' => $id
            ]);
            //flash message
            $this->Session->setFlash('Votre demande est enregistrée');
            //redirection
            $this->Views->redirect(BASE_URL . '/pages/books');
            die();
            //if change status
        }elseif (isset($this->Request->post->available)){
            $this->Post->save('books',[
                'bookID'=>$id,
                'available'=>1
            ]);
            //flash message
            $this->Session->setFlash('Votre demande est enregistrée');
            //redirection
            $this->Views->redirect(BASE_URL . '/pages/books');
            die();
        }
        $this->Views->render('posts','edit',$var);
    }
    /**
     *create new book
     */
    public function create()
    {
        //lock session
        $this->Session->isLogged('admin');
        //title page
        $title = "Nouveau livre";
        //load model for validate
        $this->loadModel('Post');
        $categories = $this->Post->findAll('categories',[]);
        //verify entry
        if ($this->Request->post) {
            //validate input
            if ($this->Post->validates($this->Request->post)) {
                // define available
                $this->Request->post->available = 1;
                //save request
                $this->Post->save('books',get_object_vars($this->Request->post));
                //flash message
                $this->Session->setFlash('Votre livre est enregistré');
                //redirection
                $this->Views->redirect(BASE_URL . '/pages/books');
                die();
            }
        }
        $this->Views->render('posts', 'create', compact('title','categories'));
    }
}
