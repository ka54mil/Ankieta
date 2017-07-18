<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Auth Controller
 *
 */
class AuthController extends AppController
{
    public $Auth = false;

    public function initialize()
    {
    	parent::initialize();
        $this->Auth->allow(['login', 'register']);
    }

    /**
     * Login method
     *
     * @return \Cake\Network\Response|void
     */
    public function login()
    {
    	$this->loadModel("Users");

    	if ($this->Auth->user()){
    		return $this->redirect($this->Auth->redirectUrl());
    	}

        if ($this->request->is('post')) {

            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    	$user = $this->Users->newEntity();
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Logout method
     *
     * @return \Cake\Network\Response|null
     */
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function register()
    {
    	$this->loadModel("Users");
		$user = $this->Users->newEntity();
        if ($this->request->is('post')) {
        	$user = $this->Users->saveUser($this->request->getData());
        	if ($user != false){
        		$this->Flash->success(__('The user has been saved.'));

                return $this->redirect('/');
        	} else {
       			$this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
}