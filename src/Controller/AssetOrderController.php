<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;

/**
 * AssetOrder Controller
 *
 * @property \App\Model\Table\AssetOrderTable $AssetOrder
 */
class AssetOrderController extends AppController {

    public $Customers = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Customers = TableRegistry::get('Customers');
    }

    public function index() {
        return $this->redirect(['controller' => 'Home', 'action' => 'index']);
    }

    public function sales() {
        $customer = $this->Customers->newEntity();
        if ($this->request->is('post')) {
            $customer = $this->Customers->patchEntity($customer, $this->request->data);
            $result = $this->Customers->save($customer);
            if ($result) {
                if ($this->create_customer_asset($customer, $result->id)) {
                    $this->sendemail($result->id);
                    return $this->redirect(['controller'=>CTR_SUCCESS,'action' => 'index']);
                }
            } else {
                //$this->Flash->error(__('The customer could not be saved. Please, try again.'));
            }
        }
        $assetTypes = $this->Customers->CustomerAssets->AssetTypes->find('list', ['limit' => 200]);
        $provinces = $this->Customers->CustomerAssets->Addresses->Provinces->find('list', [
            'keyField' => 'id',
            'valueField' => 'province_name'
        ]);

        $this->set(compact('customer', 'assetTypes', 'provinces'));
        $this->set('_serialize', ['customer']);
    }

    public function purchase() {
        $customer = $this->Customers->newEntity();
        if ($this->request->is('post')) {
            $customer = $this->Customers->patchEntity($customer, $this->request->data);
            $result = $this->Customers->save($customer);
            if ($result) {
                
                if ($this->create_customer_asset($customer, $result->id)) {
                    $this->sendemail($result->id);
                    return $this->redirect(['controller'=>CTR_SUCCESS,'action' => 'index']);
                }
            } else {
                //$this->Flash->error(__('The customer could not be saved. Please, try again.'));
            }
        }
        $budgets = [
            '<1.5' => 'ต่ำกว่า 1.5 ล้าน',
            '1.5-3' => '1.5-3 ล้าน',
            '3-6' => '3-6 ล้าน',
            '6-10' => '6-10 ล้าน',
            '10-20' => '10-20 ล้าน',
            '>20' => 'มากกว่า 20 ล้าน'];

        $assetTypes = $this->Customers->CustomerAssets->AssetTypes->find('list', ['limit' => 200]);
        $zones = $this->Customers->CustomerAssets->Zones->find('all')->toArray();

        $this->set(compact('customer', 'assetTypes', 'zones', 'budgets'));
        $this->set('_serialize', ['customer']);
    }

   

    private function create_customer_asset($data, $customer_id) {
        $asset = $data->customer_asset;
        $address = isset($data->address) ? $data->address : NULL;
        $address_id = NULL;
        if (!is_null($address)) {
            $addressData = $this->Customers->CustomerAssets->Addresses->newEntity();
            $addressData = $this->Customers->CustomerAssets->Addresses->patchEntity($addressData, $address);
            $result = $this->Customers->CustomerAssets->Addresses->save($addressData);
            $address_id = $result->id;
        }

        $customerAsset = $this->Customers->CustomerAssets->newEntity();
        $customerAsset = $this->Customers->CustomerAssets->patchEntity($customerAsset, $asset);
        $customerAsset->customer_id = $customer_id;
        $customerAsset->address_id = $address_id;
        if ($this->Customers->CustomerAssets->save($customerAsset)) {
            return true;
        } else {
            return false;
        }
    }
    


    private function sendemail($customer_id=null) {
        if(is_null($customer_id)){
            return;
        }
        $customer = $this->Customers->get($customer_id,[
            'contain'=>['CustomerAssets'=>['AssetTypes']]
        ]);

        $this->log($customer,'debug');
        
        if(is_null($customer)){
            return;
        }
        if(sizeof($customer->customer_assets)==0){
            return;
        }
        $customerAsset = $customer->customer_assets[0];
        
        //debug($customer);
        //start to send email
        //Get mail config
        $settingModel = TableRegistry::get('Settings');
        $settingData = $settingModel->get('0');
        
        
        $title = 'ลูกค้าฝากขายบ้านที่ดิน www.lovethaihome.com';
        $site_to_view = SITE_URL . 'customer-assets/view-sale/' . $customerAsset->id;
        $to = $settingData->email_receiver_seller;
        if($customerAsset->type =='P'){
            $title = 'ลูกค้าฝากหาสินทรัพย์ www.lovethaihome.com';
            $site_to_view = SITE_URL . 'customer-assets/view-purchase/' . $customerAsset->id;
            $to = $settingData->email_receiver_purchase;
        }
        
        
        $this->log($settingData,'debug');
        
        $sendEmail = new Email('default');
        $sendEmail->viewVars(['customer' => $customer,'customerAsset'=>$customerAsset, 'subject' => $title,'site_to_view'=>$site_to_view]);
        $sendEmail->template('customer_sales_purchase', 'default')
                ->subject($title)
                ->emailFormat('html')
                ->to($to)
                ->helpers(['Html'])
                ->send();
    }

}
