<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users_m extends CI_Model {

    public $_db = 'users';
    public $_name = 'users_m';

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function get($params) {
      
    }


    function login($username, $password){
     
        return true;
    }


   
   
}