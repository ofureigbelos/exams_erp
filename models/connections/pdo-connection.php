<?php

	class Connection {

		static public function Connect(){

			$con = new PDO("mysql:host=localhost;dbname=iht_erp_system",
							"root",
							"");

			return $con;
		}


	}

?>