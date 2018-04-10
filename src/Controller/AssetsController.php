<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Assets Controller
 *
 * @property \App\Model\Table\AssetsTable $Assets
 */
class AssetsController extends AppController {

    public $Users = null;
    public $Amphurs = null;
    public $prices_start = [0 => '0', 1000000 => '1,000,000', 2000000 => '2,000,000', 3000000 => '3,000,000', 4000000 => '4,000,000', 5000000 => '5,000,000', 6000000 => '6,000,000', 7000000 => '7,000,000', 8000000 => '8,000,000', 10000000 => '10,000,000', 10000001 => 'ตั้งแต่ 10 ล้าน'];
    public $prices_end = [1000000 => '1,000,000', 2000000 => '2,000,000', 3000000 => '3,000,000', 4000000 => '4,000,000', 5000000 => '5,000,000', 6000000 => '6,000,000', 7000000 => '7,000,000', 8000000 => '8,000,000', 10000000 => '10,000,000'];

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Users = TableRegistry::get('Users');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($assetTypeId = null) {

        $this->paginate = [
            'contain' => ['AssetTypes', 'Users', 'Addresses' => ['Provinces']]
        ];

        if ($this->request->is('post')) {
            $zone_id = $this->request->data['zone_id'];
            $assetTypeId = $this->request->data['asset_type_id'];

            $url = 'zone=' . $zone_id . '&type=' . $assetTypeId;
            $this->redirect(['action' => 'lists?' . $url]);
        }

        /*
          $where = [];
          if (!is_null($assetTypeId)) {
          $where = ['asset_type_id'=>$assetTypeId];
          $assetType =  $this->Assets->AssetTypes->get($assetTypeId);
          }

          $query = $this->Assets->find('all')
          ->where($where);
          //->order(['firstname' => 'ASC']);
          $assets = $this->paginate($query, [
          'limit' => PAGINATE_LIMIT
          ]);


         */

        $zones = $this->Assets->Zones->find('all')->toArray();
        $assetTypes = $this->Assets->AssetTypes->find('list', ['limit' => 200]);

        $this->set(compact('zones', 'assetTypes', 'assetTypeId'));
        $this->set('_serialize', ['assets']);
    }

    public function lists() {
        $this->paginate = [
            'contain' => ['AssetTypes', 'Users', 'Addresses' => ['Provinces'], 'AssetImages' => ['sort' => ['AssetImages.isdefault' => 'ASC'], 'Images']]
        ];
        $where = [];
        $order = [];
        $page_title = NULL;

        $zone_id = $this->request->query('zone');
        $asset_type_id = $this->request->query('type');
        $order_type = $this->request->query('order');
        $order_by = $this->request->query('by');
        $selltype = $this->request->query('selltype');
        $seller = $this->request->query('seller');

        if ($this->request->is('post')) {
            $order_type = $this->request->data['order_type'];
            $order_by = $this->request->data['order_by'];
        }

        /* where conditions */
        if (!is_null($zone_id) && $zone_id != '') {
            array_push($where, ['Assets.zone_id' => $zone_id]);
        }
        if (!is_null($asset_type_id) && $asset_type_id != '') {
            array_push($where, ['Assets.asset_type_id' => $asset_type_id]);
            $assetType = $this->Assets->AssetTypes->get($asset_type_id);
            if (!is_null($assetType)) {
                $page_title = $assetType->name;
            }
        }

        if (!is_null($seller) && $seller != '') {
            array_push($where, ['Assets.user_id' => $seller]);
        }


        /* order conditions */
        if (is_null($order_type)) {
            $order_type = 'D';
        }
        if (is_null($order_by)) {
            $order_by = 'DESC';
        }
        if (strtoupper($order_type) === 'D') {
            if (strtoupper($order_by) === 'DESC') {
                $order = ['Assets.created' => 'DESC'];
            } else {
                $order = ['Assets.created' => 'ASC'];
            }
        } else if (strtoupper($order_type) === 'P') {
            if (strtoupper($order_by) === 'DESC') {
                $order = ['Assets.price_amounnt' => 'DESC'];
            } else {
                $order = ['Assets.price_amounnt' => 'ASC'];
            }
        }

        if (!is_null($selltype)) {
            if (strtolower($selltype === 'special_marketprice')) {
                array_push($where, ['Assets.isspecial_marketprice' => 'Y']);
                $page_title = 'ทรัพย์สินที่ขายต่ำกว่าราคาตลาด';
            } else if (strtolower($selltype === 'special_appraised')) {
                array_push($where, ['Assets.isspecial_appraised' => 'Y']);
                $page_title = 'ทรัพย์สินขายต่ำกว่าราคาประเมิน';
            }
        }


        $query = $this->Assets->find('all')
                ->where($where)
                ->order($order);
        //->order(['firstname' => 'ASC']);
        $assets = $this->paginate($query, [
            'limit' => PAGINATE_LIMIT
        ]);



        $this->set(compact('assets', 'page_title'));
        $this->set('_serialize', ['assets']);
        $this->set('zone_id', $zone_id);
        $this->set('order_type', $order_type);
        $this->set('order_by', $order_by);
    }

