<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * AssetTypes Controller
 *
 * @property \App\Model\Table\AssetTypesTable $AssetTypes
 */
class AssetTypesController extends AppController {

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
        $title = 'ประเภทของทรัพย์สิน';
        
        $query = $this->AssetTypes->find('all')
                ->order(['seq' => 'ASC']);
        $assetTypes = $this->paginate($query, [
            'limit' => PAGINATE_LIMIT
        ]);


        $this->set(compact('assetTypes'));
        $this->set('_serialize', ['assetTypes']);
        
        $page = ($this->request->params['paging']['AssetTypes']['page']);
        $count = 1;
        if($page>1){
            $count = $count+(PAGINATE_LIMIT*($page-1));
        }
        
        $this->set(compact('count','title'));
    }

    /**
     * View method
     *
     * @param string|null $id Asset Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $assetType = $this->AssetTypes->get($id, [
            'contain' => [],
            'order' => ['AssetTypes.name' => 'ASC']
        ]);

        $this->set('assetType', $assetType,'title');
        $this->set('_serialize', ['assetType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $assetType = $this->AssetTypes->newEntity();
        if ($this->request->is('post')) {
            $assetType = $this->AssetTypes->patchEntity($assetType, $this->request->data);
            $result = $this->AssetTypes->save($assetType);
            if ($result) {
                $this->Flash->success(MSG_SAVE_SUCCESS);

                return $this->redirect(['action' => 'edit', $result->id]);
            } else {
                $this->Flash->error(__('The asset type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('assetType'));
        $this->set('_serialize', ['assetType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Asset Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $assetType = $this->AssetTypes->get($id, [
            'contain' => []
        ]);
        
        $title = 'แก้ไขประเภทของทรัพย์สิน:'.$assetType->name;
       
        if ($this->request->is(['patch', 'post', 'put'])) {
            $assetType = $this->AssetTypes->patchEntity($assetType, $this->request->data);
            if ($this->AssetTypes->save($assetType)) {
                $this->Flash->success(MSG_SAVE_SUCCESS);

                $file = $this->request->data['upload_file'];

                $this->loadComponent('UploadImage');
                $image_id = $this->UploadImage->upload($file);
                if ($image_id != null) {
                    $Images = TableRegistry::get('Images');
                    $image = $Images->get($image_id);
                    $assetType->pic = $image->name;
                    $this->AssetTypes->save($assetType);
                }

                return $this->redirect(['action' => 'edit', $id]);
            } else {
                $this->Flash->error(__('The asset type could not be saved. Please, try again.'));
            }
        }

        
        $this->set(compact('assetType','title'));
        $this->set('_serialize', ['assetType']);
    }

    private function setImage($id, $image_id) {
        $Useimages = TableRegistry::get('Useimages');
        $useimage = $Useimages->findByRecordid($id, [
                    'contain' => ['Images']
                ])->first();
        if (sizeof($useimage) == 0) {
            $use = $Useimages->newEntity();
            $use->recordid = $id;
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
     * @param string|null $id Asset Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $assetType = $this->AssetTypes->get($id);
        if ($this->AssetTypes->delete($assetType)) {
            $this->Flash->success(MSG_DEL_SUCCESS);
        } else {
            $this->Flash->error(__('The asset type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
