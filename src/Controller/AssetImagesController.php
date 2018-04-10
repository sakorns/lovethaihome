<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * AssetImages Controller
 *
 * @property \App\Model\Table\AssetImagesTable $AssetImages
 */
class AssetImagesController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Assets', 'Images']
        ];
        $assetImages = $this->paginate($this->AssetImages);

        $this->set(compact('assetImages'));
        $this->set('_serialize', ['assetImages']);
    }

    /**
     * View method
     *
     * @param string|null $id Asset Image id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $assetImage = $this->AssetImages->get($id, [
            'contain' => ['Assets', 'Images']
        ]);

        $this->set('assetImage', $assetImage);
        $this->set('_serialize', ['assetImage']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $assetImage = $this->AssetImages->newEntity();
        if ($this->request->is('post')) {
            $assetImage = $this->AssetImages->patchEntity($assetImage, $this->request->data);
            if ($this->AssetImages->save($assetImage)) {
                $this->Flash->success(__('The asset image has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The asset image could not be saved. Please, try again.'));
            }
        }
        $assets = $this->AssetImages->Assets->find('list', ['limit' => 200]);
        $images = $this->AssetImages->Images->find('list', ['limit' => 200]);
        $this->set(compact('assetImage', 'assets', 'images'));
        $this->set('_serialize', ['assetImage']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Asset Image id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $assetImage = $this->AssetImages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $assetImage = $this->AssetImages->patchEntity($assetImage, $this->request->data);
            if ($this->AssetImages->save($assetImage)) {
                $this->Flash->success(__('The asset image has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The asset image could not be saved. Please, try again.'));
            }
        }
        $assets = $this->AssetImages->Assets->find('list', ['limit' => 200]);
        $images = $this->AssetImages->Images->find('list', ['limit' => 200]);
        $this->set(compact('assetImage', 'assets', 'images'));
        $this->set('_serialize', ['assetImage']);
    }

    public function setdefault($id = null) {
        if (is_null($id)) {
            return;
        }
        $assetImage = $this->AssetImages->get($id);
        if (is_null($assetImage)) {
            return;
        }
        $assetId = $assetImage->asset_id;

        //Set all to N
        $query = $this->AssetImages->find();
        $query->where(['isdefault' => 'Y'])
                ->where(['asset_id' => $assetId]);
        $assetImages = $query->toArray();

        foreach ($assetImages as $a) {
            $a->isdefault = 'N';
            $this->AssetImages->save($a);
        }

        $assetImage->isdefault = 'Y';
        $this->AssetImages->save($assetImage);
        $this->Flash->success(__('The asset image has been saved.'));
        return $this->redirect(['controller' => 'admin-asset', 'action' => 'edit', $assetId]);
    }

    /**
     * Delete method
     *
     * @param string|null $id Asset Image id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        //$this->request->allowMethod(['post', 'delete']);
        $assetImage = $this->AssetImages->get($id, [
            'contain' => ['Images']
        ]);
        $assetId = $assetImage->asset_id;
        $imageId = $assetImage->image->id;

        if ($this->AssetImages->delete($assetImage)) {
            $this->loadComponent('UploadImage');
            $this->UploadImage->delete($imageId);
            $this->Flash->success(__('The asset image has been deleted.'));
        } else {
            $this->Flash->error(__('The asset image could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'admin-asset', 'action' => 'edit', $assetId]);
    }

    public function upload($assetId = null) {
        if ($this->request->is(['patch', 'post', 'put'])) {
            $files = $this->request->data['upload_file'];

            $this->loadComponent('UploadImage');
            $assetModel = TableRegistry::get('Assets');
            $asset = $assetModel->get($assetId);
            
            $query = $this->AssetImages->find('all', [
                'conditions' => ['AssetImages.asset_id' => $assetId]
            ]);
            $countImage = $query->count();
            foreach ($files as $f) {
                if ($f['name'] != '') {
                    $image_id = $this->UploadImage->upload($f,$asset->code);
                    if ($image_id != null) {
                        $countImage++;
                        $assetImage = $this->AssetImages->newEntity();
                        $assetImage->asset_id = $assetId;
                        $assetImage->image_id = $image_id;
                        $assetImage->seq = $countImage;
                        if ($countImage == 1) {
                            $assetImage->isdefault = 'Y';
                        }
                        $this->AssetImages->save($assetImage);
                    }
                }
            }
            $this->Flash->success(__('The asset image has been deleted.'));
        }
        return $this->redirect(['controller' => 'admin-asset', 'action' => 'edit', $assetId]);
    }

    public function updateseq($id = NULL, $type = NULL) {
        $assetImage = $this->AssetImages->get($id, [
            'contain' => ['Images']
        ]);
        $assetId = $assetImage->asset_id;
        $currentseq = $assetImage->seq;
        $targetseq = $assetImage->seq;

        //Count all image
        $query = $this->AssetImages->find('all', [
            'conditions' => ['AssetImages.asset_id' => $assetId]
        ]);
        $countImage = $query->count();


        if (in_array(strtoupper($type), ['UP', 'DOWN'])) {
            if ('UP' === strtoupper($type)) {
                $targetseq = $currentseq - 1;
            } else {
                $targetseq = $currentseq + 1;
            }
            //Check in rang of image
            if ($targetseq > 0 && $targetseq <= $countImage) {
                $query = $this->AssetImages->find('all', [
                    'conditions' => ['AssetImages.seq' => $targetseq, 'AssetImages.asset_id' => $assetId]
                ]);

                //update image old
                $_assetImage = $query->first();
                if (!is_null($_assetImage)) {
                    $_assetImage->seq = $currentseq;
                    $this->AssetImages->save($_assetImage);
                }

                //update image new
                $assetImage->seq = $targetseq;
                if ($this->AssetImages->save($assetImage)) {
                    $this->Flash->success('Saved');
                }
            }
        }


        return $this->redirect(['controller' => 'admin-asset', 'action' => 'edit', $assetId]);
    }

}
