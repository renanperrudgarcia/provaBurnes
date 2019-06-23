<?php 
 /**
  * 
  */
 class Media
 {
 	
 	private   $peso;
 	private $altura;
 	private   $imc;
 
 	public function __construct(){
 		$this->peso=0;
 		$this->altura=0;
 		$this->imc=0;
 	}

 	public function getPeso(){
 		return $this->peso;
 	}
 	public function setPeso($peso){
 		$this->peso = $peso;
 	}
 	public function getAltura(){
 		return $this->altura;
 	}
 	public function setAltura($altura){
 		$this->altura = $altura;
 	}
 	public function getImc(){
 		return $this->imc;
 	}
 	public function setImc($imc){
 		$this->imc = $imc;
 	}
 	public function Calculo ($peso,$altura){
 		$this->imc($peso/($altura*$altura));
 	}
 }