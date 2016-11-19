<?php
namespace application\controllers;

	class Dashboard extends \Controller{
	
		function __contruct(){
			//die('AQUI');
		}
		
	  public function index(){
	    $dashboard = new \application\models\dashboardModel();
	    $dashboard_lista = $dashboard->select();
	    $data['dashboard'] = $dashboard_lista;
	    $this->loadView('index', $data);
	  }   
	  
	}
?>





