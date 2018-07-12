<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
        $this->load->model('user_model');
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function login()
	{
		$username = $this->input->post('username');
        $password = $this->input->post('password');

        $data = $this->user_model->cek_user_login($username, $password);
        if (empty($data)) {
             redirect('../index?login=error', 'refresh');
        } else {
        	 $this->session->set_userdata('id', $data['id_peserta']);
        	 $this->session->set_userdata('nama_peserta', $data['nama_peserta']);
             redirect('../upload', 'refresh');
        }
	}

	public function upload()
	{
		if(!empty($this->session->userdata('id')))
		{
			$this->load->view('upload');
		}
		else
		{
			redirect('../index', 'refresh');
		}
	}

	public function logout()
	{
		session_destroy();
		redirect('../index', 'refresh');
	}

	public function do_upload()
	{
		$id = $this->session->userdata('id');
		$soal = $this->input->post('soal');
		$config['upload_path']  = './up/'.$id;
		$config['allowed_types'] = '*';
		$config['max_size']	= 100000;
		$config['file_name'] = $soal;
		$config['overwrite'] = TRUE;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('data_upload'))
        {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('upload', $error);
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());

                $this->user_model->insert_upload($id, $data['upload_data']['file_name'], $soal);

                $this->load->view('upload', $data);
        }
	}

	public function view()
	{
		$data['upload'] = $this->user_model->view();
		$this->load->view('view', $data);
	}
}
	