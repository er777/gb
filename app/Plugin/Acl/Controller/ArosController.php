<?php
/**
 *
 * @author   Nicolas Rod <nico@alaxos.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.alaxos.ch
 * 
 * @property AclReflectorComponent $AclReflector 
 */
class ArosController extends AclAppController
{

	var $name       = 'Aros';
	var $uses       = array('Aro');
	var $helpers    = array('Js' => array('Jquery'));
	
	var $paginate = array(
        'limit' => 20,
        //'order' => array('display_name' => 'asc')
		);
	
	function beforeFilter()
	{
	    $this->loadModel(Configure :: read('acl.aro.role.model'));
	    $this->loadModel(Configure :: read('acl.aro.member.model'));
	    
	    parent :: beforeFilter();
	}
    
	function admin_index()
	{
	    
	}
	
	function admin_check($run = null)
	{
		$member_model_name = Configure :: read('acl.aro.member.model');
	    $role_model_name = Configure :: read('acl.aro.role.model');
	    
	    $member_display_field = $this->AclManager->set_display_name($member_model_name, Configure :: read('acl.member.display_name'));
	    $role_display_field = $this->AclManager->set_display_name($role_model_name, Configure :: read('acl.aro.role.display_field'));
	    
	    $this->set('member_display_field', $member_display_field);
	    $this->set('role_display_field', $role_display_field);
	    
		$roles = $this->{$role_model_name}->find('all', array('order' => $role_display_field, 'contain' => false, 'recursive' => -1));
	 	
		$missing_aros = array('roles' => array(), '' => array());
	    
		foreach($roles as $role)
		{
			/*
			 * Check if ARO for role exist
			 */
			$aro = $this->Aro->find('first', array('conditions' => array('model' => $role_model_name, 'foreign_key' => $role[$role_model_name][$this->_get_role_primary_key_name()])));
			
			if($aro === false)
			{
				$missing_aros['roles'][] = $role;
			}
		}
		
		$ = $this->{$member_model_name}->find('all', array('order' => $member_display_field, 'contain' => false, 'recursive' => -1));
		foreach($ as $member)
		{
			/*
			 * Check if ARO for member exist
			 */
			$aro = $this->Aro->find('first', array('conditions' => array('model' => $member_model_name, 'foreign_key' => $member[$member_model_name][$this->_get_member_primary_key_name()])));
			
			if($aro === false)
			{
				$missing_aros[''][] = $member;
			}
		}
		
		
		if(isset($run))
		{
			$this->set('run', true);
			
			/*
			 * Complete roles AROs
			 */
			if(count($missing_aros['roles']) > 0)
			{
				foreach($missing_aros['roles'] as $k => $role)
				{
					$this->Aro->create(array('parent_id' 		=> null,
												'model' 		=> $role_model_name,
												'foreign_key' 	=> $role[$role_model_name][$this->_get_role_primary_key_name()],
												'alias'			=> $role[$role_model_name][$role_display_field]));
					
					if($this->Aro->save())
					{
						unset($missing_aros['roles'][$k]);
					}
				}
			}
			
			/*
			 * Complete  AROs
			 */
			if(count($missing_aros['']) > 0)
			{
				foreach($missing_aros[''] as $k => $member)
				{
					/*
					 * Find ARO parent for member ARO
					 */
					$parent_id = $this->Aro->field('id', array('model' => $role_model_name, 'foreign_key' => $member[$member_model_name][$this->_get_role_foreign_key_name()]));
					
					if($parent_id !== false)
					{
						$this->Aro->create(array('parent_id' 		=> $parent_id,
													'model' 		=> $member_model_name,
													'foreign_key' 	=> $member[$member_model_name][$this->_get_member_primary_key_name()],
													'alias'			=> $member[$member_model_name][$member_display_field]));
						
						if($this->Aro->save())
						{
							unset($missing_aros[''][$k]);
						}
					}
				}
			}
		}
		else
		{
			$this->set('run', false);
		}
		
		$this->set('missing_aros', $missing_aros);
		
	}
	
