<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Home Controller
 *
 * @property \App\Model\Table\HomeTable $Home
 */
class HomeController extends AppController {

    public $AssetTypes = null;
    public $Provinces = null;
    public $Amphurs = null;
    public $Users = null;
    public $prices_start = [0=>'0',1000000 => '1,000,000', 2000000 => '2,000,000',3000000=>'3,000,000',4000000=>'4,000,000',5000000=>'5,000,000',6000000=>'6,000,000',7000000=>'7,000,000',8000000=>'8,000,000',10000000=>'10,000,000',10000001=>'ตั้งแต่ 10 ล้าน'];
    public $prices_end = [1000000 => '1,000,000', 2000000 => '2,000,000',3000000=>'3,000,000',4000000=>'4,000,000',5000000=>'5,000,000',6000000=>'6,000,000',7000000=>'7,000,000',8000000=>'8,000,000',10000000=>'10,000,000'];

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->AssetTypes = TableRegistry::get('AssetTypes');
        $this->Provinces = TableRegistry::get('Provinces');
        $this->Amphurs = TableRegistry::get('Amphurs');
        $this->Users = TableRegistry::get('Users');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $this->viewBuilder()->layout('home');

        $assetTypes = $this->AssetTypes->find('all', [
                    'contain' => ['Assets'],
                    'order' => ['AssetTypes.seq' => 'ASC']
                ])->toArray();

        $assetTypeList = $this->AssetTypes->find('list', ['limit' => 200]);
        $provinces = $this->Provinces->find('list', [
            'keyField' => 'id',
            'valueField' => 'province_name'
        ]);
        
        $amphurs = $this->Amphurs->find('all', [
            'fields' => ['id', 'amphur_name', 'province_id']
        ])->toArray();
        $amphurs = json_encode($amphurs);

        
        $users = $this->Users->find('list', [
            'keyField' => 'id',
            'valueField' => function ($e) {
                return $e->get('firstname') . ' ' . $e->get('lastname');
            },
            'conditions' => ['Users.isseller' => 'Y'],
            'order' => ['Users.firstname' => 'ASC']
        ]);

        $this->set('assetTypes', $assetTypes);
        $this->set('provinces', $provinces);
        $this->set('amphurs', $amphurs);
        $this->set('assetTypeList', $assetTypeList);
        $this->set('users', $users);
        $this->set('price_start', $this->prices_start);
        $this->set('price_end', $this->prices_end);
        $this->set('title', 'หน้าแรก');
    }

}
