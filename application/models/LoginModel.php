<?php
/**
 * Description of User_igrs
 *
 * @author UNJ_Ilkom2014
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {


    function __construct()
    {
        parent::__construct();
    }

    function login($email,$pass){
        
      
        $this->db->join('ig_role','id = role');
        $this->db->where('email',$email);
        $this->db->where('password',md5($pass));
        $this->db->limit(1);
        $admin = $this->db->get('ig_userigrs');
        $this->db->join('ig_role','id = role');
        $this->db->where('email',$email);
        $this->db->where('password',md5($pass));
        $this->db->limit(1);
        $pengembang = $this->db->get('ig_pengembang');
        if($admin -> num_rows() == 1){
            return $admin->result();
        }else if($pengembang ->num_rows() == 1){
            return $pengembang->result();
        }else{
            return false;
        }
    }
}
?>