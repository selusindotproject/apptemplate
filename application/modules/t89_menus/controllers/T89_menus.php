<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T89_menus extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T89_menus_model');
        $this->load->library('form_validation');        
		$this->load->library('datatables');
    }

    public function index()
    {
        // $this->load->view('t89_menus/t89_menus_list');
        $data['hakAkses'] = getHakAkses(substr($this->uri->segment(1), 4));
        $this->session->set_userdata('hakAkses'.substr($this->uri->segment(1), 4), $data['hakAkses']);
        $data['_view'] = 't89_menus/t89_menus_list';
        $data['_caption'] = 'Menus';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->T89_menus_model->json();
    }

    public function read($id)
    {
        $row = $this->T89_menus_model->get_by_id($id);
        if ($row) {
            $data = array(
				'id' => $row->id,
				'kode' => $row->kode,
				'nama' => $row->nama,
	    	);
            $this->load->view('t89_menus/t89_menus_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t89_menus'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('t89_menus/create_action'),
		    'id' => set_value('id'),
		    'kode' => set_value('kode'),
		    'nama' => set_value('nama'),
		);
        // $this->load->view('t89_menus/t89_menus_form', $data);
        $data['_view'] = 't89_menus/t89_menus_form';
        $data['_caption'] = 'Menus';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function create_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'kode' => $this->input->post('kode',TRUE),
				'nama' => $this->input->post('nama',TRUE),
	    	);
            $this->T89_menus_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t89_menus'));
        }
    }

    public function update($id)
    {
        $row = $this->T89_menus_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t89_menus/update_action'),
				'id' => set_value('id', $row->id),
				'kode' => set_value('kode', $row->kode),
				'nama' => set_value('nama', $row->nama),
	    	);
            // $this->load->view('t89_menus/t89_menus_form', $data);
            $data['_view'] = 't89_menus/t89_menus_form';
            $data['_caption'] = 'Menus';
            $this->load->view('_00_dashboard/_00_dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t89_menus'));
        }
    }

    public function update_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
				'kode' => $this->input->post('kode',TRUE),
				'nama' => $this->input->post('nama',TRUE),
	    	);
            $this->T89_menus_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t89_menus'));
        }
    }

    public function delete($id)
    {
        $row = $this->T89_menus_model->get_by_id($id);
        if ($row) {
            $this->T89_menus_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t89_menus'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t89_menus'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('kode', 'Kode', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t89_menus.xls";
        $judul = "t89_menus";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Kode");
		xlsWriteLabel($tablehead, $kolomhead++, "Nama");

		foreach ($this->T89_menus_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
		    xlsWriteLabel($tablebody, $kolombody++, $data->kode);
		    xlsWriteLabel($tablebody, $kolombody++, $data->nama);

		    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t89_menus.doc");

        $data = array(
            't89_menus_data' => $this->T89_menus_model->get_all(),
            'start' => 0
        );

        $this->load->view('t89_menus/t89_menus_doc',$data);
    }

}

/* End of file T89_menus.php */
/* Location: ./application/controllers/T89_menus.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-12-07 15:14:12 */
/* http://harviacode.com */