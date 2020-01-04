<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
        
    }
    
    public function index(){
        $this->data['judul_browser'] = 'Beranda';
        $this->data['judul_utama'] = 'Beranda';
        $this->data['judul_sub'] = 'Menu Utama';
        
        
        $this->data['isi'] = $this->load->view('layout/home_list_page',$this->data,TRUE);
        $this->load->view('layout/home_page',$this->data);
    }
}