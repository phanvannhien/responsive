<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class MUser extends MY_Model {

    function __construct() {
        parent::__construct();
        $this->table = DBPREFIX.'user';
        $this->tables['user_type'] = DBPREFIX.'user_type';
    }

    function update_field($table_name, $field_value_where, $field_where, $array_update) {
        $this->db->where($field_where, $field_value_where);
        return $this->db->update(DBPREFIX . $table_name, $array_update);
    }

    function getUserIDByEmail($user_email) {
        $this->db->where('user_email', $user_email);
        $query = $this->db->get(DBPREFIX . 'user');
        if ($query->num_rows() > 0) {
            $rows = $query->row();
            return $rows->user_id;
        }
        return '';
    }

    /*
     * Get item by id and fields get and table
     */

    function getinfoUser($table, $field_get, $fields_where, $field_return) {
        $this->db->where($fields_where, $field_get);
        $query = $this->db->get(DBPREFIX . $table);
        if ($query->num_rows() > 0) {
            $rows = $query->row();
            return $rows->$field_return;
        }
        return '';
    }

    function login($email, $password) {
        $arr_where = array(
            'user_email' => $email,
            'user_pass' => md5($password));
        $this->db->where($arr_where);
        $query = $this->db->get(DBPREFIX . 'user');
        if ($query->num_rows() > 0)
            return true;
        return false;
    }

    function change_pass($email) {
        $this->db->where('user_email', $email);
    }
    
    function getInfoByID($select,$table, $array_where, $arry_join = array()) {
        $this->db->where($array_where);
        $this->db->select($select);
        $this->db->from($table);
        foreach ($arry_join as $key => $value)
            $this->db->join($key, $value);
        $query = $this->db->get();
        return $query->row();
    }
    
    function getAll(){
        $query = $this->db->get($this->tables['user_type']);
        return $query->result();
    }  
    
    function get_supplier(){
            $this->db->select('user_email')
                    ->from($this->table)
                    ->where(array(
                       'type_id' =>3 
                    ));
            $query = $this->db->get();
            
            $result = $query->result();
            
            foreach ($result as $key =>$value ){
                    $a_return[] = $value->user_email;
            }
            return $a_return;
            
    }
    
    

}

?>
