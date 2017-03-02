<?php
class login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('session'));
		$this->load->database();

	}

	function logar()
	{
		$this->load->model('usuario');
		$login = $this->input->get_post('login');
		$senha = $this->input->get_post('senha');

		$resultado = $this->usuario->get_user($login, $senha);

		if ($resultado){
			$sessao = array('nome' => $resultado[0]->nome,
							'idusuario' => $resultado[0]->idusuario,
							'idpermissoes' => $resultado[0]->idpermissoes,
							'idarea' => $resultado[0]->idarea,
							'email' => $resultado[0]->email
							);
			$this->session->set_userdata($sessao);
			redirect('home/index');
			
		}else{
			redirect('login');
		}

		var_dump ($login, $senha, $resultado);

	}



	function logout()
	{
		// destroy session
		$data = array('login' => '', 'uname' => '', 'uid' => '');
		$this->session->unset_userdata($data);
		$this->session->sess_destroy();
		redirect('login');
	}

	function index()
	{
	//var_dump($this->session->userdata('nome'));
		$dadosusuario['nome']=$this->session->userdata('nome');

		$data['conteudo'] = $this->load->view('login', NULL, TRUE);
		$data['pagetitle'] = 'Login';

		$data['menu'] = $this->load->view('menu', $dadosusuario, TRUE);
		$this->load->view('template', $data);
	}
}