	function admin_()
	{
	    $member_model_name = Configure :: read('acl.aro.member.model');
	    $role_model_name = Configure :: read('acl.aro.role.model');
	    
	    $member_display_field = $this->AclManager->set_display_name($member_model_name, Configure :: read('acl.member.display_name'));
	    $role_display_field = $this->AclManager->set_display_name($role_model_name, Configure :: read('acl.aro.role.display_field'));
	    
	    $this->paginate['order'] = array($member_display_field => 'asc');
	    
	    $this->set('member_display_field', $member_display_field);
	    $this->set('role_display_field', $role_display_field);
	    
	    $this->{$role_model_name}->recursive = -1;
	    $roles = $this->{$role_model_name}->find('all', array('order' => $role_display_field, 'contain' => false, 'recursive' => -1));
	 
	    $this->{$member_model_name}->recursive = -1;
	    
	    if(isset($this->request->data['Member'][$member_display_field]) || $this->Session->check('acl.aros..filter'))
	    {
	        if(!isset($this->request->data['Member'][$member_display_field]))
	        {
	            $this->request->data['Member'][$member_display_field] = $this->Session->read('acl.aros..filter');
	        }
	        else
	        {
	            $this->Session->write('acl.aros..filter', $this->request->data['Member'][$member_display_field]);
	        }
	        
	        $filter = array($member_model_name . '.' . $member_display_field . ' LIKE' => '%' . $this->request->data['Member'][$member_display_field] . '%');
	    }
	    else
	    {
	        $filter = array();
	    }
	    
	    $ = $this->paginate($member_model_name, $filter);
	    
	    $missing_aro = false;
	    
	    foreach($ as &$member)
	    {
	    	$aro = $this->Acl->Aro->find('first', array('conditions' => array('model' => $member_model_name, 'foreign_key' => $member[$member_model_name][$this->_get_member_primary_key_name()])));
	    	
	        if($aro !== false)
	        {
	            $member['Aro'] = $aro['Aro'];
	        }
	        else
	        {
	            $missing_aro = true;
	        }
	    }
	    
	    $this->set('roles', $roles);
	    $this->set('', $);
	    $this->set('missing_aro', $missing_aro);
	}
	
	function admin_update_member_role()
	{
	    $member_model_name = Configure :: read('acl.aro.member.model');
	    
        $data = array($member_model_name => array($this->_get_member_primary_key_name() => $this->params['named']['member'], $this->_get_role_foreign_key_name() => $this->params['named']['role']));
	    
	    if($this->{$member_model_name}->save($data))
	    {
	        $this->Session->setFlash(__d('acl', 'The member role has been updated'), 'flash_message', null, 'plugin_acl');
	    }
	    else
	    {
	        $errors = array_merge(array(__d('acl', 'The member role could not be updated')), $this->{$member_model_name}->validationErrors);
	        $this->Session->setFlash($errors, 'flash_error', null, 'plugin_acl');
	    }

	    $this->_return_to_referer();
	}
	
	function admin_ajax_role_permissions()
	{
		$role_model_name = Configure :: read('acl.aro.role.model');
	    
		$role_display_field = $this->AclManager->set_display_name($role_model_name, Configure :: read('acl.aro.role.display_field'));
	    
	    $this->set('role_display_field', $role_display_field);
	    
	    $this->{$role_model_name}->recursive = -1;
	    $roles = $this->{$role_model_name}->find('all', array('order' => $role_display_field, 'contain' => false, 'recursive' => -1));
	 
	    $actions = $this->AclReflector->get_all_actions();
	    
	    $methods = array();
		foreach($actions as $k => $full_action)
    	{
	    	$arr = String::tokenize($full_action, '/');
	    	
			if (count($arr) == 2)
			{
				$plugin_name     = null;
				$controller_name = $arr[0];
				$action          = $arr[1];
			}
			elseif(count($arr) == 3)
			{
				$plugin_name     = $arr[0];
				$controller_name = $arr[1];
				$action          = $arr[2];
			}
			
			if($controller_name == 'App')
			{
			    unset($actions[$k]);
			}
			else
			{
        		if(isset($plugin_name))
                {
                	$methods['plugin'][$plugin_name][$controller_name][] = array('name' => $action);
                }
                else
                {
            	    $methods['app'][$controller_name][] = array('name' => $action);
                }
			}
    	}
    	
	    $this->set('roles', $roles);
	    $this->set('actions', $methods);
	}
	
