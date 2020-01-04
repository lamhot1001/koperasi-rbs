<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Member_m extends CI_Model{
    
    public function validasi(){
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
        $this->form_validation->set_rules($form_rules);
        
        if($this->form_validation->run()){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    public function cek_user(){
        $u_name = $this->input->post('u_name');
		$pass_word = sha1('rbs' . $this->input->post('pass_word'));

		$this->db->where('identitas', $u_name);
		$this->db->where('pass_word', $pass_word);
		$this->db->where('aktif', 'Y');
		$this->db->limit(1);
		$query = $this->db->get('tbl_anggota');
		if ($query->num_rows() == 1) {
			$row = $query->row();
			//$level = $row->level;
			$data = array(
				'login'		=> TRUE,
				'u_name' 	=> $row->id, 
				'level'		=> 'member'
				);
			// simpan data session jika login benar
			$this->session->set_userdata($data);
			return TRUE;
		} else {
			return FALSE;
		}
    }
}