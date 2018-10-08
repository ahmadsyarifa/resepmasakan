<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('m_user');
    }

	function index()
	{
		$this->load->view('admin/login');
	}

  	function proses() {
        $this->form_validation->set_rules('namauser', 'namauser', 'required|trim|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'required|trim|xss_clean');
		
        if ($this->form_validation->run() == FALSE) {
             $this->session->set_flashdata('result_login', '<br>Nama atau Password belum diisi.');
			 redirect();
        } else {
            $tgl_login=date("Y-m-d"); 
			$jam_login=date("H:i:s");
            $usr = $this->input->post('namauser');
            $psw = $this->input->post('password');
            $u = mysql_real_escape_string($usr);
            $p = md5(mysql_real_escape_string($psw));
            $cek = $this->m_user->cek($u, $p);
            if ($cek->num_rows() > 0) {
                //login berhasil, buat session
                foreach ($cek->result() as $qad) {
                    $sess_data['nama'] = $qad->nama_lengkap;
                    $sess_data['u_name'] = $qad->nama_user;
					$sess_data['pwd'] = $qad->password;
                    $sess_data['tgl_login'] = $tgl_login;
					$sess_data['jam_login'] = $jam_login;
                    $this->session->set_userdata($sess_data);
                }
                redirect('index/main_view');
            } else {
                $this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
	            redirect();
            }
        }
    }

    function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }

}