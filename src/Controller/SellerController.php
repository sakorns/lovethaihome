<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Seller Controller
 *
 * @property \App\Model\Table\SellerTable $Seller
 */
class SellerController extends AppController {

    public $Users = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->viewBuilder()->layout('admin');
        $this->Users = TableRegistry::get('Users');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $title = "รายชื่อตัวแทนขาย";
        $query = $this->Users->find('all')
                ->where(['isseller' => 'Y'])
                ->order(['firstname' => 'ASC']);
        $users = $this->paginate($query, [
            'limit' => PAGINATE_LIMIT
        ]);

        $this->set(compact('users','title'));
        $this->set('_serialize', ['users']);
        
        $page = ($this->request->params['paging']['Users']['page']);
        $count = 1;
        if($page>1){
            $count = $count+(PAGINATE_LIMIT*($page-1));
        }
        $this->set('count',$count);
    }

    /**
     * View method
     *
     * @param string|null $id Seller id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $seller = $this->Seller->get($id, [
            'contain' => []
        ]);

        $this->set('seller', $seller);
        $this->set('_serialize', ['seller']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $title = "เพิ่มตัวแทนขาย";
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            $user->iscustomer = 'N';
            $user->isseller = 'Y';
            $result = $this->Users->save($user);
            if ($result) {
                $this->Flash->success(MSG_SAVE_SUCCESS);

                $file = $this->request->data['upload_file'];

                $this->loadComponent('UploadImage');
                $image_id = $this->UploadImage->upload($file);
                if ($image_id != null) {
                    $this->setImage($result->id, $image_id);
                }

                return $this->redirect(['action' => 'edit', $result->id]);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Seller id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $user = $this->Users->get($id, [
            'contain' => ['Useimages'=>['Images']]
        ]);
        
        $title = "แก้ไขตัวแทนขาย";
       
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            $user->iscustomer = 'N';
            $user->isseller = 'Y';

            if ($this->Users->save($user)) {
                $this->Flash->success(MSG_SAVE_SUCCESS);

                $file = $this->request->data['upload_file'];

                $this->loadComponent('UploadImage');
                $image_id = $this->UploadImage->upload($file);
                if ($image_id != null) {
                    $this->setImage($id, $image_id);
                }

                return $this->redirect(['action' => 'edit', $id]);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    private function setImage($id, $image_id) {
        $Useimages = TableRegistry::get('Useimages');
        $useimage = $Useimages->findByUserId($id, [
                    'contain' => ['Images']
                ])->first();
        if (sizeof($useimage) == 0) {
            $use = $Useimages->newEntity();
            $use->user_id = $id;
            $use->image_id = $image_id;
            $result = $Useimages->save($use);
        } else {
            $useimage->image_id = $image_id;
            $result = $Useimages->save($useimage);
        }
        if ($result) {
            return $result->id;
        } else {
            return null;
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Seller id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);

        $Assets = TableRegistry::get('Assets');
        $query = $Assets->findByUserId($id);
        $userWithAssets = $query->toArray();

        if(sizeof($userWithAssets) >0 ){
            return $this->redirect(['action' => 'confirm',$id]);
        }else{
            if ($this->Users->delete($user)) {
                $this->Flash->success(MSG_DEL_SUCCESS);
            } else {
                $this->Flash->error(__('The user could not be deleted. Please, try again.'));
            }
        }
        

        return $this->redirect(['action' => 'index']);
    }

    public function confirm($id=null){
        if(is_null($id)){
            return;
        }

        $user = $this->Users->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            
            if ($this->Users->delete($user)) {
                $this->Flash->success(MSG_DEL_SUCCESS);
            } else {
                $this->Flash->error(__('The user could not be deleted. Please, try again.'));
            }
            return $this->redirect(['action' => 'index']);
        }

        $Assets = TableRegistry::get('Assets');
        $query = $Assets->findByUserId($id);
        $assets = $query->toArray();

        $this->set(compact('assets'));
        $this->set('user',$user);
        $this->set('_serialize', ['assets','user']);

    }

}
