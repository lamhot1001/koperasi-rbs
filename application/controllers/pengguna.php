<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pengguna extends AdminController{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Login_m','login',TRUE);
    }
    
    public function index(){
        $this->data['judul_browser'] = 'Pengguna';
        $this->data['judul_utama'] = 'Data';
        $this->data['judul_sub'] = 'Pengguna';
        
        
        $this->data['pengguna'] = $this->login->get_pengguna();
        
        $this->data['isi'] = $this->load->view('master-data/pengguna_page',$this->data,TRUE);
        $this->load->view('layout/home_page',$this->data);
    }
    
    public function aktif_user($id){
        if($_POST){
            $data = array(
                'aktif' =>$_POST['aktif'],
            );
            $data = $this->security->xss_clean($data);
            
            $this->login->edit_option($data,$id,'tbl_user');
            
            $this->session->set_flashdata('msg','Active atau Inactive User Successfully');
            redirect(base_url('pengguna'));
        }
    }
}