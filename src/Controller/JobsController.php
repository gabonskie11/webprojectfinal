<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Jobs Controller
 *
 * @property \App\Model\Table\JobsTable $Jobs
 *
 * @method \App\Model\Entity\Job[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class JobsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $keyword = $this->request->query('keyword');
        
        if(!empty($keyword)){
            $this->paginate = [
                'conditions' => ['title LIKE' => '%'.$keyword.'%']
            ];
        }

        $jobs = $this->paginate($this->Jobs);

        
    }

    //start functions for resume
    public function resumeindex()
    {
        $keyword = $this->request->query('keyword');
        
        if(!empty($keyword)){
            $this->paginate = [
                'conditions' => ['title LIKE' => '%'.$keyword.'%']
            ];
        }

        $query = $this->Jobs->find('all')->where(['status' => 'Approved']);

        $this->set('jobs', $this->paginate($query));

    }

    public function resumeview($id = null){
        $id = $this->Jobs->get($id);
        $job = $this->Jobs->get($id, [
            'contain' => []
        ]);
        $this->set('job', $job);
        $this->Jobs->saveField('no_views', $this->Jobs->field('no_views')+1);
    }

    /**
     * View method
     *
     * @param string|null $id Job id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => []
        ]);

        $this->set('job', $job);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $job = $this->Jobs->newEntity();
        if ($this->request->is('post')) {
           
            $job = $this->Jobs->patchEntity($job, $this->request->getData());
            if ($this->Jobs->save($job, $this->request->data)) {
                $this->Flash->success(__('The job has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job could not be saved. Please, try again.'));
        }
        $this->set(compact('job'));
    }

    public function jobmonitor(){
        $job = $this->Jobs->get($id, [
            'contain' => []
        ]);

        $this->set('job', $job);
    }


    public function postjob()
    {
        $job = $this->Jobs->newEntity();
        if ($this->request->is('post')) {
           
            $job = $this->Jobs->patchEntity($job, $this->request->getData());
            if ($this->Jobs->save($job, $this->request->data)) {
                $this->Flash->success(__('The job has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job could not be saved. Please, try again.'));
        }
        $this->set(compact('job'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Job id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $job = $this->Jobs->patchEntity($job, $this->request->getData());
            if ($this->Jobs->save($job)) {
                $this->Flash->success(__('The job has been updated.'));

                return $this->redirect(['action' => 'approvedjobs']);
            }
            $this->Flash->error(__('The job could not be saved. Please, try again.'));
        }
        $this->set(compact('job'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Job id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $job = $this->Jobs->get($id);
        if ($this->Jobs->delete($job)) {
            $this->Flash->success(__('The job has been deleted.'));
        } else {
            $this->Flash->error(__('The job could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function apply($id = null){
        $this->request->allowMethod(['post', 'apply']);
        $job = $Jobs->get($id);
        if($this->apply($job)) {
            $this->Jobs->updateAll(array('no_apply'=>'no_apply+1'));
            $this->Flash->success(__('You successfully applied for the job!'));
        } else {
            $this->Flash->error(__('Job application failed, please retry.'));
        }
        return $this->redirect(['action' => 'resumeindex']);
    }




    //functions for resume 

    public function resumejobs(){

        $jobs = $this->paginate($this->Jobs);

        $this->set(compact('jobs'));
    }

    public function companyindex(){
        $keyword = $this->request->query('keyword');
        
        if(!empty($keyword)){
            $this->paginate = [
                'conditions' => ['title LIKE' => '%'.$keyword.'%']
            ];
        }

        $user_id = $this->Auth->user('id');
        $query = $this->Jobs->find('all');

        $this->set('jobs', $this->paginate($query));
    }

    public function approvedjobs()
    {
        $keyword = $this->request->query('keyword');
        
        if(!empty($keyword)){
            $this->paginate = [
                'conditions' => ['title LIKE' => '%'.$keyword.'%']
            ];
        }

        $query = $this->Jobs->find('all')->where(['status' => 'Approved']);

        $this->set('jobs', $this->paginate($query));

    }

    public function pendingjobs()
    {
        $keyword = $this->request->query('keyword');
        
        if(!empty($keyword)){
            $this->paginate = [
                'conditions' => ['title LIKE' => '%'.$keyword.'%']
            ];
        }

        $query = $this->Jobs->find('all')->where(['status' => 'Pending']);

        $this->set('jobs', $this->paginate($query));

    }
}