	function admin_role_permissions()
	{
	    $role_model_name = Configure :: read('acl.aro.role.model');
	    
	    $role_display_field = $this->AclManager->set_display_name($role_model_name, Configure :: read('acl.aro.role.display_field'));
	    
	    $this->set('role_display_field', $role_display_field);
	    
	    $this->{$role_model_name}->recursive = -1;
	    $roles = $this->{$role_model_name}->find('all', array('order' => $role_display_field, 'contain' => false, 'recursive' => -1));
	 
	    $actions = $this->AclReflector->get_all_actions();
	    
	    $permissions = array();
	    $methods     = array();
	    
	    foreach($actions as $full_action)
    	{
	    	$arr = String::tokenize($full_action, '/');
	    	
			if (count($arr) == 2)
			{
				$plugin_name     = null;
				$controller_name = $arr[0];
				$action          = $arr[1];
			}
			elseif(count($arr) == 3)
			{
				$plugin_name     = $arr[0];
				$controller_name = $arr[1];
				$action          = $arr[2];
			}
    		
			if($controller_name != 'App')
			{
    		    foreach($roles as $role)
    	    	{
    	    	    $aro_node = $this->Acl->Aro->node($role);
    	            if(!empty($aro_node))
    	            {
    	                $aco_node = $this->Acl->Aco->node('controllers/' . $full_action);
    	        	    if(!empty($aco_node))
    	        	    {
    	        	    	$authorized = $this->Acl->check($role, 'controllers/' . $full_action);
    	        	    	
    	        	    	$permissions[$role[Configure :: read('acl.aro.role.model')][$this->_get_role_primary_key_name()]] = $authorized ? 1 : 0 ;
    					}
    	            }
    	    		else
            	    {
            	        /*
            	         * No check could be done as the ARO is missing
            	         */
            	        $permissions[$role[Configure :: read('acl.aro.role.model')][$this->_get_role_primary_key_name()]] = -1;
            	    }
        		}
        		
        		if(isset($plugin_name))
                {
                	$methods['plugin'][$plugin_name][$controller_name][] = array('name' => $action, 'permissions' => $permissions);
                }
                else
                {
            	    $methods['app'][$controller_name][] = array('name' => $action, 'permissions' => $permissions);
                }
			}
    	}
 		
	    $this->set('roles', $roles);
	    $this->set('actions', $methods);
	}
	
