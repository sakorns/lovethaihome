<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

    public function index() {
        return $this->redirect(['action' => 'contact']);
    }

    public function advantages() {
        
    }

    public function contact() {
        $contactModel = TableRegistry::get('Contacts');
        $contact = $contactModel->newEntity();
        if ($this->request->is('post')) {
            $contact = $contactModel->patchEntity($contact, $this->request->data);
            $result = $contactModel->save($contact);
            if ($result) {
                $this->Flash->success('เราได้รับข้อมูลเรียบร้อยแล้ว ทางทีมงานจะติดต่อกลลับโดยเร็วที่สุด');
                $this->sendemail($contact);
                return $this->redirect(['controller'=>CTR_SUCCESS,'action' => 'index']);
            }else{
                 $this->Flash->error(__('The customer has been saved.'));
            }
        }
        
        $this->set(compact('contact'));
        $this->set('_serialize', ['contact']);
    }
    
    private function sendemail($contact){
        if(is_null($contact) || $contact ==''){
            return;
        }
        $settingModel = TableRegistry::get('Settings');
        $settingData = $settingModel->get('0');
        $to = $settingData->email_receiver_contact;
        $title ='การติดต่อจากลูกค้า';
        
        $sendEmail = new Email('default');
        $sendEmail->viewVars(['contact' => $contact, 'subject' => $title]);
        $sendEmail->template('contact', 'default')
                ->subject($title)
                ->emailFormat('html')
                ->to($to)
                ->helpers(['Html'])
                ->send();
    }

    public function job() {
        
    }

    public function seller() {
        $SellerModel = TableRegistry::get('Users');

        $query = $SellerModel->find()
                ->contain(['Useimages' => ['Images']])
                ->where(['isseller' => 'Y'])
                ->order(['firstname' => 'ASC']);
        $users = $this->paginate($query, [
            'limit' => 21
        ]);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

}
