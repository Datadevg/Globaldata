<?php

	class ServiceModulesController extends Controller{

		public function __construct(){
			$this->model = new ServiceModulesModel;
		}

		public function getServiceSettings(){
			return $this->model->getServiceSettings();
		}

		public function saveServiceSettings(){
			extract($_POST);
			$this->model->setServiceSetting('sim_hosting_price', (isset($sim_hosting_price) ? $sim_hosting_price : '0'));
			$this->model->setServiceSetting('nin_verification_price', (isset($nin_verification_price) ? $nin_verification_price : '150'));
			$this->model->setServiceSetting('bvn_verification_price', (isset($bvn_verification_price) ? $bvn_verification_price : '150'));
			$this->model->setServiceSetting('sim_provider_endpoint', (isset($sim_provider_endpoint) ? $sim_provider_endpoint : ''));
			$this->model->setServiceSetting('sim_provider_api_key', (isset($sim_provider_api_key) ? $sim_provider_api_key : ''));
			$this->model->setServiceSetting('sim_hosting_enabled', (isset($sim_hosting_enabled) ? $sim_hosting_enabled : 'Off'));
			return $this->createNotification1('alert-success','Service settings updated successfully.');
		}

		public function saveSimProvider(){
			extract($_POST);
			$this->model->saveSimProvider($name,$code,$service_type,$endpoint,$api_key,$priority,$status,$config_json);
			return $this->createNotification1('alert-success','SIM provider added successfully.');
		}

		public function saveSimDevice(){
			extract($_POST);
			$this->model->saveSimDevice($provider_id,$name,$slot,$network,$status,$metadata);
			return $this->createNotification1('alert-success','SIM device added successfully.');
		}

		public function getSimProviders($service_type='all'){
			return $this->model->getSimProviders($service_type);
		}

		public function getSimDevices(){
			return $this->model->getSimDevices();
		}

		public function getSimTransactions(){
			return $this->model->getSimTransactions(100);
		}

		public function getNinTransactions(){
			return $this->model->getNinTransactions(100);
		}

		public function getBvnTransactions(){
			return $this->model->getBvnTransactions(100);
		}

	}

?>