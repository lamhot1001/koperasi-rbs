<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{
    
    public $data = array ('pesan' => '');
    
    public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Login_m','login',TRUE);
    }
    
    public function index(){
        
        if($this->session->userdata('login') == TRUE && $this->session->userdata('level') == 'admin' OR $this->session->userdata('level') == 'operator'){
            redirect('home');
        }else{
            if($this->login->validasi()){
                if($this->login->cek_user()){
                    redirect('home');
                }else{
                    $this->data['pesan'] = 'Username atau Password salah';                
                }
            }else{
                //Validasi Gagal
            }
        $this->data['jenis'] = 'admin';
        $this->load->view('layout/login_page',$this->data);
        }  
    }
    
    public function logout(){
        $this->login->logout();
        redirect('login');
    }
}