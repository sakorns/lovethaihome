<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Zones Controller
 *
 * @property \App\Model\Table\ZonesTable $Zones
 */
class ZonesController extends AppController {

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
        $title="โซน";
        $zones = $this->paginate($this->Zones);

        $this->set(compact('zones','title'));
        $this->set('_serialize', ['zones']);
    }


    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $title="เพิ่มโซน";
        $zone = $this->Zones->newEntity();
        if ($this->request->is('post')) {
            $zone = $this->Zones->patchEntity($zone, $this->request->data);
            if ($this->Zones->save($zone)) {
                $this->Flash->success(__('The zone has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The zone could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('zone','title'));
        $this->set('_serialize', ['zone']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Zone id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $zone = $this->Zones->get($id, [
            'contain' => []
        ]);
        $title = "แก้ไขโซน";
        if ($this->request->is(['patch', 'post', 'put'])) {
            $zone = $this->Zones->patchEntity($zone, $this->request->data);
            if ($this->Zones->save($zone)) {
                $this->Flash->success(__('The zone has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The zone could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('zone','title'));
        $this->set('_serialize', ['zone']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Zone id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $zone = $this->Zones->get($id);
        if ($this->Zones->delete($zone)) {
            $this->Flash->success(__('The zone has been deleted.'));
        } else {
            $this->Flash->error(__('The zone could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
