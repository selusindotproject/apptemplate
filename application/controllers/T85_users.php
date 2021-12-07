<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T85_users extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T85_users_model');
        $this->load->library('form_validation');        
		$this->load->library('datatables');
    }

    public function index()
    {
        // $this->load->view('t85_users/t85_users_list');
        $data['hakAkses'] = getHakAkses(substr($this->uri->segment(1), 4));
        $this->session->set_userdata('hakAkses'.substr($this->uri->segment(1), 4), $data['hakAkses']);
        $data['_view'] = 't85_users/t85_users_list';
        $data['_caption'] = 'Users';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->T85_users_model->json();
    }

    public function read($id)
    {
        $row = $this->T85_users_model->get_by_id($id);
        if ($row) {
            $data = array(
				'id' => $row->id,
				'ip_address' => $row->ip_address,
				'username' => $row->username,
				'password' => $row->password,
				'email' => $row->email,
				'activation_selector' => $row->activation_selector,
				'activation_code' => $row->activation_code,
				'forgotten_password_selector' => $row->forgotten_password_selector,
				'forgotten_password_code' => $row->forgotten_password_code,
				'forgotten_password_time' => $row->forgotten_password_time,
				'remember_selector' => $row->remember_selector,
				'remember_code' => $row->remember_code,
				'created_on' => $row->created_on,
				'last_login' => $row->last_login,
				'active' => $row->active,
				'first_name' => $row->first_name,
				'last_name' => $row->last_name,
				'company' => $row->company,
				'phone' => $row->phone,
	    	);
            $this->load->view('t85_users/t85_users_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t85_users'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('t85_users/create_action'),
		    'id' => set_value('id'),
		    'ip_address' => set_value('ip_address'),
		    'username' => set_value('username'),
		    'password' => set_value('password'),
		    'email' => set_value('email'),
		    'activation_selector' => set_value('activation_selector'),
		    'activation_code' => set_value('activation_code'),
		    'forgotten_password_selector' => set_value('forgotten_password_selector'),
		    'forgotten_password_code' => set_value('forgotten_password_code'),
		    'forgotten_password_time' => set_value('forgotten_password_time'),
		    'remember_selector' => set_value('remember_selector'),
		    'remember_code' => set_value('remember_code'),
		    'created_on' => set_value('created_on'),
		    'last_login' => set_value('last_login'),
		    'active' => set_value('active'),
		    'first_name' => set_value('first_name'),
		    'last_name' => set_value('last_name'),
		    'company' => set_value('company'),
		    'phone' => set_value('phone'),
		);
        // $this->load->view('t85_users/t85_users_form', $data);
        $data['_view'] = 't85_users/t85_users_form';
        $data['_caption'] = 'Users';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function create_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'ip_address' => $this->input->post('ip_address',TRUE),
				'username' => $this->input->post('username',TRUE),
				'password' => $this->input->post('password',TRUE),
				'email' => $this->input->post('email',TRUE),
				'activation_selector' => $this->input->post('activation_selector',TRUE),
				'activation_code' => $this->input->post('activation_code',TRUE),
				'forgotten_password_selector' => $this->input->post('forgotten_password_selector',TRUE),
				'forgotten_password_code' => $this->input->post('forgotten_password_code',TRUE),
				'forgotten_password_time' => $this->input->post('forgotten_password_time',TRUE),
				'remember_selector' => $this->input->post('remember_selector',TRUE),
				'remember_code' => $this->input->post('remember_code',TRUE),
				'created_on' => $this->input->post('created_on',TRUE),
				'last_login' => $this->input->post('last_login',TRUE),
				'active' => $this->input->post('active',TRUE),
				'first_name' => $this->input->post('first_name',TRUE),
				'last_name' => $this->input->post('last_name',TRUE),
				'company' => $this->input->post('company',TRUE),
				'phone' => $this->input->post('phone',TRUE),
	    	);
            $this->T85_users_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t85_users'));
        }
    }

    public function update($id)
    {
        $row = $this->T85_users_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t85_users/update_action'),
				'id' => set_value('id', $row->id),
				'ip_address' => set_value('ip_address', $row->ip_address),
				'username' => set_value('username', $row->username),
				'password' => set_value('password', $row->password),
				'email' => set_value('email', $row->email),
				'activation_selector' => set_value('activation_selector', $row->activation_selector),
				'activation_code' => set_value('activation_code', $row->activation_code),
				'forgotten_password_selector' => set_value('forgotten_password_selector', $row->forgotten_password_selector),
				'forgotten_password_code' => set_value('forgotten_password_code', $row->forgotten_password_code),
				'forgotten_password_time' => set_value('forgotten_password_time', $row->forgotten_password_time),
				'remember_selector' => set_value('remember_selector', $row->remember_selector),
				'remember_code' => set_value('remember_code', $row->remember_code),
				'created_on' => set_value('created_on', $row->created_on),
				'last_login' => set_value('last_login', $row->last_login),
				'active' => set_value('active', $row->active),
				'first_name' => set_value('first_name', $row->first_name),
				'last_name' => set_value('last_name', $row->last_name),
				'company' => set_value('company', $row->company),
				'phone' => set_value('phone', $row->phone),
	    	);
            // $this->load->view('t85_users/t85_users_form', $data);
            $data['_view'] = 't85_users/t85_users_form';
            $data['_caption'] = 'Users';
            $this->load->view('_00_dashboard/_00_dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t85_users'));
        }
    }

    public function update_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
				'ip_address' => $this->input->post('ip_address',TRUE),
				'username' => $this->input->post('username',TRUE),
				'password' => $this->input->post('password',TRUE),
				'email' => $this->input->post('email',TRUE),
				'activation_selector' => $this->input->post('activation_selector',TRUE),
				'activation_code' => $this->input->post('activation_code',TRUE),
				'forgotten_password_selector' => $this->input->post('forgotten_password_selector',TRUE),
				'forgotten_password_code' => $this->input->post('forgotten_password_code',TRUE),
				'forgotten_password_time' => $this->input->post('forgotten_password_time',TRUE),
				'remember_selector' => $this->input->post('remember_selector',TRUE),
				'remember_code' => $this->input->post('remember_code',TRUE),
				'created_on' => $this->input->post('created_on',TRUE),
				'last_login' => $this->input->post('last_login',TRUE),
				'active' => $this->input->post('active',TRUE),
				'first_name' => $this->input->post('first_name',TRUE),
				'last_name' => $this->input->post('last_name',TRUE),
				'company' => $this->input->post('company',TRUE),
				'phone' => $this->input->post('phone',TRUE),
	    	);
            $this->T85_users_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t85_users'));
        }
    }

    public function delete($id)
    {
        $row = $this->T85_users_model->get_by_id($id);
        if ($row) {
            $this->T85_users_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t85_users'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t85_users'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('ip_address', 'Ip Address', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('activation_selector', 'Activation Selector', 'trim|required');
		$this->form_validation->set_rules('activation_code', 'Activation Code', 'trim|required');
		$this->form_validation->set_rules('forgotten_password_selector', 'Forgotten Password Selector', 'trim|required');
		$this->form_validation->set_rules('forgotten_password_code', 'Forgotten Password Code', 'trim|required');
		$this->form_validation->set_rules('forgotten_password_time', 'Forgotten Password Time', 'trim|required');
		$this->form_validation->set_rules('remember_selector', 'Remember Selector', 'trim|required');
		$this->form_validation->set_rules('remember_code', 'Remember Code', 'trim|required');
		$this->form_validation->set_rules('created_on', 'Created On', 'trim|required');
		$this->form_validation->set_rules('last_login', 'Last Login', 'trim|required');
		$this->form_validation->set_rules('active', 'Active', 'trim|required');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('company', 'Company', 'trim|required');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required');
		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t85_users.xls";
        $judul = "t85_users";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
		xlsWriteLabel($tablehead, $kolomhead++, "Ip Address");
		xlsWriteLabel($tablehead, $kolomhead++, "Username");
		xlsWriteLabel($tablehead, $kolomhead++, "Password");
		xlsWriteLabel($tablehead, $kolomhead++, "Email");
		xlsWriteLabel($tablehead, $kolomhead++, "Activation Selector");
		xlsWriteLabel($tablehead, $kolomhead++, "Activation Code");
		xlsWriteLabel($tablehead, $kolomhead++, "Forgotten Password Selector");
		xlsWriteLabel($tablehead, $kolomhead++, "Forgotten Password Code");
		xlsWriteLabel($tablehead, $kolomhead++, "Forgotten Password Time");
		xlsWriteLabel($tablehead, $kolomhead++, "Remember Selector");
		xlsWriteLabel($tablehead, $kolomhead++, "Remember Code");
		xlsWriteLabel($tablehead, $kolomhead++, "Created On");
		xlsWriteLabel($tablehead, $kolomhead++, "Last Login");
		xlsWriteLabel($tablehead, $kolomhead++, "Active");
		xlsWriteLabel($tablehead, $kolomhead++, "First Name");
		xlsWriteLabel($tablehead, $kolomhead++, "Last Name");
		xlsWriteLabel($tablehead, $kolomhead++, "Company");
		xlsWriteLabel($tablehead, $kolomhead++, "Phone");

		foreach ($this->T85_users_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
		    xlsWriteLabel($tablebody, $kolombody++, $data->ip_address);
		    xlsWriteLabel($tablebody, $kolombody++, $data->username);
		    xlsWriteLabel($tablebody, $kolombody++, $data->password);
		    xlsWriteLabel($tablebody, $kolombody++, $data->email);
		    xlsWriteLabel($tablebody, $kolombody++, $data->activation_selector);
		    xlsWriteLabel($tablebody, $kolombody++, $data->activation_code);
		    xlsWriteLabel($tablebody, $kolombody++, $data->forgotten_password_selector);
		    xlsWriteLabel($tablebody, $kolombody++, $data->forgotten_password_code);
		    xlsWriteNumber($tablebody, $kolombody++, $data->forgotten_password_time);
		    xlsWriteLabel($tablebody, $kolombody++, $data->remember_selector);
		    xlsWriteLabel($tablebody, $kolombody++, $data->remember_code);
		    xlsWriteNumber($tablebody, $kolombody++, $data->created_on);
		    xlsWriteNumber($tablebody, $kolombody++, $data->last_login);
		    xlsWriteLabel($tablebody, $kolombody++, $data->active);
		    xlsWriteLabel($tablebody, $kolombody++, $data->first_name);
		    xlsWriteLabel($tablebody, $kolombody++, $data->last_name);
		    xlsWriteLabel($tablebody, $kolombody++, $data->company);
		    xlsWriteLabel($tablebody, $kolombody++, $data->phone);

		    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t85_users.doc");

        $data = array(
            't85_users_data' => $this->T85_users_model->get_all(),
            'start' => 0
        );

        $this->load->view('t85_users/t85_users_doc',$data);
    }

}

/* End of file T85_users.php */
/* Location: ./application/controllers/T85_users.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-12-07 07:03:09 */
/* http://harviacode.com */