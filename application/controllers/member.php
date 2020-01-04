<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller{
    
    public $data = array ('pesan' => '');
    
    public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Member_m','member',TRUE);
    }
    
    public function _cek_login(){
        if($this->session->userdata('login') == FALSE){
            redirect('member');
        }
    }
    
    public function index(){
        if($this->session->userdata('login') == TRUE && $this->session->userdata('level') == 'member'){
            redirect('member/view');
        }else{
            if($this->member->validasi()){
                if($this->member->cek_user()){
                    redirect('member/view');
                }else{
                    $this->data['pesan'] = "Username atau Password salah";
                }
            }else{
                //Validasi Gagal
            }
        $this->data['jenis'] = 'member';
        $this->load->view('layout/login_page',$this->data);
        }
    }
}