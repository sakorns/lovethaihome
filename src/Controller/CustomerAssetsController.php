<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * CustomerAssets Controller
 *
 * @property \App\Model\Table\CustomerAssetsTable $CustomerAssets
 */
class CustomerAssetsController extends AppController {

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->viewBuilder()->layout('admin');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    
    public function index() {
        return $this->redirect(['action' => 'sales']);
    }
    
    public function sales() {
        $this->paginate = [
            'contain' => ['Customers', 'AssetTypes','Addresses'=>['Provinces']]
        ];
        //$customerAssets = $this->paginate($this->CustomerAssets);

        $query = $this->CustomerAssets->find('all')
                ->where(['CustomerAssets.type' => 'S'])
                ->order(['CustomerAssets.created' => 'DESC']);

        $customerAssets = $this->paginate($query, [
            'limit' => PAGINATE_LIMIT
        ]);
        
        //Page no
        $pageNo = $this->request->query('page');
        if (is_null($pageNo) || $pageNo == '') {
            $pageNo = 1;
        }else{
            $pageNo = intval($pageNo);
        }
        $seq = (($pageNo-1)*PAGINATE_LIMIT)+1;
        $this->set('seq',$seq);
        //End page no
        
        $this->set(compact('customerAssets'));
        $this->set('_serialize', ['customerAssets']);
    }
    
    public function purchase() {
        $this->paginate = [
            'contain' => ['Customers', 'AssetTypes']
        ];
       $query = $this->CustomerAssets->find('all')
                ->where(['CustomerAssets.type' => 'P'])
                ->order(['CustomerAssets.created' => 'DESC']);

        $customerAssets = $this->paginate($query, [
            'limit' => PAGINATE_LIMIT
        ]);
        //Page no
        $pageNo = $this->request->query('page');
        if (is_null($pageNo) || $pageNo == '') {
            $pageNo = 1;
        }else{
            $pageNo = intval($pageNo);
        }
        $seq = (($pageNo-1)*PAGINATE_LIMIT)+1;
        $this->set('seq',$seq);
        //End page no
        
        $this->set(compact('customerAssets'));
        $this->set('_serialize', ['customerAssets']);
    }

    /**
     * View method
     *
     * @param string|null $id Customer Asset id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function viewSale($id = null) {
        $customerAsset = $this->CustomerAssets->get($id, [
            'contain' => ['Customers', 'AssetTypes','Addresses'=>['Provinces']]
        ]);

        $title = 'ลูกค้าฝากขายบ้าน-ที่ดิน';
        $this->set('title', $title);
        $this->set('customerAsset', $customerAsset);
        $this->set('_serialize', ['customerAsset']);
    }
    public function viewPurchase($id = null) {
        $customerAsset = $this->CustomerAssets->get($id, [
            'contain' => ['Customers', 'AssetTypes','Addresses'=>['Provinces'],'Zones']
        ]);

        $title = 'ลูกค้าฝากหาบ้าน-ที่ดิน';
        $this->set('title', $title);
        $this->set('customerAsset', $customerAsset);
        $this->set('_serialize', ['customerAsset']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    /*
    public function add() {
        $customerAsset = $this->CustomerAssets->newEntity();
        if ($this->request->is('post')) {
            $customerAsset = $this->CustomerAssets->patchEntity($customerAsset, $this->request->data);
            if ($this->CustomerAssets->save($customerAsset)) {
                $this->Flash->success(__('The customer asset has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The customer asset could not be saved. Please, try again.'));
            }
        }
        $customers = $this->CustomerAssets->Customers->find('list', ['limit' => 200]);
        $assetTypes = $this->CustomerAssets->AssetTypes->find('list', ['limit' => 200]);
        $this->set(compact('customerAsset', 'customers', 'assetTypes'));
        $this->set('_serialize', ['customerAsset']);
    }
     
     */

    /**
     * Edit method
     *
     * @param string|null $id Customer Asset id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $customerAsset = $this->CustomerAssets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customerAsset = $this->CustomerAssets->patchEntity($customerAsset, $this->request->data);
            if ($this->CustomerAssets->save($customerAsset)) {
                $this->Flash->success(__('The customer asset has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The customer asset could not be saved. Please, try again.'));
            }
        }
        $customers = $this->CustomerAssets->Customers->find('list', ['limit' => 200]);
        $assetTypes = $this->CustomerAssets->AssetTypes->find('list', ['limit' => 200]);
        $this->set(compact('customerAsset', 'customers', 'assetTypes'));
        $this->set('_serialize', ['customerAsset']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Customer Asset id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null,$type='') {
        $this->request->allowMethod(['post', 'delete']);
        $customerAsset = $this->CustomerAssets->get($id);
        if ($this->CustomerAssets->delete($customerAsset)) {
            $this->Flash->success(__('The customer asset has been deleted.'));
        } else {
            $this->Flash->error(__('The customer asset could not be deleted. Please, try again.'));
        }
        $action = 'sales';
        if($type=='P'){
            $action='purchase';
        }
        return $this->redirect(['action' => $action]);
    }

}
