<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;

/**
 * AdminAsset Controller
 *
 * @property \App\Model\Table\AdminAssetTable $AdminAsset
 */
class AdminAssetController extends AppController {

    public $Assets = null;
    public $Customers = null;
    public $Options = null;
    public $directions = ['ทิศเหนือ' => 'ทิศเหนือ', 'ทิศใต้' => 'ทิศใต้', 'ทิศตะวันออก' => 'ทิศตะวันออก', 'ทิศตะวันตก' => 'ทิศตะวันตก', 'ทิศตะวันออกเฉียงเหนือ' => 'ทิศตะวันออกเฉียงเหนือ', 'ทิศตะวันออกเฉียงใต้' => 'ทิศตะวันออกเฉียงใต้', 'ทิศตะวันตกเฉียงเหนือ' => 'ทิศตะวันตกเฉียงเหนือ', 'ทิศตะวันตกเฉียงใต้' => 'ทิศตะวันตกเฉียงใต้'];

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->viewBuilder()->layout('admin');
        $this->Assets = TableRegistry::get('Assets');
        $this->Options = TableRegistry::get('Options');
    }

    public function index() {
        $where = [];
        $code = '';
        $name = '';
        $user_id = '';
        

        if ($this->request->is('post')) {
            $code = $this->request->data['code'];
            $name = $this->request->data['name'];
            $user_id = $this->request->data['user_id'];
            $this->request->session()->write('AdminAssetFilters.code', $code);
            $this->request->session()->write('AdminAssetFilters.name', $name);
            $this->request->session()->write('AdminAssetFilters.user_id', $user_id);
        } else {
            if (!(is_null($this->request->session()->read('AdminAssetFilters')))) {
                if (!(is_null($this->request->session()->read('AdminAssetFilters.code')))) {
                    $code = $this->request->session()->read('AdminAssetFilters.code');
                }
                if (!(is_null($this->request->session()->read('AdminAssetFilters.name')))) {
                    $name = $this->request->session()->read('AdminAssetFilters.name');
                }
                if (!(is_null($this->request->session()->read('AdminAssetFilters.user_id')))) {
                    $user_id = $this->request->session()->read('AdminAssetFilters.user_id');
                }
            }
        }

        if ($code != '') {
            array_push($where, ['Assets.code LIKE' => $code]);
            $this->set('code',$code);
        }
        if ($name != '') {
            array_push($where, ['Assets.name LIKE' => $name]);
            $this->set('name',$name);
        }
        if ($user_id != '') {
            array_push($where, ['Assets.user_id' => $user_id]);
            $this->set('user_id',$user_id);
        }

        $query = $this->Assets->find('all', [
            'contain' => ['AssetTypes', 'Users'],
            'conditions' => $where
        ]);


        $users = $this->Assets->Users->find('list', [
            'keyField' => 'id',
            'valueField' => function ($e) {
                return $e->get('firstname') . ' ' . $e->get('lastname');
            },
            'conditions' => ['Users.isseller' => 'Y'],
            'order' => ['Users.firstname' => 'ASC']
        ]);


        $assets = $this->paginate($query, [
            'limit' => PAGINATE_LIMIT
        ]);
        
        //Page no
        $pageNo = $this->request->query('page');
        if (is_null($pageNo) || $pageNo == '') {
            $pageNo = 1;
        }else{
            $pageNo = intval($pageNo);
        }
        $seq = (($pageNo-1)*PAGINATE_LIMIT)+1;
        $this->set('seq',$seq);
        //End page no
        
        
        $title = 'รายการทรัพย์สิน';
        $this->set(compact('assets', 'title', 'users'));
        $this->set('_serialize', ['assets']);
    }
    
    public function clear(){
        $this->request->session()->delete('AdminAssetFilters');
        return $this->redirect(['action' => 'index']);
    }

    public function add() {
        $asset = $this->Assets->newEntity();
        if ($this->request->is('post')) {
            $asset = $this->Assets->patchEntity($asset, $this->request->data);
            $result = $this->Assets->save($asset);
            if ($result) {
                $this->Flash->success(MSG_SAVE_SUCCESS);
                $this->save_option($result->id, $asset->asset_option);

                $this->sendemail($result->id);
                return $this->redirect(['action' => 'edit', $result->id]);
            } else {
                $this->Flash->error(MSG_ERR_REQ_FIELD);
            }
        }
        $assetTypes = $this->Assets->AssetTypes->find('list', ['limit' => 200]);
        $users = $this->Assets->Users->find('list', [
            'keyField' => 'id',
            'valueField' => function ($e) {
                return $e->get('firstname') . ' ' . $e->get('lastname');
            },
            'conditions' => ['Users.isseller' => 'Y']
        ]);
        $zones = $this->Assets->Zones->find('list', [
            'keyField' => 'id',
            'valueField' => 'name'
        ]);
        $provinces = $this->Assets->Addresses->Provinces->find('list', [
            'keyField' => 'id',
            'valueField' => 'province_name'
        ]);
        $query = $this->Options->find('all', [
            'conditions' => ['Options.type' => 'FACI']
        ]);
        $facis = $query->toArray();

        $query = $this->Options->find('all', [
            'conditions' => ['Options.type' => 'PLAC']
        ]);
        $placs = $query->toArray();

        $directions = $this->directions;

        $this->set(compact('asset', 'assetTypes', 'users', 'zones', 'provinces', 'directions', 'facis', 'placs'));
        $this->set('_serialize', ['asset']);
    }

    public function edit($id = null) {
        $asset = $this->Assets->get($id, [
            'contain' => ['Addresses', 'AssetImages' => ['sort' => ['AssetImages.seq' => 'ASC'], 'Images'], 'AssetOptions']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $asset = $this->Assets->patchEntity($asset, $this->request->data);
            if ($this->Assets->save($asset)) {
                $this->save_option($asset->id, $asset->asset_option);
                $this->Flash->success(MSG_SAVE_SUCCESS);

                return $this->redirect(['action' => 'edit', $id]);
            } else {
                $this->Flash->error(__('The asset could not be saved. Please, try again.'));
            }
        }
        $assetTypes = $this->Assets->AssetTypes->find('list', ['limit' => 200]);
        $users = $this->Assets->Users->find('list', [
            'keyField' => 'id',
            'valueField' => function ($e) {
                return $e->get('firstname') . ' ' . $e->get('lastname');
            },
            'conditions' => ['Users.isseller' => 'Y']
        ]);
        $zones = $this->Assets->Zones->find('list', [
            'keyField' => 'id',
            'valueField' => 'name'
        ]);

        $provinces = $this->Assets->Addresses->Provinces->find('list', [
            'keyField' => 'id',
            'valueField' => 'province_name'
        ]);

        $query = $this->Options->find('all', [
            'conditions' => ['Options.type' => 'FACI']
        ]);
        $facis = $query->toArray();

        $query = $this->Options->find('all', [
            'conditions' => ['Options.type' => 'PLAC']
        ]);
        $placs = $query->toArray();

        $directions = $this->directions;
        $title = 'แก้ไขทรัพย์สิน';
        $this->set(compact('asset', 'assetTypes', 'users', 'zones', 'provinces', 'title', 'directions', 'facis', 'placs'));
        $this->set('_serialize', ['asset']);
    }

    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $asset = $this->Assets->get($id);
        if ($this->Assets->delete($asset)) {
            $this->Flash->success(MSG_DEL_SUCCESS);
            $address = $this->Assets->Addresses->get($asset->address_id);
            $this->Assets->Addresses->delete($address);
        } else {
            $this->Flash->error(__('The asset could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    private function save_option($asset_id = null, $options = null) {
        $this->Assets->AssetOptions->deleteAll(['AssetOptions.asset_id' => $asset_id], $cascade = true);
        foreach ($options as $a) {
            if ($a['option_id'] === '0') {
                
            } else {
                $assetOption = $this->Assets->AssetOptions->newEntity();
                $assetOption->asset_id = $asset_id;
                $assetOption->option_id = $a['option_id'];
                $this->Assets->AssetOptions->save($assetOption);
            }
        }
    }

    public function sendemail($asset_id = NULL) {
        $this->render(false);
        if (!is_null($asset_id)) {
            $this->Customers = TableRegistry::get('Customers');

            $asset = $this->Assets->get($asset_id, [
                'contain' => ['Addresses']
            ]);


            if (!is_null($asset)) {
                $zone_id = $asset->zone_id;
                $asset_type_id = $asset->asset_type_id;
                $price = $asset->price_amount;

                $customerIds = $this->Customers->CustomerAssets->find('all', [
                            'fields' => ['customer_id'],
                            'conditions' => [
                                'CustomerAssets.type' => 'P',
                                'CustomerAssets.zone_id' => $zone_id,
                                'CustomerAssets.asset_type_id' => $asset_type_id,
                            ],
                            'group' => ['CustomerAssets.customer_id']
                        ])->toArray();

                if (sizeof($customerIds) != 0) {

                    foreach ($customerIds as $a) {
                        $customer = $this->Customers->get($a->customer_id);
                        if (!is_null($customer)) {
                            if ((!is_null($customer->email)) && $customer->email !== '') {
                                $sendEmail = new Email('default');
                                $sendEmail->viewVars(['asset' => $asset, 'subject' => 'รายการสินทรัพย์ใหม่ www.lovethaihome.com']);
                                $sendEmail->template('new_asset', 'default')
                                        ->subject('รายการสินทรัพย์ใหม่ www.lovethaihome.com')
                                        ->emailFormat('html')
                                        ->to($customer->email)
                                        ->helpers(['Html'])
                                        ->send();
                            }
                        }
                    }
                }
            }
        }
    }

}
