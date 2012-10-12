<?php
App::uses('Controller', 'Controller');
class AppController extends Controller {

////////////////////////////////////////////////////////////

	public $components = array(
		'Session',
		'Auth',
		'RequestHandler',
		'DebugKit.Toolbar',
	);

////////////////////////////////////////////////////////////

	public $paginate = array('limit' => 100);

////////////////////////////////////////////////////////////

	public function beforeFilter() {

		$this->Auth->loginAction = array('controller' => 'users', 'action' => 'login', 'admin' => false);
		$this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'index', 'admin' => true);
		$this->Auth->logoutRedirect = array('controller' => 'products', 'action' => 'index', 'admin' => false);

		$this->Auth->authenticate = array(
			AuthComponent::ALL => array(
				'userModel' => 'User',
				'fields' => array(
					'username' => 'username',
					'password' => 'password'
				),
				'scope' => array(
					'User.active' => 1,
					'User.level' => 'admin'
				)
			), 'Form'
		);

		if(isset($this->request->params['admin']) && ($this->request->params['prefix'] == 'admin')) {
			$this->layout = 'admin';
		} else {
			$this->Auth->allow();

			$menuvendors = Cache::read('menuvendors');
			if (!$menuvendors) {
				$menuvendors = ClassRegistry::init('User')->getVendors();
				Cache::set(array('duration' => '+10 minutes'));
				Cache::write('menuvendors', $menuvendors);
			}
			$this->set(compact('menuvendors'));
		}

		if ($this->RequestHandler->isAjax()) {
			$this->layout = 'ajax';
		}

	}

////////////////////////////////////////////////////////////

	public function _getSubDomain() {
		$url = explode('.', $_SERVER['HTTP_HOST']);
		return $url[0];
	}

////////////////////////////////////////////////////////////

	public function admin_switch($field = null, $id = null) {

		$this->autoRender = false;

		$model = $this->modelClass;

		if ($this->$model && $field && $id) {
			$field = $this->$model->escapeField($field);
			return $this->$model->updateAll(array($field => '1 -' . $field), array($this->$model->escapeField() => $id));
		}

		if(!$this->RequestHandler->isAjax()) {
			$this->redirect($this->referer());
		}

	}

////////////////////////////////////////////////////////////

	public function admin_editable() {

		$model = $this->modelClass;

		$id = $this->request->data['pk'];
		$field = $this->request->data['name'];
		$value = $this->request->data['value'];

		$this->$model->id = $id;
		$this->$model->saveField($field, $value);

		$this->autoRender = false;

	}

////////////////////////////////////////////////////////////

}
