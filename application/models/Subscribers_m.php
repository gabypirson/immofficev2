<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribers_m extends MY_Model {

    var $_db = 'Subscribers';
    var $_name = 'subscribers_m';
 
    public function get($params) {
        $frequency = 'day';
        $active = 1;

        if(isset($params['frequency'])){
            $frequency = $params['frequency'];
        }

        if(isset($params['active'])){
            $active = $params['active'];
        }

    	$this->db->select(
    		$this->_db.".id,
    		users.login,
    		users.lang,
    		".$this->_db.".frequency,
    		".$this->_db.".search_price_min,
    		".$this->_db.".search_price_max,
    		".$this->_db.".search_provinces,
    		".$this->_db.".search_zipcodes,
    		".$this->_db.".search_lang,
    		".$this->_db.".search_sell,
    		".$this->_db.".search_date,
    		".$this->_db.".search_words
    	");
    	$this->db->join('users','users.id = '.$this->_db.'.user_id');
        $this->db->where('frequency',$frequency);
        $this->db->where('active',$active);
        return $this->db->get($this->_db)->result();
    }

}