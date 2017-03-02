<?php
class home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'html'));
		$this->load->library('session');
	}
	
	function index()
	{
		//var_dump($this->session->userdata('nome'));
		$dadosusuario['nome']=$this->session->userdata('nome');

		$data['conteudo'] = '';
		$data['pagetitle'] = 'homepage';

		$data['menu'] = $this->load->view('menu', $dadosusuario, TRUE);
		$this->load->view('template', $data);
	}
	
	function logout()
	{
		// destroy session
        $data = array('login' => '', 'uname' => '', 'uid' => '');
        $this->session->unset_userdata($data);
        $this->session->sess_destroy();
		redirect('home/index');
	}
}


