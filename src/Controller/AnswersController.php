<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Answers Controller
 *
 * @property \App\Model\Table\AnswersTable $Answers
 *
 * @method \App\Model\Entity\Answer[] paginate($object = null, array $settings = [])
 */
class AnswersController extends AppController
{

    public $paginate = [
            'limit' => 10
        ];
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        
        $answers = $this->paginate($this->Answers);

        $this->set(compact('answers'));
        $this->set('_serialize', ['answers']);
    }

    /**
     * View method
     *
     * @param string|null $id Answer id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $answer = $this->Answers->get($id);

        $this->set('answer', $answer);
        $this->set('_serialize', ['answer']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $answer = $this->Answers->newEntity();
        if ($this->request->is('post')) {
            $answer = $this->Answers->addAnswer( $this->request->getData());
            if ($answer != false){
                $this->Flash->success(__('The answer has been saved.'));
            } else {
                $this->Flash->error(__('The answer could not be saved. Please, try again.'));
            }
        }
        $questions = $this->Answers->Questions->find('list');
        $users = $this->Answers->Users->find('list', ['order' => ['user_id' =>'asc']]);
        $this->set(compact('answer', 'questions', 'users'));
        $this->set('_serialize', ['answer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Answer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $answer = $this->Answers->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if ($this->Answers->editAnswer($answer, $this->request->getData())) {
                $this->Flash->success(__('The answer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The answer could not be saved. Please, try again.'));
        }

        $questions = $this->Answers->Questions->find('list');
        $users = $this->Answers->Users->find('list', ['order' => ['user_id' =>'asc']]);
        $this->set(compact('answer', 'questions', 'users'));
        $this->set('_serialize', ['answer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Answer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        if ($this->Answers->_delete($id)) {
            $this->Flash->success(__('The answer has been deleted.'));
        } else {
            $this->Flash->error(__('The answer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
