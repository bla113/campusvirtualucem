<?php

class Conexion
{

	static public function conectar()
	{

		$link = new PDO(
			"mysql:host=backend.ucemapp.com;dbname=sistema_ucem",
			"ucemtest",
			"ZXwxcBCj6z4FM4zI"
		);

		$link->exec("set names utf8");

		return $link;
	}

	/*static public function conectar()
	{

		$link = new PDO(
			"mysql:host=localhost;dbname=sistema_ucem",
			"root",
			""
		);

		$link->exec("set names utf8");

		return $link;
	}*/
}


class ApiPadronElectoral
{

	static public function conectar()
	{

		$link =  new PDO(
			"mysql:host=backend.ucemapp.com;dbname=padron_electoral",
			"ucemtest",
			"ZXwxcBCj6z4FM4zI"
		);
		$link->exec("set names utf8");

		return $link;
	}
}
