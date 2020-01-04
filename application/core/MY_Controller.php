<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
    
    public $data = array();
    
    public function __construct(){
        parent::__construct();
        if ($this->session->userdata('login') == FALSE){
            redirect('login');   
        }else{
            if($this->session->userdata('level') == 'member'){
                redirect('login');
            }
            $this->data['u_name'] = $this->session->userdata('u_name');
            $this->data['level'] = $this->session->userdata('level');
            
            $this->data['isi'] = '';
			$this->data['judul_browser'] = '';
			$this->data['judul_utama'] = '';
			$this->data['judul_sub'] = '';
			$this->data['link_aktif'] = '';
		    
            $this->data['css_files'] = array();
            $this->data['js_files'] = array();
            $this->data['js_files2'] = array();
            
            $notif['notif_pengajuan'] = 0;
            $this->data['notif_view'] = $this->load->view('layout/notifikasi_page',$notif,true);  
        }
    }
}