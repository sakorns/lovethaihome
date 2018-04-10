<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Validation\Validator;

/**
 * Settings Controller
 *
 * @property \App\Model\Table\SettingsTable $Settings
 */
class SettingsController extends AppController {

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->viewBuilder()->layout('admin');
    }

    /**
     * Edit method
     *
     * @param string|null $id Setting id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function mail() {
        $setting = $this->Settings->get('0', [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
  
            $setting = $this->Settings->patchEntity($setting, $this->request->data);
            debug($setting);
            if ($this->Settings->save($setting)) {
                $this->Flash->success(__('The setting has been saved.'));
                
                return $this->redirect(['action' => 'mail']);
            } else {
                $this->Flash->error(__('The setting could not be saved. Please, try again.'));
            }
           //$validator = new Validator();
           //debug($setting);
           //debug($validator->errors($setting));
        }
        
        $this->set(compact('setting'));
        $this->set('_serialize', ['setting']);
    }

   

}
