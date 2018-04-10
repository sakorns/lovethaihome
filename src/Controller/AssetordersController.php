<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;

/**
 * Assetorders Controller
 *
 * @property \App\Model\Table\AssetordersTable $Assetorders
 */
class AssetordersController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $assetorders = $this->paginate($this->Assetorders);

        $this->set(compact('assetorders'));
        $this->set('_serialize', ['assetorders']);
    }

    /**
     * View method
     *
     * @param string|null $id Assetorder id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $assetorder = $this->Assetorders->get($id, [
            'contain' => []
        ]);

        $this->set('assetorder', $assetorder);
        $this->set('_serialize', ['assetorder']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $assetorder = $this->Assetorders->newEntity();
        if ($this->request->is('post')) {
            $assetorder = $this->Assetorders->patchEntity($assetorder, $this->request->data);
            if ($this->Assetorders->save($assetorder)) {
                $this->Flash->success(__('The assetorder has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The assetorder could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('assetorder'));
        $this->set('_serialize', ['assetorder']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Assetorder id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $assetorder = $this->Assetorders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $assetorder = $this->Assetorders->patchEntity($assetorder, $this->request->data);
            if ($this->Assetorders->save($assetorder)) {
                $this->Flash->success(__('The assetorder has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The assetorder could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('assetorder'));
        $this->set('_serialize', ['assetorder']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Assetorder id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $assetorder = $this->Assetorders->get($id);
        if ($this->Assetorders->delete($assetorder)) {
            $this->Flash->success(__('The assetorder has been deleted.'));
        } else {
            $this->Flash->error(__('The assetorder could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
