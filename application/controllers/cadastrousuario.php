<?php
class Cadastrousuario extends CI_Controller
{
	
public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library(array('session', 'form_validation'));
	}
	



	function index()
	{
		$dadosusuario['nome']='jose';
		
		$data['pagetitle'] = 'Cadastro Usuario';
		$data['menu'] = $this->load->view('menu', $dadosusuario, TRUE);
		$data['conteudo'] = $this->load->view('cadastrousuario', NULL, TRUE);
		$this->load->view('template', $data);
	}
	
}