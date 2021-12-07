<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T85_users_model extends CI_Model
{

    public $table = 't85_users';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id,ip_address,username,password,email,activation_selector,activation_code,forgotten_password_selector,forgotten_password_code,forgotten_password_time,remember_selector,remember_code,created_on,last_login,active,first_name,last_name,company,phone');
        $this->datatables->from('t85_users');
		if (isset($_POST['id']) && $_POST['id'] != '') { $this->datatables->like('id', $_POST['id']); }
		if (isset($_POST['ip_address']) && $_POST['ip_address'] != '') { $this->datatables->like('ip_address', $_POST['ip_address']); }
		if (isset($_POST['username']) && $_POST['username'] != '') { $this->datatables->like('username', $_POST['username']); }
		if (isset($_POST['password']) && $_POST['password'] != '') { $this->datatables->like('password', $_POST['password']); }
		if (isset($_POST['email']) && $_POST['email'] != '') { $this->datatables->like('email', $_POST['email']); }
		if (isset($_POST['activation_selector']) && $_POST['activation_selector'] != '') { $this->datatables->like('activation_selector', $_POST['activation_selector']); }
		if (isset($_POST['activation_code']) && $_POST['activation_code'] != '') { $this->datatables->like('activation_code', $_POST['activation_code']); }
		if (isset($_POST['forgotten_password_selector']) && $_POST['forgotten_password_selector'] != '') { $this->datatables->like('forgotten_password_selector', $_POST['forgotten_password_selector']); }
		if (isset($_POST['forgotten_password_code']) && $_POST['forgotten_password_code'] != '') { $this->datatables->like('forgotten_password_code', $_POST['forgotten_password_code']); }
		if (isset($_POST['forgotten_password_time']) && $_POST['forgotten_password_time'] != '') { $this->datatables->like('forgotten_password_time', $_POST['forgotten_password_time']); }
		if (isset($_POST['remember_selector']) && $_POST['remember_selector'] != '') { $this->datatables->like('remember_selector', $_POST['remember_selector']); }
		if (isset($_POST['remember_code']) && $_POST['remember_code'] != '') { $this->datatables->like('remember_code', $_POST['remember_code']); }
		if (isset($_POST['created_on']) && $_POST['created_on'] != '') { $this->datatables->like('created_on', $_POST['created_on']); }
		if (isset($_POST['last_login']) && $_POST['last_login'] != '') { $this->datatables->like('last_login', $_POST['last_login']); }
		if (isset($_POST['active']) && $_POST['active'] != '') { $this->datatables->like('active', $_POST['active']); }
		if (isset($_POST['first_name']) && $_POST['first_name'] != '') { $this->datatables->like('first_name', $_POST['first_name']); }
		if (isset($_POST['last_name']) && $_POST['last_name'] != '') { $this->datatables->like('last_name', $_POST['last_name']); }
		if (isset($_POST['company']) && $_POST['company'] != '') { $this->datatables->like('company', $_POST['company']); }
		if (isset($_POST['phone']) && $_POST['phone'] != '') { $this->datatables->like('phone', $_POST['phone']); }
        //add this line for join
        //$this->datatables->join('table2', 't85_users.field = table2.field');
        //$this->datatables->add_column('action', anchor(site_url('t85_users/update/$1'),'Ubah')." | ".anchor(site_url('t85_users/delete/$1'),'Hapus','onclick="javascript: return confirm(\'Apakah Anda yakin ingin menghapus data ?\')"'), 'id');
        $action = "";
        $hakAkses = $this->session->userdata('hakAkses'.substr($this->uri->segment(1), 4));
        if ($hakAkses['ubah']) {
            $action = anchor(site_url('t85_users/update/$1'),'Ubah');
            if ($hakAkses['hapus']) {
                $action .= " | ";
            }
        }
        if ($hakAkses['hapus']) {
            $action .= anchor(site_url('t85_users/delete/$1'),'Hapus','onclick="javascript: return confirm(\'Apakah Anda yakin ingin menghapus data ?\')"');
        }
        $this->datatables->add_column('action', $action, 'id');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
		$this->db->or_like('ip_address', $q);
		$this->db->or_like('username', $q);
		$this->db->or_like('password', $q);
		$this->db->or_like('email', $q);
		$this->db->or_like('activation_selector', $q);
		$this->db->or_like('activation_code', $q);
		$this->db->or_like('forgotten_password_selector', $q);
		$this->db->or_like('forgotten_password_code', $q);
		$this->db->or_like('forgotten_password_time', $q);
		$this->db->or_like('remember_selector', $q);
		$this->db->or_like('remember_code', $q);
		$this->db->or_like('created_on', $q);
		$this->db->or_like('last_login', $q);
		$this->db->or_like('active', $q);
		$this->db->or_like('first_name', $q);
		$this->db->or_like('last_name', $q);
		$this->db->or_like('company', $q);
		$this->db->or_like('phone', $q);
		$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
		$this->db->or_like('ip_address', $q);
		$this->db->or_like('username', $q);
		$this->db->or_like('password', $q);
		$this->db->or_like('email', $q);
		$this->db->or_like('activation_selector', $q);
		$this->db->or_like('activation_code', $q);
		$this->db->or_like('forgotten_password_selector', $q);
		$this->db->or_like('forgotten_password_code', $q);
		$this->db->or_like('forgotten_password_time', $q);
		$this->db->or_like('remember_selector', $q);
		$this->db->or_like('remember_code', $q);
		$this->db->or_like('created_on', $q);
		$this->db->or_like('last_login', $q);
		$this->db->or_like('active', $q);
		$this->db->or_like('first_name', $q);
		$this->db->or_like('last_name', $q);
		$this->db->or_like('company', $q);
		$this->db->or_like('phone', $q);
		$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file T85_users_model.php */
/* Location: ./application/models/T85_users_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-12-07 07:03:09 */
/* http://harviacode.com */