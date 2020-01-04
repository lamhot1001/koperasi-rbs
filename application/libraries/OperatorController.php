<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class OperatorController extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'operator'){
            $this->data['akses'] = TRUE;
        }else{
            $this->data['akses'] = FALSE;
//            redirect('home/no_akses');
        }
    }
}