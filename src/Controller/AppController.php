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

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public function beforeFilter(Event $event) {
        //debug($this->request->session()->read('AssetTypes'));
        if ((is_null($this->request->session()->read('AssetTypes')))) {
            $AssetTypesModel = TableRegistry::get('AssetTypes');
            $assetTypes = $AssetTypesModel->find('all', [
                        'order' => ['AssetTypes.seq' => 'ASC']
                    ])->toArray();
            $this->request->session()->write('AssetTypes', $assetTypes);

            $CategoriesModel = TableRegistry::get('Categories');
            $categories = $CategoriesModel->find('all', [
                        'contain' => ['Articles' => ['sort' => ['Articles.seq' => 'DESC']]],
                        'order' => ['Categories.seq' => 'ASC']
                    ])->toArray();
            $this->request->session()->write('Articles', $categories);
        }

        $control = strtolower($this->request->params['controller']);
        $action = strtolower($this->request->params['action']);
        $userType = 'G';
        if (!(is_null($this->request->session()->read('Auth.User.email')))) {
            $userIsCustomer = $this->request->session()->read('Auth.User.iscustomer');
            if ($userIsCustomer === 'Y') {
                $userType = 'M';
            } else {
                $userType = 'A';
            }
        }
        $this->verificationPermission($control, $action, $userType);



        //$this->Auth->allow(['index', 'view', 'display']);
    }

    private function verificationPermission($control = '', $action = '', $userType = '') {
        $guestAllow = array(
            'users' => array(
                'login', 'logout', 'register', 'forgot', 'resetpassword'
            ),
            'home' => array(),
            'service' => array(),
            'pages' => array(),
            'assetorder' => array(),
            'assets' => array(),
            'images' => array(),
            'documents' => array(),
            'articles' => array('view'),
            'success'=>array()
        );

        $memberAllow = array(
        );

        $role = array();
        if ($userType === 'G') {
            $role = $guestAllow;
        } else if ($userType === 'M') {
            array_push($memberAllow, $guestAllow);
            $role = $memberAllow;
        } else if ($userType === 'A') {
            $control = '';
            //$role = $guestAllow;
        } else {
            
        }

        if (isset($role[$control])) {
            if (sizeof($role[$control]) == 0) {
                $this->Auth->allow();
            } else {
                if (in_array($action, $role[$control])) {
                    $this->Auth->allow($role[$control]);
                } else {
                    $this->Auth->deny();
                    return $this->redirect(['controller' => 'home', 'action' => 'index']);
                }
            }
        } else {
            if ($control === '') {
                $this->Auth->allow();
            } else {
                $this->Auth->deny();
                return $this->redirect(['controller' => 'home', 'action' => 'index']);
            }
        }
    }

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize() {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        $this->loadComponent('Auth', [
            'loginAction' => [
                'controller' => 'home',
                'action' => 'index'
            ],
            'loginRedirect' => [
                'controller' => 'admin-homes',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'home',
                'action' => 'index'
            ],
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'email']
                ]
            ]
        ]);

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see http://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event) {
        if (!array_key_exists('_serialize', $this->viewVars) &&
                in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

}