    public function seller($seller_id = null) {
        $this->paginate = [
            'contain' => ['AssetTypes', 'Users', 'Addresses' => ['Provinces'], 'AssetImages' => ['sort' => ['AssetImages.isdefault' => 'ASC'], 'Images']]
        ];
        $where = [];
        $order = [];
        $page_title = NULL;
        $user = NULL;

        if (!is_null($seller_id)) {
            if ($this->Users->exists(['id' => $seller_id])) {
                $user = $this->Users->get($seller_id);
                if (!is_null($user)) {
                    $page_title = 'ของ ' . $user->firstname . ' ' . $user->lastname;
                    array_push($where, ['Assets.user_id' => $seller_id]);
                }
            }
        }

        $query = $this->Assets->find('all')
                ->where($where)
                ->order(['Assets.created' => 'DESC']);
        //->order(['firstname' => 'ASC']);
        $assets = $this->paginate($query, [
            'limit' => PAGINATE_LIMIT
        ]);



        $this->set(compact('assets', 'page_title'));
        $this->set('_serialize', ['assets']);
    }

    public function search() {

        //get urlpara
        $code = $this->request->query('code');
        $asset_type_id = $this->request->query('asset_type_id');
        $province_id = $this->request->query('province_id');
        $amphur_id = $this->request->query('amphur_id');
        $user_id = $this->request->query('user_id');
        $price_start = $this->request->query('price_start');
        $proce_end = $this->request->query('price_end');

        $where = [];
        $this->paginate = [
            'contain' => ['AssetTypes', 'Users', 'Addresses' => ['Provinces'], 'AssetImages' => ['sort' => ['AssetImages.isdefault' => 'ASC'], 'Images']]
        ];
        if ((!is_null($code)) && $code != '') {
            array_push($where, ['Assets.code LIKE' => '%' . $code . '%']);
        }
        if ((!is_null($asset_type_id)) && $asset_type_id != '') {
            array_push($where, ['Assets.asset_type_id' => $asset_type_id]);
        }

        if ((!is_null($user_id)) && $user_id != '') {
            array_push($where, ['Assets.user_id' => $user_id]);
        }
        if ((!is_null($price_start)) && $price_start != '') {
            if ($price_start > 10000000) {
                array_push($where, ['Assets.price_amounnt >' => 10000000]);
            } else {
                $price_start = $price_start - 1;
                array_push($where, ['Assets.price_amounnt >' => $price_start]);
            }
        }
        if ((!is_null($proce_end)) && $proce_end != '') {
            $proce_end = $proce_end + 1;
            array_push($where, ['Assets.price_amounnt <' => $proce_end]);
        }

        $query = $this->Assets->find();
        if ((!is_null($province_id)) && $province_id != '') {
            $addressWhere = [];
            array_push($addressWhere, ['Addresses.province_id' => $province_id]);

            if ((!is_null($amphur_id)) && $amphur_id != '') {
                $amphurModel = TableRegistry::get('Amphurs');
                $amphurData = $amphurModel->get($amphur_id);
                if ($amphurData != null) {
                    $amphur_name = $amphurData->amphur_name;
                    $amphur_name = str_replace("เขต", "", $amphur_name);
                    array_push($addressWhere, ['Addresses.amphur' => $amphur_name]);
                }
            }

            $query->matching('Addresses', function ($q) use ($addressWhere) {
                return $q->where($addressWhere);
            });
        }
        $query->where($where);

        $assets = $this->paginate($query, [
            'limit' => 200
        ]);
        $this->set(compact('assets'));
        $this->set('_serialize', ['assets']);


        //Get util oprtion
        $assetTypeList = $this->Assets->AssetTypes->find('list', ['limit' => 200]);
        $provinces = $this->Assets->Addresses->Provinces->find('list', [
            'keyField' => 'id',
            'valueField' => 'province_name'
        ]);
        $this->Amphurs = TableRegistry::get('Amphurs');
        $query = $this->Amphurs->find('all', [
                    'fields' => ['id', 'amphur_name', 'province_id']
                ])->toArray();
        $amphurs = json_encode($query);


        $users = $this->Assets->Users->find('list', [
            'keyField' => 'id',
            'valueField' => function ($e) {
                return $e->get('firstname') . ' ' . $e->get('lastname');
            },
            'conditions' => ['Users.isseller' => 'Y'],
            'order' => ['Users.firstname' => 'ASC']
        ]);
        $this->set(compact('users', 'provinces', 'amphurs', 'assetTypeList'));

        $this->set('price_start', $this->prices_start);
        $this->set('price_end', $this->prices_end);
        $this->set('amphur_id', $amphur_id);
        //end
    }

