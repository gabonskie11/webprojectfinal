<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use App\Controller\QueryExpression;

/**
 * Jobs Controller
 *
 * @property \App\Model\Table\JobsTable $Jobs
 *
 * @method \App\Model\Entity\Job[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class JobsController extends AppController
{
    public $paginate = [
        'limit' => 10,
        
    ];
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }


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
        $jobs = TableRegistry::get('Jobs');
        
        if(!empty($keyword)){
            $this->paginate = [
                'conditions' => ['title LIKE' => '%'.$keyword.'%']
            ];
        }

        $query = $jobs->find('all')->where(['status' => 'Approved']);

        foreach ($query as $job) {
            $job->no_impression += 1;
            $jobs->save($job);
        }
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
        
        $jobsTable = TableRegistry::get('Jobs');
        $jobs = $jobsTable->get($id);
        $jobs->no_views = $jobs->no_views+1;
        ($jobsTable->save($jobs));
        $job = $this->Jobs->get($id, [
            'contain' => []
        ]);
        $this->set('job', $job);
    }

    public function companyview($id = null){
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
    public function add(){
        $job = $this->Jobs->newEntity();
        if ($this->request->is('post')){
            $job = $this->Jobs->patchEntity($job, $this->request->getData());
            if ($this->Jobs->save($job)) {
                $this->Flash->success(__('The job has been saved.'));
                return $this->redirect(['action' => 'companyindex']);
            }
            $this->Flash->error(__('The job could not be saved. Please, try again.'));
        }
        $this->set(compact('job'));
    }

    public function jobmonitor(){
        $id = $this->Auth->
        $job = $this->Jobs->get($id, [
            'contain' => []
        ]);

        $this->set('job', $job);
    }


    public function postjob(){
        $uid = $this->Auth->user('id');
        $job = $this->Jobs->newEntity();
        if ($this->request->is('post')){
            $job = $this->Jobs->patchEntity($job, $this->request->getData());
            $job->posted_by = $uid;
            if ($this->Jobs->save($job)) {

                $this->Flash->success(__('The job has been saved.'));
                return $this->redirect(['action' => 'companyindex']);
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

    public function companyedit($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $job = $this->Jobs->patchEntity($job, $this->request->getData());
            if ($this->Jobs->save($job)) {
                $this->Flash->success(__('The job has been updated.'));

                return $this->redirect(['action' => 'companyindex']);
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
        $jobsTable = TableRegistry::get('Jobs');
        $jobs = $jobsTable->get($id);
        $jobs->no_apply = $jobs->no_apply+1;
        if($jobsTable->save($jobs)){
            $this->Flash->success(__('Successfully Applied!'));
        } else {
            $this->Flash->error(__('Application error. Please try again.'));
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
        $query = $this->Jobs->find('all')->where(['posted_by' => $user_id]);

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

    public function approve($id = null){
        $jobsTable = TableRegistry::get('Jobs');
        $job = $jobsTable->get($id);
        $job->start = date('Y-m-d');
        $job->expire = date('Y-m-d', strtotime('+1 month'));
        $job->status = 'Approved';
        $jobsTable->save($job);
        return $this->redirect(['action' => 'pendingjobs']);
    }

    public function adminjobadd(){
        $uid = $this->Auth->user('id');
        $job = $this->Jobs->newEntity();
        if ($this->request->is('post')){
            $job = $this->Jobs->patchEntity($job, $this->request->getData());
            $job->posted_by = $uid;
            if ($this->Jobs->save($job)) {

                $this->Flash->success(__('The job has been saved.'));
                return $this->redirect(['action' => 'approvedjobs']);
            }
            $this->Flash->error(__('The job could not be saved. Please, try again.'));
        }
        $this->set(compact('job'));

    }

}
