<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Options Controller
 *
 * @property \App\Model\Table\OptionsTable $Options
 */
class OptionsController extends AppController {

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->viewBuilder()->layout('admin');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($type = '') {
        $title=  "สิ่งอำนวยความสะดวก";
        $query = $this->Options->find('all', [
                'conditions' => ['Options.type' => strtoupper($type)],
            'order' => ['Options.seq' => 'ASC']
            ]);
        
        $options = $this->paginate($query,[
            'limit' => PAGINATE_LIMIT
        ]);
        
        $page_title = $this->getTitle($type);
        $this->set(compact('options','page_title','type','title'));
        $this->set('_serialize', ['options']);
    }

    /**
     * View method
     *
     * @param string|null $id Option id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $option = $this->Options->get($id, [
            'contain' => []
        ]);

        $this->set('option', $option);
        $this->set('_serialize', ['option']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($type='OTHER') {
        $option = $this->Options->newEntity();
        if ($this->request->is('post')) {
            $option = $this->Options->patchEntity($option, $this->request->data);
            if ($this->Options->save($option)) {
                $this->Flash->success(__('The option has been saved.'));

                return $this->redirect(['action' => 'index',$type]);
            } else {
                $this->Flash->error(__('The option could not be saved. Please, try again.'));
            }
        }
        $page_title = $this->getTitle($type);
        $this->set(compact('option','type','page_title'));
        $this->set('_serialize', ['option']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Option id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $option = $this->Options->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $option = $this->Options->patchEntity($option, $this->request->data);
            if ($this->Options->save($option)) {
                $this->Flash->success(__('The option has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The option could not be saved. Please, try again.'));
            }
        }
        $type = $option->type;
        $page_title = $this->getTitle($type);
        $this->set(compact('option','type','page_title'));
        $this->set('_serialize', ['option']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Option id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $option = $this->Options->get($id);
        $type = $option->type;
        if ($this->Options->delete($option)) {
            $this->Flash->success(__('The option has been deleted.'));
        } else {
            $this->Flash->error(__('The option could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index',$type]);
    }
    
    private function getTitle($type = ''){
        $page_title = '';
        $type= strtoupper($type);
        if($type ==='FACI'){
            $page_title = 'สิ่งอำนวยความสะดวก';
        }else if($type ==='PLAC'){
            $page_title='สถานที่ใกล้เคียง';
        }else{
            $page_title = 'อื่น ๆ';
        }
        
        return $page_title;
    }

}
