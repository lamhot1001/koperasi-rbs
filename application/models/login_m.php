<?php if ( ! defined ('BASEPATH')) exit('No direct script access allowed');

class Login_m extends CI_Model{
    
    public function load_form_rules(){
        $form_rules = array(
            array(
                'field' => 'u_name',
                'label' => 'username',
                'rules' => 'required'
                ),
            array(
                'field' => 'pass_word',
                'label' => 'password',
                'rules' => 'required'
                ),
            );
        return $form_rules;
    }
    
    public function validasi(){
        $form = $this->load_form_rules();
        $this->form_validation->set_rules($form);
        
        if($this->form_validation->run()){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    public function cek_user(){
        $u_name = $this->input->post('u_name');
        $pass_word = sha1('rbs' . $this->input->post('pass_word'));
        
        $query = $this->db->where('u_name', $u_name)
            ->where('pass_word',$pass_word)
            ->where('aktif','Y')
            ->limit(1)
            ->get('tbl_user');
        
        if($query->num_rows() == 1){
            $row = $query->row();
            $level = $row->level;
            $data = array(
                'login'     => TRUE,
                'u_name'    => $u_name,
                'level'     => $level
                );
            $this->session->set_userdata($data);
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    public function get_pengguna(){
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->order_by('id','ASC');
        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
        
    }
    
    public function edit_option($action,$id,$table){
        $this->db->where('id',$id);
        $this->db->update($table,$action);
        return;
    }
    
    public function logout(){
        $this->session->unset_userdata(array('u_name' => '','login' => FALSE));
        $this->session->sess_destroy();
    }
    
}