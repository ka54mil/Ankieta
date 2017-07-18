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

    public function beforeFilter(Event $event)
    {
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

    	if (!$this->Auth->user()){
    		return $this->redirect($this->Auth->redirectUrl());
    	}

    	$user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
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

    	if (!$this->Auth->user()){
    		return $this->redirect($this->Auth->redirectUrl());
    	}

    	$user = $this->Users->newEntity();
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
}