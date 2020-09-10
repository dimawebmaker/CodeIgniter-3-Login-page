<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usr {

    public $ci = null;

    public function __construct()
    {
        if($this->ci == null) {
            $this->ci =& get_instance();
        }
    }

    public function login($login, $password, $remeber=null)
    {
//        $q = $this->ci->db->select('id')
//            ->where(array('login'=>$login, 'password'=>$this->pass_hash($password)))
//            ->limit(1)
//            ->get('users');
//
//        if($q->num_rows() > 0) {
//            $user = $q->row();
//            $this->ci->session->set_userdata(array(
//                'auth' => md5($password),
//            ));
//            return true;
//        }

        if($login == 'admin' && $password == 'password') {
            $this->ci->session->set_userdata([
                'auth' => md5($password),
            ]);
            return true;
        }

        return false;
    }

    public function logout()
    {
        $this->ci->session->sess_destroy();
        return true;
    }

    public function logged_in()
    {
        if($this->ci->session->userdata('auth') === 1) {
            return true;
        } else {
            return false;
        }
    }

    public function pass_hash($pass) {
        return hash('sha512', $pass.$this->ci->config->item('encryption_key'));
    }


}