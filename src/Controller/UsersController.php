<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use Cake\View\Helper\HtmlHelper;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * admin functions for pagination of every users by status 'active','pending','disabled';
     * 
     */

    public function activeusers()
    {
        $keyword = $this->request->query('keyword');
        
        if(!empty($keyword)){
            $this->paginate = [
                'conditions' => ['name LIKE' => '%'.$keyword.'%']
            ];
        }

        $query = $this->Users->find('all')->where(['status' => 'Active']);

        $this->set('users', $this->paginate($query));
    }

    public function pendingusers()
    {
        $keyword = $this->request->query('keyword');
        
        if(!empty($keyword)){
            $this->paginate = [
                'conditions' => ['name LIKE' => '%'.$keyword.'%']
            ];
        }

        $query = $this->Users->find('all')->where(['status' => 'Pending']);

        $this->set('users', $this->paginate($query));
    }

    public function disabledusers()
    {
        $keyword = $this->request->query('keyword');
        
        if(!empty($keyword)){
            $this->paginate = [
                'conditions' => ['name LIKE' => '%'.$keyword.'%']
            ];
        }

        $query = $this->Users->find('all')->where(['status' => 'Disabled']);

        $this->set('users', $this->paginate($query));

    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function adminadd()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'activeusers']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'activeusers']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function disable($id = null)
    {
        $usersTable = TableRegistry::get('Users');
        $user = $usersTable->get($id);
        
        $user->status = 'Disabled';
        $usersTable->save($user);
        return $this->redirect(['action' => 'activeusers']);
    }

    public function approve($id = null)
    {
        $usersTable = TableRegistry::get('Users');
        $user = $usersTable->get($id);
        $user->status = 'Active';
        $usersTable->save($user);
        return $this->redirect(['action' => 'activeusers']);
    }

    public function delete($id = null){
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('User has been deleted.'));
        } else {
            $this->Flash->error(__('User could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'disabledusers']);
    }

   public function login(){ 
    if($this->request->is('post')){
        $user = $this->Auth->identify();
            if($user && $user['role'] === 'admin' && $user['status'] === 'Active'){
                $this->Auth->setUser($user);
                return $this->redirect(['controller'=>'Users', 'action'=> 'activeusers']);
            }else if($user && $user['role'] === 'resume' && $user['status'] === 'Active'){
                $this->Auth->setUser($user);
                return $this->redirect(['controller'=>'Jobs', 'action'=> 'resumeindex']);
            } else if($user && $user['role'] === 'company' && $user['status'] === 'Active'){
                $this->Auth->setUser($user);
                return $this->redirect(['controller'=>'Jobs', 'action'=> 'companyindex']);
            }
            $this->Flash->error('Login Error!');

        }
    }

    public function logout(){
        $this->Flash->success('You are logged out');
        return $this->redirect($this->Auth->logout());
   }

   public function beforeFilter(Event $event){
       $this->Auth->allow(['register']);
       $this->Auth->allow(['resumeregister']);
       $this->Auth->allow(['companyregister']);
       $this->Auth->authenticate=$this->User;
   }

   public function resumeregister(){
    $user = $this->Users->newEntity();
        if($this->request->is('post')){
            $user = $this->Users->patchEntity($user, $this->request->data);
            if($this->Users->save($user)){  
                $this->Flash->success('You are registered and can login');
                return $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error('Registration Error');
            }
        }
        $this->set(compact('user'));
        $this->set('_serialzie', ['user']);
   }

   public function companyregister()
    {
        $user = $this->Users->newEntity();
        if($this->request->is('post')){
            $user = $this->Users->patchEntity($user, $this->request->data);
            if($this->Users->save($user)){  
                $this->Flash->success('You are registered and can login');
                return $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error('You are not registered');
            }
        }
        $this->set(compact('user'));
        $this->set('_serialzie', ['user']);

    }

   
}
