<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Useimages Controller
 *
 * @property \App\Model\Table\UseimagesTable $Useimages
 */
class UseimagesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Images']
        ];
        $useimages = $this->paginate($this->Useimages);

        $this->set(compact('useimages'));
        $this->set('_serialize', ['useimages']);
    }

    /**
     * View method
     *
     * @param string|null $id Useimage id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $useimage = $this->Useimages->get($id, [
            'contain' => ['Images']
        ]);

        $this->set('useimage', $useimage);
        $this->set('_serialize', ['useimage']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $useimage = $this->Useimages->newEntity();
        if ($this->request->is('post')) {
            $useimage = $this->Useimages->patchEntity($useimage, $this->request->data);
            if ($this->Useimages->save($useimage)) {
                $this->Flash->success(__('The useimage has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The useimage could not be saved. Please, try again.'));
            }
        }
        $images = $this->Useimages->Images->find('list', ['limit' => 200]);
        $this->set(compact('useimage', 'images'));
        $this->set('_serialize', ['useimage']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Useimage id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $useimage = $this->Useimages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $useimage = $this->Useimages->patchEntity($useimage, $this->request->data);
            if ($this->Useimages->save($useimage)) {
                $this->Flash->success(__('The useimage has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The useimage could not be saved. Please, try again.'));
            }
        }
        $images = $this->Useimages->Images->find('list', ['limit' => 200]);
        $this->set(compact('useimage', 'images'));
        $this->set('_serialize', ['useimage']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Useimage id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $useimage = $this->Useimages->get($id);
        if ($this->Useimages->delete($useimage)) {
            $this->Flash->success(__('The useimage has been deleted.'));
        } else {
            $this->Flash->error(__('The useimage could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
