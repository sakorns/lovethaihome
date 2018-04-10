<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Documents Controller
 *
 * @property \App\Model\Table\DocumentsTable $Documents
 */
class DocumentsController extends AppController {

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->viewBuilder()->layout('view_file');
    }
    
   public function view(){
       $this->viewClass = 'Media';
        // Download app/outside_webroot_dir/example.zip
        $params = array(
            'id'        => 'example.zip',
            'name'      => 'example',
            'download'  => true,
            'extension' => 'zip',
            'path'      => APP . 'outside_webroot_dir' . DS
        );
        $this->set($params);
   }

}
