<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
    public function initialize(){
        parent::initialize();
        $this->loadModel('Answers');
    }

    /**
     * Displays a view
     * @return void
     */
    public function index($page = null)
    {
        if ($page == null || $page < 3) {
            $this->paginate = [
                'limit' => 2,
                'page' => 1
            ];
        } else {

            $this->paginate = [
                'limit' => 1,
                'page' => $page
            ];
        }

        $this->loadModel('Questions');
        $answers = [];
        try {
            $questions = $this->paginate($this->Questions);
        } catch (NotFoundException $exeption){
            return $this->redirect(['action' => 'thanks']);
        }
        $user_id = $this->Auth->user()['user_id'];
        foreach ($questions as $question) {
            $answers[] = $this->Answers->newEntity(['user_id' => $user_id, 'question_id' => $question->question_id]);

        }
        $this->set(compact('questions', 'user_id', 'answers'));
        $this->set('_serialize', ['questions']);
        $this->render('home');

    }

    public function answer($page)
    {
        $tmp = $page;
        if ($this->request->is('post')){
            $answers = $this->request->getData();
            foreach ($answers['user_id'] as $key => $answer) {
                $data = [];
                foreach ($answers as $field => $value) {
                    $data[$field] = $value[$key];
                }

                if ($this->Answers->addAnswer($data) == false){
                    $this->Flash->error(__('The answer could not be saved. Please, try again.'));
                    $page = $tmp;
                } else {
                    $page++;
                }

            }

            return $this->redirect(['action' => 'index', $page]);

        }
       return $this->redirect(['url' => ['action' => 'index', $page]]);

        $this->autoRender = false;

    }

    public function thanks(){

    }
}