    public function formsearch() {
        $urls = '/assets/search/?s=true';
        if ($this->request->is('post')) {
            $code = $this->request->data['code'];
            $asset_type_id = $this->request->data['asset_type_id'];
            $province_id = $this->request->data['province_id'];
            $amphur_id = $this->request->data['amphur_id'];
            $user_id = $this->request->data['user_id'];
            $price_start = $this->request->data['price_start'];
            $price_end = $this->request->data['price_end'];

            if ((!is_null($code)) && $code != '') {
                $urls = $urls . '&code=' . $code;
            }
            if ((!is_null($asset_type_id)) && $asset_type_id != '') {
                $urls = $urls . '&asset_type_id=' . $asset_type_id;
            }

            if ((!is_null($user_id)) && $user_id != '') {
                $urls = $urls . '&user_id=' . $user_id;
            }
            if ((!is_null($price_start)) && $price_start != '') {
                $urls = $urls . '&price_start=' . $price_start;
            }
            if ((!is_null($price_end)) && $price_end != '') {
                $price_end = $price_end + 1;
                $urls = $urls . '&price_end=' . $price_end;
            }
            if ((!is_null($province_id)) && $province_id != '') {
                $urls = $urls . '&province_id=' . $province_id;
                if ((!is_null($amphur_id)) && $amphur_id != '') {
                    $urls = $urls . '&amphur_id=' . $amphur_id;
                }
            }
        }

        return $this->redirect($urls);
    }

    /**
     * View method
     *
     * @param string|null $id Asset id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $this->viewBuilder()->layout('home');
        $asset = $this->Assets->get($id, [
            'contain' => ['AssetTypes', 'Zones', 'AssetOptions' => ['Options'], 'Addresses' => ['Provinces'], 'AssetImages' => ['sort' => ['AssetImages.seq' => 'ASC'], 'Images'], 'Users' => ['Useimages' => ['Images']]]
        ]);

        $this->set('asset', $asset);
        $this->set('_serialize', ['asset']);
    }

}
