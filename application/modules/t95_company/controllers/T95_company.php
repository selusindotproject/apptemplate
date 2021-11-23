<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T95_company extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T95_company_model');
        $this->load->library('form_validation');        
		$this->load->library('datatables');
    }

    public function index()
    {
        // $this->load->view('t95_company/t95_company_list');
        $data['hakAkses'] = getHakAkses(substr($this->uri->segment(1), 4));
        $this->session->set_userdata('hakAkses'.substr($this->uri->segment(1), 4), $data['hakAkses']);
        $data['_view'] = 't95_company/t95_company_list';
        $data['_caption'] = 'Company';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->T95_company_model->json();
    }

    public function read($id)
    {
        $row = $this->T95_company_model->get_by_id($id);
        if ($row) {
            $data = array(
				'id' => $row->id,
				'nama' => $row->nama,
				'alamat' => $row->alamat,
				'kota' => $row->kota,
	    	);
            $this->load->view('t95_company/t95_company_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t95_company'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('t95_company/create_action'),
		    'id' => set_value('id'),
		    'nama' => set_value('nama'),
		    'alamat' => set_value('alamat'),
		    'kota' => set_value('kota'),
		);
        // $this->load->view('t95_company/t95_company_form', $data);
        $data['_view'] = 't95_company/t95_company_form';
        $data['_caption'] = 'Company';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function create_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'nama' => $this->input->post('nama',TRUE),
				'alamat' => $this->input->post('alamat',TRUE),
				'kota' => $this->input->post('kota',TRUE),
	    	);
            $this->T95_company_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t95_company'));
        }
    }

    public function update($id)
    {
        $row = $this->T95_company_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t95_company/update_action'),
				'id' => set_value('id', $row->id),
				'nama' => set_value('nama', $row->nama),
				'alamat' => set_value('alamat', $row->alamat),
				'kota' => set_value('kota', $row->kota),
	    	);
            // $this->load->view('t95_company/t95_company_form', $data);
            $data['_view'] = 't95_company/t95_company_form';
            $data['_caption'] = 'Company';
            $this->load->view('_00_dashboard/_00_dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t95_company'));
        }
    }

    public function update_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
				'nama' => $this->input->post('nama',TRUE),
				'alamat' => $this->input->post('alamat',TRUE),
				'kota' => $this->input->post('kota',TRUE),
	    	);
            $this->T95_company_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t95_company'));
        }
    }

    public function delete($id)
    {
        $row = $this->T95_company_model->get_by_id($id);
        if ($row) {
            $this->T95_company_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t95_company'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t95_company'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('kota', 'Kota', 'trim|required');
		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t95_company.xls";
        $judul = "t95_company";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Nama");
		xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
		xlsWriteLabel($tablehead, $kolomhead++, "Kota");

		foreach ($this->T95_company_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
		    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
		    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
		    xlsWriteLabel($tablebody, $kolombody++, $data->kota);

		    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t95_company.doc");

        $data = array(
            't95_company_data' => $this->T95_company_model->get_all(),
            'start' => 0
        );

        $this->load->view('t95_company/t95_company_doc',$data);
    }

}

/* End of file T95_company.php */
/* Location: ./application/controllers/T95_company.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-11-23 07:32:06 */
/* http://harviacode.com */