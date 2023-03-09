<?php

// функция возвращает PDO или строковую ошибку PDOException $e
	function f_pdoConnect() {         // Но лучше возвращать тип PDO
		static $db;                   // объявление $db
		if($db===null) {              // если небыло коннекта    
			try {                     // попытка подключения
				$db = new PDO('mysql:host=localhost;dbname=test_base','dmrDmitriy','asbk2tlgFF1t',[
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
				]); 
				$db->exec('SET NAMES UTF8');	 
				//echo "<br /> Успешное подключение <br />";  
			} catch (PDOException $e) {
				echo '<br /> Подключение не удалось: ' . $e->getMessage();
				return  $e->getMessage(); //->getMessage();
			}	 
		} 
	return $db;   
	}
	
	// функция возвращает записи из таблицы $tableName, где $colName = $val : f_strArrGetParent('groups','id_parent','1')
	function f_strArrGetStringsDb( $tableName,  $colName, $val):array {
		// добавить проверку выполнения 
		$db = f_pdoConnect();  
		$arrParent = [];
		$groups = 'groups';
		if($val == ""){
			$sql = "SELECT * FROM `$tableName` GROUP BY id";
		} else {
			$sql        = "SELECT * FROM `$tableName` WHERE $colName = $val";
		}
		$strResult  = $db->query($sql);
		$arrParent  = $strResult->fetchAll();	
	return($arrParent);  
	}

	

	
	
	


?>