	function admin_member_permissions($member_id = null)
	{
	    $member_model_name = Configure :: read('acl.aro.member.model');
	    $role_model_name = Configure :: read('acl.aro.role.model');
	    
	    $member_display_field = $this->AclManager->set_display_name($member_model_name, Configure :: read('acl.member.display_name'));
	    
	    $this->paginate['order'] = array($member_display_field => 'asc');
	    $this->set('member_display_field', $member_display_field);
	    
	    if(empty($member_id))
	    {
    	    if(isset($this->request->data['Member'][$member_display_field]) || $this->Session->check('acl.aros.member_permissions.filter'))
    	    {
    	        if(!isset($this->request->data['Member'][$member_display_field]))
    	        {
    	            $this->request->data['Member'][$member_display_field] = $this->Session->read('acl.aros.member_permissions.filter');
    	        }
    	        else
    	        {
    	            $this->Session->write('acl.aros.member_permissions.filter', $this->request->data['Member'][$member_display_field]);
    	        }
    	        
    	        $filter = array($member_model_name . '.' . $member_display_field . ' LIKE' => '%' . $this->request->data['Member'][$member_display_field] . '%');
    	    }
    	    else
    	    {
    	        $filter = array();
    	    }
	        
	        $ = $this->paginate($member_model_name, $filter);
	        
	        $this->set('', $);
	    }
	    else
	    {
	    	$role_display_field = $this->AclManager->set_display_name($role_model_name, Configure :: read('acl.aro.role.display_field'));
	    
	    	$this->set('role_display_field', $role_display_field);
	    
	        $this->{$role_model_name}->recursive = -1;
	        $roles = $this->{$role_model_name}->find('all', array('order' => $role_display_field, 'contain' => false, 'recursive' => -1));
	 		
	        $this->{$member_model_name}->recursive = -1;
	        $member = $this->{$member_model_name}->read(null, $member_id);
	        
	        $permissions = array();
	    	$methods     = array();
	    		
	        /*
             * Check if the member exists in the ARO table
             */
            $member_aro = $this->Acl->Aro->node($member);
            if(empty($member_aro))
            {
                $display_member = $this->{$member_model_name}->find('first', array('conditions' => array($member_model_name . '.id' => $member_id, 'contain' => false, 'recursive' => -1)));
                $this->Session->setFlash(sprintf(__d('acl', "The member '%s' does not exist in the ARO table"), $display_member[$member_model_name][$member_display_field]), 'flash_error', null, 'plugin_acl');
            }
            else
            {
            	$actions = $this->AclReflector->get_all_actions();
        		
	            foreach($actions as $full_action)
		    	{
			    	$arr = String::tokenize($full_action, '/');
			    	
					if (count($arr) == 2)
					{
						$plugin_name     = null;
						$controller_name = $arr[0];
						$action          = $arr[1];
					}
					elseif(count($arr) == 3)
					{
						$plugin_name     = $arr[0];
						$controller_name = $arr[1];
						$action          = $arr[2];
					}

					if($controller_name != 'App')
					{
    					if(!isset($this->params['named']['ajax']))
    					{
        		    		$aco_node = $this->Acl->Aco->node('controllers/' . $full_action);
        	        	    if(!empty($aco_node))
        	        	    {
        	        	    	$authorized = $this->Acl->check($member, 'controllers/' . $full_action);
    
        	        	    	$permissions[$member[$member_model_name][$this->_get_member_primary_key_name()]] = $authorized ? 1 : 0 ;
        					}
    					}
    					
    			    	if(isset($plugin_name))
    		            {
    		            	$methods['plugin'][$plugin_name][$controller_name][] = array('name' => $action, 'permissions' => $permissions);
    		            }
    		            else
    		            {
    		        	    $methods['app'][$controller_name][] = array('name' => $action, 'permissions' => $permissions);
    		            }
					}
		    	}
		    	
		    	/*
		    	 * Check if the member has specific permissions
		    	 */
		    	$count = $this->Aro->Permission->find('count', array('conditions' => array('Aro.id' => $member_aro[0]['Aro']['id'])));
		    	if($count != 0)
		    	{
		    	    $this->set('member_has_specific_permissions', true);
		    	}
		    	else
		    	{
		    	    $this->set('member_has_specific_permissions', false);
		    	}
            }
            
            $this->set('member', $member);
            $this->set('roles', $roles);
            $this->set('actions', $methods);

            if(isset($this->params['named']['ajax']))
            {
                $this->render('admin_ajax_member_permissions');
            }
	    }
	}

	function admin_empty_permissions()
	{
	    if($this->Aro->Permission->deleteAll(array('Permission.id > ' => 0)))
	    {
	        $this->Session->setFlash(__d('acl', 'The permissions have been cleared'), 'flash_message', null, 'plugin_acl');
	    }
	    else
	    {
	        $this->Session->setFlash(__d('acl', 'The permissions could not be cleared'), 'flash_error', null, 'plugin_acl');
	    }
	    
	    $this->_return_to_referer();
	}
	
	function admin_clear_member_specific_permissions($member_id)
	{
	    $member =& $this->{Configure :: read('acl.aro.member.model')};
	    $member->id = $member_id;
	    
	    /*
         * Check if the member exists in the ARO table
         */
        $node = $this->Acl->Aro->node($member);
        if(empty($node))
        {
            $asked_member = $member->read(null, $member_id);
            $this->Session->setFlash(sprintf(__d('acl', "The member '%s' does not exist in the ARO table"), $asked_member['Member'][Configure :: read('acl.member.display_name')]), 'flash_error', null, 'plugin_acl');
        }
        else
        {
            if($this->Aro->Permission->deleteAll(array('Aro.id' => $node[0]['Aro']['id'])))
    	    {
    	        $this->Session->setFlash(__d('acl', 'The specific permissions have been cleared'), 'flash_message', null, 'plugin_acl');
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(__d('acl', 'The specific permissions could not be cleared'), 'flash_error', null, 'plugin_acl');
    	    }
        }
        
	    $this->_return_to_referer();
	}
	
