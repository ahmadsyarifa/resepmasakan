<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resep extends CI_Controller {

 function _construct(){
        parent::__construct();
        $this->load->model('m_data');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

 function index(){
 	$this->load->view('resep/header');
 	$this->load->view('resep/home');
 	$this->load->view('resep/footer');
 }

 //form tambah data resep
 function tambahResep(){
 	$this->load->view('Resep/header');
 	$this->load->view('resep/tambah_resep');
 	$this->load->view('resep/footer');
 }

 function inputKaryawan(){
 
        //proses validasi form
        $this->form_validation->set_rules('nama','Nama Resep','required');
        $this->form_validation->set_rules('Bahan','Bahan Bahan','required');
        $this->form_validation->set_rules('Cara Membuat','Cara membuat','required');
 
        //jika form tidak ada yang kosong jalankan perintah dibawah
        if($this->form_validation->run() != false){
            $config['upload_path'] = './gambar/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '100000';
            $config['max_width']  = '10240';
            $config['max_height']  = '7680';
            $new_name = time().$_FILES["foto"]['name'];
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
 
        if ( ! $this->upload->do_upload('foto'))
        {
            //jika upload foto error
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
            // $this->load->view('resep', $error);
        }
        else
        {
            //jika upload foto berhasil dilanjutkan proses form
            $nama = $this->input->post('nama');
            $Bahan = $this->input->post('Bahan');
            $Cara_Membuat = $this->input->post('Cara Membuat');
            $data = array('upload_data' => $this->upload->data());
            print_r($this->upload->data());
            $datafoto=$this->upload->data();
            $nm_file = $datafoto['orig_name'];
            $data = array(
                'nama' => $nama,
                'foto' => $nm_file,
                'Bahan' => $Bahan,
                'Cara Membuat' => $Cara_Membuat
                );
            $this->m_data->input_data($data,'resep');
            redirect('resep/tambahResep');
        }
    } else{
        $this->load->view('resep/header');
        $this->load->view('resep/tambahResep');
        $this->load->view('resep/footer');
    
}
	}