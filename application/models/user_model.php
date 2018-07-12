<?php

Class User_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function cek_user_login($username, $password)
	{
        $query = $this->db->query("SELECT * FROM tb_peserta WHERE username='$username' AND password='$password'");
        return $query->row_array();
	}

	public function insert_upload($id_peserta, $nama_file, $soal)
	{
		$query = $this->db->query("INSERT INTO tb_upload (id_peserta, nama_file, waktu, soal) VALUES ($id_peserta, '$nama_file', now(), $soal)");
	}

	public function view()
	{
		$query = $this->db->query("SELECT tb_peserta.no_peserta, tb_peserta.nama_peserta, tb_peserta.nama_sekolah, tb_upload.waktu, tb_upload.soal FROM tb_peserta INNER JOIN tb_upload ON tb_upload.id_peserta=tb_peserta.id_peserta ORDER BY tb_upload.id_upload DESC LIMIT 10");
		return $query->result();
	}

} 