	function admin_grant_all_controllers($role_id)
	{
	    $role =& $this->{Configure :: read('acl.aro.role.model')};
        $role->id = $role_id;
        
		/*
         * Check if the Role exists in the ARO table
         */
        $node = $this->Acl->Aro->node($role);
        if(empty($node))
        {
            $asked_role = $role->read(null, $role_id);
            $this->Session->setFlash(sprintf(__d('acl', "The role '%s' does not exist in the ARO table"), $asked_role['Role'][Configure :: read('acl.aro.role.display_field')]), 'flash_error', null, 'plugin_acl');
        }
        else
        {
            //Allow to everything
            $this->Acl->allow($role, 'controllers');
        }
        
	    $this->_return_to_referer();
	}
	function admin_deny_all_controllers($role_id)
	{
	    $role =& $this->{Configure :: read('acl.aro.role.model')};
        $role->id = $role_id;
        
        /*
         * Check if the Role exists in the ARO table
         */
        $node = $this->Acl->Aro->node($role);
        if(empty($node))
        {
            $asked_role = $role->read(null, $role_id);
            $this->Session->setFlash(sprintf(__d('acl', "The role '%s' does not exist in the ARO table"), $asked_role['Role'][Configure :: read('acl.aro.role.display_field')]), 'flash_error', null, 'plugin_acl');
        }
        else
        {
            //Deny everything
            $this->Acl->deny($role, 'controllers');
        }
        
	    $this->_return_to_referer();
	}
	
	function admin_get_role_controller_permission($role_id)
	{
		$role =& $this->{Configure :: read('acl.aro.role.model')};
        
        $role_data = $role->read(null, $role_id);
        
        $aro_node = $this->Acl->Aro->node($role_data);
        if(!empty($aro_node))
        {
	        $plugin_name        = isset($this->params['named']['plugin']) ? $this->params['named']['plugin'] : '';
	        $controller_name    = $this->params['named']['controller'];
	        $controller_actions = $this->AclReflector->get_controller_actions($controller_name);
	        
	        $role_controller_permissions = array();
	        
	        foreach($controller_actions as $action_name)
	        {
	        	$aco_path  = $plugin_name;
		        $aco_path .= empty($aco_path) ? $controller_name : '/' . $controller_name;
		        $aco_path .= '/' . $action_name;
		        
		        $aco_node = $this->Acl->Aco->node('controllers/' . $aco_path);
        	    if(!empty($aco_node))
        	    {
        	        $authorized = $this->Acl->check($role_data, 'controllers/' . $aco_path);
        	        $role_controller_permissions[$action_name] = $authorized;
        	    }
        	    else
        	    {
        	        $role_controller_permissions[$action_name] = -1;
        	    }
	        }
	    }
		else
        {
        	//$this->set('acl_error', true);
            //$this->set('acl_error_aro', true);
        }
        
		if($this->request->is('ajax'))
        {
        	Configure::write('debug', 0); //-> to disable printing of generation time preventing correct JSON parsing
        	echo json_encode($role_controller_permissions);
        	$this->autoRender = false;
        }
        else
        {
            $this->_return_to_referer();
        }
	}
	function admin_grant_role_permission($role_id)
	{
	    $role =& $this->{Configure :: read('acl.aro.role.model')};
        
        $role->id = $role_id;
        
        $aco_path = $this->_get_passed_aco_path();
        
        /*
         * Check if the role exists in the ARO table
         */
        $aro_node = $this->Acl->Aro->node($role);
        if(!empty($aro_node))
        {
            if(!$this->AclManager->save_permission($aro_node, $aco_path, 'grant'))
            {
                $this->set('acl_error', true);
            }
        }
        else
        {
            $this->set('acl_error', true);
            $this->set('acl_error_aro', true);
        }
        
        $this->set('role_id', $role_id);
        $this->_set_aco_variables();
        
        if($this->request->is('ajax'))
        {
            $this->render('ajax_role_granted');
        }
        else
        {
            $this->_return_to_referer();
        }
	}
	function admin_deny_role_permission($role_id)
	{
	    $role =& $this->{Configure :: read('acl.aro.role.model')};
        
        $role->id = $role_id;
        
        $aco_path = $this->_get_passed_aco_path();
        
        $aro_node = $this->Acl->Aro->node($role);
        if(!empty($aro_node))
        {
            if(!$this->AclManager->save_permission($aro_node, $aco_path, 'deny'))
            {
                $this->set('acl_error', true);
            }
        }
        else
        {
        	$this->set('acl_error', true);
        }
        
        $this->set('role_id', $role_id);
        $this->_set_aco_variables();
        
        if($this->request->is('ajax'))
        {
            $this->render('ajax_role_denied');
        }
        else
        {
            $this->_return_to_referer();
        }
	}

