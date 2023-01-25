<?php

	define('INCLUDE_PATH','/mystore/');
	define('INCLUDE_ADMIN_PATH','/mystore/admin');
	
	$autoload = function ($class){
		if(file_exists($class.'.php')){
			include($class.'.php');
		}else{
			die('Não conseguimos chamar a classe: '.$class);
		}
	};

	spl_autoload_register($autoload);

	$application = new Application();
	$application->run();

?>