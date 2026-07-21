<?php

	class ServiceModulesModel extends ApiModel{

		public function __construct(){
			parent::__construct();
			self::applyDatabaseMigrations($this->connect());
		}

		public static function applyDatabaseMigrations($dbh=null){
			if(!$dbh){
				$pdo = new PDO("mysql:host=".Model::$host.";dbname=".Model::$dbName,Model::$username,Model::$password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$dbh=$pdo;
			}

			$dbh->exec("CREATE TABLE IF NOT EXISTS service_module_migrations (
				version VARCHAR(64) PRIMARY KEY,
				applied_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
				notes TEXT
			) ENGINE=InnoDB");

			$version='20260721_service_modules';
			$check=$dbh->prepare("SELECT version FROM service_module_migrations WHERE version=:version");
			$check->bindParam(':version',$version,PDO::PARAM_STR);
			$check->execute();
			if($check->fetchColumn()) return true;

			$queries=array(
				"CREATE TABLE IF NOT EXISTS sim_hosting_providers (
					id INT AUTO_INCREMENT PRIMARY KEY,
					name VARCHAR(100) NOT NULL,
					code VARCHAR(100) NOT NULL,
					service_type VARCHAR(30) NOT NULL DEFAULT 'sim',
					endpoint TEXT,
					api_key VARCHAR(255) DEFAULT '',
					priority INT DEFAULT 1,
					status VARCHAR(20) DEFAULT 'On',
					config_json TEXT,
					created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
					updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
				) ENGINE=InnoDB",
				"CREATE TABLE IF NOT EXISTS sim_hosting_devices (
					id INT AUTO_INCREMENT PRIMARY KEY,
					provider_id INT DEFAULT 0,
					name VARCHAR(100) NOT NULL,
					slot VARCHAR(50) DEFAULT 'auto',
					network VARCHAR(50) DEFAULT 'MTN',
					status VARCHAR(20) DEFAULT 'Active',
					metadata TEXT,
					created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
					updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
				) ENGINE=InnoDB",
				"CREATE TABLE IF NOT EXISTS sim_hosting_transactions (
					id INT AUTO_INCREMENT PRIMARY KEY,
					sId INT DEFAULT 0,
					transref VARCHAR(100) NOT NULL,
					provider_id INT DEFAULT 0,
					provider_name VARCHAR(150) DEFAULT '',
					service_type VARCHAR(30) DEFAULT 'sim',
					phone VARCHAR(20) DEFAULT '',
					network VARCHAR(50) DEFAULT '',
					amount DECIMAL(10,2) DEFAULT 0.00,
					status VARCHAR(30) DEFAULT 'processing',
					response_code VARCHAR(50) DEFAULT '',
					response_msg TEXT,
					retry_count INT DEFAULT 0,
					payload TEXT,
					created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
					updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
				) ENGINE=InnoDB",
				"CREATE TABLE IF NOT EXISTS sim_hosting_logs (
					id INT AUTO_INCREMENT PRIMARY KEY,
					transref VARCHAR(100) NOT NULL,
					log_type VARCHAR(50) DEFAULT 'info',
					message TEXT,
					payload TEXT,
					created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
				) ENGINE=InnoDB",
				"CREATE TABLE IF NOT EXISTS sim_hosting_settings (
					id INT AUTO_INCREMENT PRIMARY KEY,
					name VARCHAR(100) NOT NULL UNIQUE,
					value TEXT,
					created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
					updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
				) ENGINE=InnoDB",
				"CREATE TABLE IF NOT EXISTS nin_verification_transactions (
					id INT AUTO_INCREMENT PRIMARY KEY,
					sId INT DEFAULT 0,
					transref VARCHAR(100) NOT NULL,
					verification_type VARCHAR(50) DEFAULT 'number',
					value_text TEXT,
					provider_name VARCHAR(150) DEFAULT '',
					amount DECIMAL(10,2) DEFAULT 0.00,
					status VARCHAR(30) DEFAULT 'processing',
					response_msg TEXT,
					created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
					updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
				) ENGINE=InnoDB",
				"CREATE TABLE IF NOT EXISTS bvn_verification_transactions (
					id INT AUTO_INCREMENT PRIMARY KEY,
					sId INT DEFAULT 0,
					transref VARCHAR(100) NOT NULL,
					bvn_number VARCHAR(20) DEFAULT '',
					provider_name VARCHAR(150) DEFAULT '',
					amount DECIMAL(10,2) DEFAULT 0.00,
					status VARCHAR(30) DEFAULT 'processing',
					response_msg TEXT,
					created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
					updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
				) ENGINE=InnoDB"
			);

			foreach($queries as $sql){
				try{ $dbh->exec($sql); } catch(PDOException $e){ if(stripos($e->getMessage(),'already exists') !== false) continue; throw $e; }
			}

			self::ensureColumn($dbh,'sim_hosting_transactions','provider_id','INT DEFAULT 0');
			self::ensureColumn($dbh,'sim_hosting_transactions','provider_name','VARCHAR(150) DEFAULT ""');
			self::ensureColumn($dbh,'sim_hosting_transactions','service_type','VARCHAR(30) DEFAULT "sim"');
			self::ensureColumn($dbh,'sim_hosting_transactions','phone','VARCHAR(20) DEFAULT ""');
			self::ensureColumn($dbh,'sim_hosting_transactions','network','VARCHAR(50) DEFAULT ""');
			self::ensureColumn($dbh,'sim_hosting_transactions','amount','DECIMAL(10,2) DEFAULT 0.00');
			self::ensureColumn($dbh,'sim_hosting_transactions','status','VARCHAR(30) DEFAULT "processing"');
			self::ensureColumn($dbh,'sim_hosting_transactions','response_code','VARCHAR(50) DEFAULT ""');
			self::ensureColumn($dbh,'sim_hosting_transactions','response_msg','TEXT');
			self::ensureColumn($dbh,'sim_hosting_transactions','retry_count','INT DEFAULT 0');
			self::ensureColumn($dbh,'sim_hosting_transactions','payload','TEXT');
			self::ensureColumn($dbh,'nin_verification_transactions','verification_type','VARCHAR(50) DEFAULT "number"');
			self::ensureColumn($dbh,'nin_verification_transactions','value_text','TEXT');
			self::ensureColumn($dbh,'nin_verification_transactions','provider_name','VARCHAR(150) DEFAULT ""');
			self::ensureColumn($dbh,'nin_verification_transactions','amount','DECIMAL(10,2) DEFAULT 0.00');
			self::ensureColumn($dbh,'nin_verification_transactions','status','VARCHAR(30) DEFAULT "processing"');
			self::ensureColumn($dbh,'nin_verification_transactions','response_msg','TEXT');
			self::ensureColumn($dbh,'bvn_verification_transactions','bvn_number','VARCHAR(20) DEFAULT ""');
			self::ensureColumn($dbh,'bvn_verification_transactions','provider_name','VARCHAR(150) DEFAULT ""');
			self::ensureColumn($dbh,'bvn_verification_transactions','amount','DECIMAL(10,2) DEFAULT 0.00');
			self::ensureColumn($dbh,'bvn_verification_transactions','status','VARCHAR(30) DEFAULT "processing"');
			self::ensureColumn($dbh,'bvn_verification_transactions','response_msg','TEXT');

			$insert=$dbh->prepare("INSERT INTO service_module_migrations(version,notes) VALUES(:version,:notes)");
			$insert->bindParam(':version',$version,PDO::PARAM_STR);
			$insert->bindValue(':notes','Created service module tables and guarded columns');
			$insert->execute();
			return true;
		}

		private static function ensureColumn($dbh,$table,$column,$definition){
			$check=$dbh->prepare("SHOW COLUMNS FROM `{$table}` LIKE :column");
			$check->bindParam(':column',$column,PDO::PARAM_STR);
			$check->execute();
			if($check->rowCount() > 0) return;
			$dbh->exec("ALTER TABLE `{$table}` ADD COLUMN `{$column}` {$definition}");
		}

		public function setServiceSetting($name,$value){
			$dbh=$this->connect();
			$check=$dbh->prepare("SELECT id FROM sim_hosting_settings WHERE name=:name");
			$check->bindParam(':name',$name,PDO::PARAM_STR);
			$check->execute();
			if($check->rowCount() > 0){
				$sql="UPDATE sim_hosting_settings SET value=:value WHERE name=:name";
			}
			else{
				$sql="INSERT INTO sim_hosting_settings(name,value) VALUES(:name,:value)";
			}
			$query=$dbh->prepare($sql);
			$query->bindParam(':name',$name,PDO::PARAM_STR);
			$query->bindParam(':value',$value,PDO::PARAM_STR);
			$query->execute();
			return 0;
		}

		public function getServiceSettings(){
			$dbh=$this->connect();
			$sql="SELECT * FROM sim_hosting_settings ORDER BY name ASC";
			$query=$dbh->prepare($sql);
			$query->execute();
			return $query->fetchAll(PDO::FETCH_OBJ);
		}

		public function getServiceSetting($name,$default=''){
			$dbh=$this->connect();
			$sql="SELECT value FROM sim_hosting_settings WHERE name=:name";
			$query=$dbh->prepare($sql);
			$query->bindParam(':name',$name,PDO::PARAM_STR);
			$query->execute();
			$result=$query->fetch(PDO::FETCH_OBJ);
			if(is_object($result) && isset($result->value)) return $result->value;
			return $default;
		}

		public function isSimHostingEnabled(){
			return $this->getServiceSetting('sim_hosting_enabled','Off') == 'On';
		}

		public function getActiveSimProviders($service_type='sim'){
			$dbh=$this->connect();
			$sql="SELECT * FROM sim_hosting_providers WHERE service_type=:service_type AND status='On' ORDER BY priority ASC, id ASC";
			$query=$dbh->prepare($sql);
			$query->bindParam(':service_type',$service_type,PDO::PARAM_STR);
			$query->execute();
			return $query->fetchAll(PDO::FETCH_OBJ);
		}

		public function routeDataPurchase($body,$networkDetails,$datagroup,$actualPlanId){
			if(!$this->isSimHostingEnabled()) return array("status"=>"skip","message"=>"SIM hosting routing is disabled.");
			$providers=$this->getActiveSimProviders('sim');
			if(empty($providers)) return array("status"=>"skip","message"=>"No active SIM hosting providers are configured.");

			$payload=array(
				"service" => "data",
				"network" => isset($networkDetails["network"]) ? $networkDetails["network"] : "",
				"network_id" => isset($networkDetails["nId"]) ? $networkDetails["nId"] : "",
				"data_group" => $datagroup,
				"plan_id" => $actualPlanId,
				"phone" => isset($body->phone) ? $body->phone : "",
				"ported_number" => isset($body->ported_number) ? $body->ported_number : (isset($body->Ported_number) ? $body->Ported_number : "false"),
				"ref" => isset($body->ref) ? $body->ref : time()
			);

			foreach($providers as $provider){
				$response=$this->dispatchProviderRequestPayload($provider,$payload);
				if($response["status"] == "success" || $response["status"] == "processing"){
					return array("status"=>$response["status"],"message"=>$response["message"],"provider"=>$provider->name,"response"=>$response);
				}
			}
			return array("status"=>"fail","message"=>"SIM hosting routing failed for all configured providers.");
		}

		public function saveSimProvider($name,$code,$service_type,$endpoint,$api_key,$priority,$status,$config_json){
			$dbh=$this->connect();
			$sql="INSERT INTO sim_hosting_providers(name,code,service_type,endpoint,api_key,priority,status,config_json) VALUES(:name,:code,:service_type,:endpoint,:api_key,:priority,:status,:config_json)";
			$query=$dbh->prepare($sql);
			$query->bindParam(':name',$name,PDO::PARAM_STR);
			$query->bindParam(':code',$code,PDO::PARAM_STR);
			$query->bindParam(':service_type',$service_type,PDO::PARAM_STR);
			$query->bindParam(':endpoint',$endpoint,PDO::PARAM_STR);
			$query->bindParam(':api_key',$api_key,PDO::PARAM_STR);
			$query->bindParam(':priority',$priority,PDO::PARAM_INT);
			$query->bindParam(':status',$status,PDO::PARAM_STR);
			$query->bindParam(':config_json',$config_json,PDO::PARAM_STR);
			$query->execute();
			return 0;
		}

		public function getSimProviders($service_type='all'){
			$dbh=$this->connect();
			$sql="SELECT * FROM sim_hosting_providers";
			if($service_type <> 'all'){$sql="SELECT * FROM sim_hosting_providers WHERE service_type=:service_type";}
			$query=$dbh->prepare($sql);
			if($service_type <> 'all'){$query->bindParam(':service_type',$service_type,PDO::PARAM_STR);} 
			$query->execute();
			return $query->fetchAll(PDO::FETCH_OBJ);
		}

		public function saveSimDevice($provider_id,$name,$slot,$network,$status,$metadata){
			$dbh=$this->connect();
			$sql="INSERT INTO sim_hosting_devices(provider_id,name,slot,network,status,metadata) VALUES(:provider_id,:name,:slot,:network,:status,:metadata)";
			$query=$dbh->prepare($sql);
			$query->bindParam(':provider_id',$provider_id,PDO::PARAM_INT);
			$query->bindParam(':name',$name,PDO::PARAM_STR);
			$query->bindParam(':slot',$slot,PDO::PARAM_STR);
			$query->bindParam(':network',$network,PDO::PARAM_STR);
			$query->bindParam(':status',$status,PDO::PARAM_STR);
			$query->bindParam(':metadata',$metadata,PDO::PARAM_STR);
			$query->execute();
			return 0;
		}

		public function getSimDevices(){
			$dbh=$this->connect();
			$sql="SELECT * FROM sim_hosting_devices ORDER BY id DESC";
			$query=$dbh->prepare($sql);
			$query->execute();
			return $query->fetchAll(PDO::FETCH_OBJ);
		}

		public function getSimTransactions($limit=100,$user_id=0){
			$dbh=$this->connect();
			$sql="SELECT * FROM sim_hosting_transactions";
			if($user_id > 0){$sql="SELECT * FROM sim_hosting_transactions WHERE sId=:user_id";}
			$sql.=" ORDER BY id DESC LIMIT $limit";
			$query=$dbh->prepare($sql);
			if($user_id > 0){$query->bindParam(':user_id',$user_id,PDO::PARAM_INT);} 
			$query->execute();
			return $query->fetchAll(PDO::FETCH_OBJ);
		}

		public function getNinTransactions($limit=100,$user_id=0){
			$dbh=$this->connect();
			$sql="SELECT * FROM nin_verification_transactions";
			if($user_id > 0){$sql="SELECT * FROM nin_verification_transactions WHERE sId=:user_id";}
			$sql.=" ORDER BY id DESC LIMIT $limit";
			$query=$dbh->prepare($sql);
			if($user_id > 0){$query->bindParam(':user_id',$user_id,PDO::PARAM_INT);} 
			$query->execute();
			return $query->fetchAll(PDO::FETCH_OBJ);
		}

		public function getBvnTransactions($limit=100,$user_id=0){
			$dbh=$this->connect();
			$sql="SELECT * FROM bvn_verification_transactions";
			if($user_id > 0){$sql="SELECT * FROM bvn_verification_transactions WHERE sId=:user_id";}
			$sql.=" ORDER BY id DESC LIMIT $limit";
			$query=$dbh->prepare($sql);
			if($user_id > 0){$query->bindParam(':user_id',$user_id,PDO::PARAM_INT);} 
			$query->execute();
			return $query->fetchAll(PDO::FETCH_OBJ);
		}

		public function purchaseSimHosting($user_id,$amount,$phone,$network,$slot,$transref){
			$dbh=$this->connect();
			$amount=(float) $amount;
			$phone=strip_tags($phone);
			$network=strip_tags($network);
			$slot=strip_tags($slot);
			$checkUser=$dbh->prepare("SELECT sWallet,sEmail FROM subscribers WHERE sId=:id");
			$checkUser->bindParam(':id',$user_id,PDO::PARAM_INT);
			$checkUser->execute();
			$userData=$checkUser->fetch(PDO::FETCH_OBJ);
			if(!is_object($userData)) return array("status"=>"fail","message"=>"Unable to locate user profile.");
			if($userData->sWallet < $amount) return array("status"=>"fail","message"=>"Insufficient wallet balance.");
			$providers=$this->getSimProviders('sim');
			$providerName='System Queue';
			$response=array("status"=>"pending","message"=>"Queued for processing. Provider settings will be applied once configured.");
			$selectedProvider=0;
			foreach($providers as $provider){
				if($provider->status == 'On'){
					$selectedProvider = $provider->id;
					$providerName = $provider->name;
					$response=$this->dispatchProviderRequest($provider,$amount,$phone,$network,$slot);
					if($response["status"] == "success") break;
				}
			}
			$payload=json_encode(array("phone"=>$phone,"network"=>$network,"slot"=>$slot,"amount"=>$amount));
			$sql="INSERT INTO sim_hosting_transactions(sId,transref,provider_id,provider_name,service_type,phone,network,amount,status,response_code,response_msg,payload,retry_count) VALUES(:sId,:transref,:provider_id,:provider_name,:service_type,:phone,:network,:amount,:status,:response_code,:response_msg,:payload,:retry_count)";
			$query=$dbh->prepare($sql);
			$query->bindParam(':sId',$user_id,PDO::PARAM_INT);
			$query->bindParam(':transref',$transref,PDO::PARAM_STR);
			$query->bindParam(':provider_id',$selectedProvider,PDO::PARAM_INT);
			$query->bindParam(':provider_name',$providerName,PDO::PARAM_STR);
			$query->bindParam(':service_type',$serviceType='sim',PDO::PARAM_STR);
			$query->bindParam(':phone',$phone,PDO::PARAM_STR);
			$query->bindParam(':network',$network,PDO::PARAM_STR);
			$query->bindParam(':amount',$amount,PDO::PARAM_STR);
			$query->bindParam(':status',$response['status'],PDO::PARAM_STR);
			$query->bindParam(':response_code',$responseCode='queued',PDO::PARAM_STR);
			$query->bindParam(':response_msg',$response['message'],PDO::PARAM_STR);
			$query->bindParam(':payload',$payload,PDO::PARAM_STR);
			$query->bindParam(':retry_count',$retryCount=0,PDO::PARAM_INT);
			$query->execute();
			$oldbalance=(float) $userData->sWallet;
			$newbalance=$oldbalance - $amount;
			$this->recordTransaction($user_id,'SIM Hosting','SIM Hosting purchase for '.$phone.' on '.$network.'. '.$response['message'],$transref,$amount,$oldbalance,$newbalance,0);
			$this->logTransaction($transref,'info','SIM Hosting request queued for '.$phone, $payload);
			return array("status"=>"success","message"=>"SIM hosting purchase created successfully. Transaction reference: {$transref}","ref"=>$transref);
		}

		public function createNinVerification($user_id,$verification_type,$value,$transref){
			$dbh=$this->connect();
			$verification_type=strip_tags($verification_type);
			$value=strip_tags($value);
			$amount=(float) $this->getServiceSetting('nin_verification_price','150');
			$checkUser=$dbh->prepare("SELECT sWallet FROM subscribers WHERE sId=:id");
			$checkUser->bindParam(':id',$user_id,PDO::PARAM_INT);
			$checkUser->execute();
			$userData=$checkUser->fetch(PDO::FETCH_OBJ);
			if(!is_object($userData)) return array("status"=>"fail","message"=>"Unable to locate user profile.");
			if($userData->sWallet < $amount) return array("status"=>"fail","message"=>"Insufficient wallet balance.");
			$providers=$this->getSimProviders('nin');
			$providerName='System Queue';
			$response=array("status"=>"pending","message"=>"Queued for processing. Configure a provider endpoint to complete live verification.");
			foreach($providers as $provider){
				if($provider->status == 'On'){
					$providerName = $provider->name;
					$response=$this->dispatchProviderRequest($provider,$amount,$value,$verification_type,'nin');
					if($response["status"] == "success") break;
				}
			}
			$sql="INSERT INTO nin_verification_transactions(sId,transref,verification_type,value_text,provider_name,amount,status,response_msg) VALUES(:sId,:transref,:verification_type,:value_text,:provider_name,:amount,:status,:response_msg)";
			$query=$dbh->prepare($sql);
			$query->bindParam(':sId',$user_id,PDO::PARAM_INT);
			$query->bindParam(':transref',$transref,PDO::PARAM_STR);
			$query->bindParam(':verification_type',$verification_type,PDO::PARAM_STR);
			$query->bindParam(':value_text',$value,PDO::PARAM_STR);
			$query->bindParam(':provider_name',$providerName,PDO::PARAM_STR);
			$query->bindParam(':amount',$amount,PDO::PARAM_STR);
			$query->bindParam(':status',$response['status'],PDO::PARAM_STR);
			$query->bindParam(':response_msg',$response['message'],PDO::PARAM_STR);
			$query->execute();
			$oldbalance=(float) $userData->sWallet;
			$newbalance=$oldbalance - $amount;
			$this->recordTransaction($user_id,'NIN Verification','NIN verification request for '.$verification_type.' has been queued. '.$response['message'],$transref,$amount,$oldbalance,$newbalance,0);
			$this->logTransaction($transref,'info','NIN verification queued for '.$verification_type, $value);
			return array("status"=>"success","message"=>"NIN verification request created successfully.","ref"=>$transref);
		}

		public function createBvnVerification($user_id,$bvn_number,$transref){
			$dbh=$this->connect();
			$bvn_number=strip_tags($bvn_number);
			$amount=(float) $this->getServiceSetting('bvn_verification_price','150');
			$checkUser=$dbh->prepare("SELECT sWallet FROM subscribers WHERE sId=:id");
			$checkUser->bindParam(':id',$user_id,PDO::PARAM_INT);
			$checkUser->execute();
			$userData=$checkUser->fetch(PDO::FETCH_OBJ);
			if(!is_object($userData)) return array("status"=>"fail","message"=>"Unable to locate user profile.");
			if($userData->sWallet < $amount) return array("status"=>"fail","message"=>"Insufficient wallet balance.");
			$providers=$this->getSimProviders('bvn');
			$providerName='System Queue';
			$response=array("status"=>"pending","message"=>"Queued for processing. Configure a provider endpoint to complete live verification.");
			foreach($providers as $provider){
				if($provider->status == 'On'){
					$providerName = $provider->name;
					$response=$this->dispatchProviderRequest($provider,$amount,$bvn_number,'bvn','bvn');
					if($response["status"] == "success") break;
				}
			}
			$sql="INSERT INTO bvn_verification_transactions(sId,transref,bvn_number,provider_name,amount,status,response_msg) VALUES(:sId,:transref,:bvn_number,:provider_name,:amount,:status,:response_msg)";
			$query=$dbh->prepare($sql);
			$query->bindParam(':sId',$user_id,PDO::PARAM_INT);
			$query->bindParam(':transref',$transref,PDO::PARAM_STR);
			$query->bindParam(':bvn_number',$bvn_number,PDO::PARAM_STR);
			$query->bindParam(':provider_name',$providerName,PDO::PARAM_STR);
			$query->bindParam(':amount',$amount,PDO::PARAM_STR);
			$query->bindParam(':status',$response['status'],PDO::PARAM_STR);
			$query->bindParam(':response_msg',$response['message'],PDO::PARAM_STR);
			$query->execute();
			$oldbalance=(float) $userData->sWallet;
			$newbalance=$oldbalance - $amount;
			$this->recordTransaction($user_id,'BVN Verification','BVN verification request for '.$bvn_number.' has been queued. '.$response['message'],$transref,$amount,$oldbalance,$newbalance,0);
			$this->logTransaction($transref,'info','BVN verification queued for '.$bvn_number, $bvn_number);
			return array("status"=>"success","message"=>"BVN verification request created successfully.","ref"=>$transref);
		}

		public function logTransaction($transref,$log_type,$message,$payload=''){
			$dbh=$this->connect();
			$sql="INSERT INTO sim_hosting_logs(transref,log_type,message,payload) VALUES(:transref,:log_type,:message,:payload)";
			$query=$dbh->prepare($sql);
			$query->bindParam(':transref',$transref,PDO::PARAM_STR);
			$query->bindParam(':log_type',$log_type,PDO::PARAM_STR);
			$query->bindParam(':message',$message,PDO::PARAM_STR);
			$query->bindParam(':payload',$payload,PDO::PARAM_STR);
			$query->execute();
			return 0;
		}

		public function getLogs($transref){
			$dbh=$this->connect();
			$sql="SELECT * FROM sim_hosting_logs WHERE transref=:transref ORDER BY id DESC";
			$query=$dbh->prepare($sql);
			$query->bindParam(':transref',$transref,PDO::PARAM_STR);
			$query->execute();
			return $query->fetchAll(PDO::FETCH_OBJ);
		}

		private function dispatchProviderRequest($provider,$amount,$value='',$network='',$slot=''){
			$payload=array(
				"amount"=>$amount,
				"value"=>$value,
				"network"=>$network,
				"slot"=>$slot,
				"service"=>$provider->service_type
			);
			return $this->dispatchProviderRequestPayload($provider,$payload);
		}

		private function dispatchProviderRequestPayload($provider,$payload){
			if(empty($provider->endpoint)) return array("status"=>"pending","message"=>"No endpoint configured for provider.");
			if(!function_exists('curl_init')) return array("status"=>"pending","message"=>"cURL is not available on this server.");
			$headers=array("Content-Type: application/json");
			if(!empty($provider->api_key)){$headers[]='Authorization: Bearer '.$provider->api_key;}
			$ch=curl_init();
			curl_setopt($ch,CURLOPT_URL,$provider->endpoint);
			curl_setopt($ch,CURLOPT_POST,1);
			curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($payload));
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
			curl_setopt($ch,CURLOPT_TIMEOUT,15);
			curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
			$result=curl_exec($ch);
			$httpCode=curl_getinfo($ch,CURLINFO_HTTP_CODE);
			curl_close($ch);
			if($result === false){return array("status"=>"pending","message"=>"Provider request timed out.");}
			$decoded=json_decode($result,true);
			if(!is_array($decoded)){$decoded=array("status"=>"pending","message"=>$result);}
			$status=(isset($decoded['status']) && $decoded['status']=='success') ? 'success' : ((isset($decoded['status']) && $decoded['status']=='processing') ? 'processing' : 'pending');
			return array("status"=>$status,"message"=>(isset($decoded['message']) ? $decoded['message'] : 'Provider response captured.'),"http_code"=>$httpCode,"response"=>$decoded);
		}

	}

?>