	function admin_get_member_controller_permission($member_id)
	{
        $member =& $this->{Configure :: read('acl.aro.member.model')};

	    $member_data = $member->read(null, $member_id);

        $aro_node = $this->Acl->Aro->node($member_data);
        if(!empty($aro_node))
        {
	        $plugin_name        = isset($this->params['named']['plugin']) ? $this->params['named']['plugin'] : '';
	        $controller_name    = $this->params['named']['controller'];
	        $controller_actions = $this->AclReflector->get_controller_actions($controller_name);

	        $member_controller_permissions = array();

	        foreach($controller_actions as $action_name)
	        {
	        	$aco_path  = $plugin_name;
		        $aco_path .= empty($aco_path) ? $controller_name : '/' . $controller_name;
		        $aco_path .= '/' . $action_name;

		        $aco_node = $this->Acl->Aco->node('controllers/' . $aco_path);
        	    if(!empty($aco_node))
        	    {
        	        $authorized = $this->Acl->check($member_data, 'controllers/' . $aco_path);
        	        $member_controller_permissions[$action_name] = $authorized;
        	    }
        	    else
        	    {
        	        $member_controller_permissions[$action_name] = -1;
        	    }
	        }
	    }
		else
        {
        	//$this->set('acl_error', true);
            //$this->set('acl_error_aro', true);
        }

		if($this->request->is('ajax'))
        {
        	Configure::write('debug', 0); //-> to disable printing of generation time preventing correct JSON parsing
        	echo json_encode($member_controller_permissions);
        	$this->autoRender = false;
        }
        else
        {
            $this->_return_to_referer();
        }
	}
	function admin_grant_member_permission($member_id)
	{
	    $member =& $this->{Configure :: read('acl.aro.member.model')};
        
        $member->id = $member_id;

        $aco_path = $this->_get_passed_aco_path();
        
        /*
         * Check if the member exists in the ARO table
         */
        $aro_node = $this->Acl->Aro->node($member);
        if(!empty($aro_node))
        {
        	$aco_node = $this->Acl->Aco->node('controllers/' . $aco_path);
        	if(!empty($aco_node))
        	{
	            if(!$this->AclManager->save_permission($aro_node, $aco_path, 'grant'))
	            {
	                $this->set('acl_error', true);
	            }
        	}
        	else
        	{
        		$this->set('acl_error', true);
            	$this->set('acl_error_aco', true);
        	}
        }
        else
        {
            $this->set('acl_error', true);
            $this->set('acl_error_aro', true);
        }
        
        $this->set('member_id', $member_id);
        $this->_set_aco_variables();
        
        if($this->request->is('ajax'))
        {
            $this->render('ajax_member_granted');
        }
        else
        {
            $this->_return_to_referer();
        }
	}
	function admin_deny_member_permission($member_id)
	{
	    $member =& $this->{Configure :: read('acl.aro.member.model')};
        
        $member->id = $member_id;

        $aco_path = $this->_get_passed_aco_path();
        
        /*
         * Check if the member exists in the ARO table
         */
        $aro_node = $this->Acl->Aro->node($member);
        if(!empty($aro_node))
        {
        	$aco_node = $this->Acl->Aco->node('controllers/' . $aco_path);
        	if(!empty($aco_node))
        	{
        	    if(!$this->AclManager->save_permission($aro_node, $aco_path, 'deny'))
	            {
	                $this->set('acl_error', true);
	            }
        	}
        	else
        	{
        		$this->set('acl_error', true);
            	$this->set('acl_error_aco', true);
        	}
        }
        else
        {
            $this->set('acl_error', true);
            $this->set('acl_error_aro', true);
        }
        
        $this->set('member_id', $member_id);
        $this->_set_aco_variables();
        
        if($this->request->is('ajax'))
        {
            $this->render('ajax_member_denied');
        }
        else
        {
            $this->_return_to_referer();
        }
	}
}
?>