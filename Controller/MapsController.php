<?php

App::uses('AppController', 'Controller');

class MapsController extends AppController {

    public $name = 'Maps'; //Controller name
    public $uses = array('User'); //Model name

    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('view_map');
		$this->layout = 'map';
    }
	public function view_map() {	
		$url="";
		if($this->params->named)
		{
			foreach ($this->params->named as $key=>$value) { 
			if($value!=$value['0'])            
			$url .=$value."-";
			} 
		}
		else { 
			$url ="All New and Used Car";
		}  
		$condition = array();          
        if (($this->request->is('post') || $this->request->is('put')) && isset($this->data['Map'])) {
            $filter_url['page'] = 1;
            foreach ($this->data['Map'] as $name => $value) {
                if ($value) {
                    $filter_url[$name] = urlencode($value);
                }
            }
            return $this->redirect($filter_url);
        }else{
			if ($this->params['named']['street_name']) {
                $condition[] = array('User.address' => $this->params['named']['street_name']);
            }
			if ($this->params['named']['zip']) {
                $condition[] = array('User.zip' => $this->params['named']['zip']);
            }
		}
		if($condition){
			$this->set('carcount', $this->User->find('all',array('conditions' => $condition)));
		}else{
			$this->set('carcount', $this->User->find('all'));
		}
	}
}


?>