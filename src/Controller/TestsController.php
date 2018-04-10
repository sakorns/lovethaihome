<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;
/**
 * Tests Controller
 *
 * @property \App\Model\Table\TestsTable $Tests
 */
class TestsController extends AppController {

    public $Assets = null;
    
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Assets = TableRegistry::get('Assets');
        $this->render(false);
    }

    public function testemail($id=NULL) {
        if(is_null($id)){
            return;
        }
        $asset = $this->Assets->get($id, [
            'contain' => ['AssetTypes', 'Zones', 'AssetOptions' => ['Options'], 'Addresses' => ['Provinces'], 'AssetImages' => ['sort' => ['AssetImages.seq' => 'ASC'], 'Images'], 'Users' => ['Useimages' => ['Images']]]
        ]);

        
        $sendEmail = new Email('default');
        $sendEmail->viewVars(['asset' => $asset, 'subject' => 'Daily  dividend.']);
        $sendEmail->template('new_asset', 'default')
                ->subject('Daily  dividend.')
                ->emailFormat('html')
                ->to('clashpop@gmail.com')
                ->helpers(['Html'])
                ->send();
    }

}
