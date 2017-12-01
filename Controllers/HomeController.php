<?php
namespace Http;

use App\Controller;

class HomeController extends Controller
{

    /**
     * index
     * @return mixed
     */
    public function index()
    {
        //title page
        $title = "Accueil";
        $this->loadModel('User');
        //load model user
        if ($this->Request->post) {
            //hash password
            $password = $this->Service->hashPass($this->Request->post->password);
            //search users
            $users = $this->User->findAll('admins', [
                'name' => $this->Request->post->name,
                'password' => $password
            ]);
            //verify user password
            foreach ($users as $user) {
                if ($password == $user->password) {
                    $this->Session->write('admin', $user);
                    $this->Session->write('getAccount', true);
                    $this->Session->setFlash("Vous êtes maintenant connecté");
                    $this->Views->redirect('pages/books');
                    die();
                } else {
                    $this->Session->setFlash("Identifiant ou mot de passe incorrect", 'danger');
                }
            }
        }
        $this->Views->render('pages', 'index', compact('title'));
    }
}
