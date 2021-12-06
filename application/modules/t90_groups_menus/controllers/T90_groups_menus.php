<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T90_groups_menus extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T90_groups_menus_model');
        $this->load->library('form_validation');
		$this->load->library('datatables');
    }

    public function update_action2()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
				'idgroups' => $this->input->post('idgroups',TRUE),
				'idmenus' => $this->input->post('idmenus',TRUE),
				'rights' => $this->input->post('rights',TRUE),
	    	);
            $this->T90_groups_menus_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t90_groups_menus'));
        }
    }

    public function update2($id)
    {
        // $row = $this->T90_groups_menus_model->get_by_id($id);
        $dataGroups = $this->T90_groups_menus_model->getAllByIdGroups($id);
        if ($dataGroups) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t90_groups_menus/update_action2'),
				// 'id' => set_value('id', $row->id),
				// 'idgroups' => set_value('idgroups', $row->idgroups),
				// 'idmenus' => set_value('idmenus', $row->idmenus),
				// 'rights' => set_value('rights', $row->rights),
                'dataGroups' => $dataGroups,
	    	);
            // $this->load->view('t90_groups_menus/t90_groups_menus_form', $data);
            // $data['_view'] = 't90_groups_menus/t90_groups_menus_form2';
            $data['_caption'] = 'Access Rights';
            // $this->load->view('_00_dashboard/_00_dashboard', $data);
            $this->load->view('t90_groups_menus/t90_groups_menus_form2', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            // redirect(site_url('t90_groups_menus'));
            // redirect(site_url('t86_groups'));
        }
    }

    public function index()
    {
        // $this->load->view('t90_groups_menus/t90_groups_menus_list');
        $data['hakAkses'] = getHakAkses(substr($this->uri->segment(1), 4));
        $this->session->set_userdata('hakAkses'.substr($this->uri->segment(1), 4), $data['hakAkses']);
        $data['_view'] = 't90_groups_menus/t90_groups_menus_list';
        $data['_caption'] = 'Groups_menus';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->T90_groups_menus_model->json();
    }

    public function read($id)
    {
        $row = $this->T90_groups_menus_model->get_by_id($id);
        if ($row) {
            $data = array(
				'id' => $row->id,
				'idgroups' => $row->idgroups,
				'idmenus' => $row->idmenus,
				'rights' => $row->rights,
	    	);
            $this->load->view('t90_groups_menus/t90_groups_menus_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t90_groups_menus'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('t90_groups_menus/create_action'),
		    'id' => set_value('id'),
		    'idgroups' => set_value('idgroups'),
		    'idmenus' => set_value('idmenus'),
		    'rights' => set_value('rights'),
		);
        // $this->load->view('t90_groups_menus/t90_groups_menus_form', $data);
        $data['_view'] = 't90_groups_menus/t90_groups_menus_form';
        $data['_caption'] = 'Groups_menus';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function create_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'idgroups' => $this->input->post('idgroups',TRUE),
				'idmenus' => $this->input->post('idmenus',TRUE),
				'rights' => $this->input->post('rights',TRUE),
	    	);
            $this->T90_groups_menus_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t90_groups_menus'));
        }
    }

    public function update($id)
    {
        // $row = $this->T90_groups_menus_model->get_by_id($id);
        $dataGroups = $this->T90_groups_menus_model->getAllByIdGroups($id);
        if ($dataGroups) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t90_groups_menus/update_action'),
				// 'id' => set_value('id', $row->id),
				// 'idgroups' => set_value('idgroups', $row->idgroups),
				// 'idmenus' => set_value('idmenus', $row->idmenus),
				// 'rights' => set_value('rights', $row->rights),
                'dataGroups' => $dataGroups,
	    	);
            // $this->load->view('t90_groups_menus/t90_groups_menus_form', $data);
            $data['_view'] = 't90_groups_menus/t90_groups_menus_form';
            $data['_caption'] = 'Hak Akses';
            $this->load->view('_00_dashboard/_00_dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            // redirect(site_url('t90_groups_menus'));
            redirect(site_url('t86_groups'));
        }
    }

    public function update_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
				'idgroups' => $this->input->post('idgroups',TRUE),
				'idmenus' => $this->input->post('idmenus',TRUE),
				'rights' => $this->input->post('rights',TRUE),
	    	);
            $this->T90_groups_menus_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t90_groups_menus'));
        }
    }

    public function delete($id)
    {
        $row = $this->T90_groups_menus_model->get_by_id($id);
        if ($row) {
            $this->T90_groups_menus_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t90_groups_menus'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t90_groups_menus'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('idgroups', 'Idgroups', 'trim|required');
		$this->form_validation->set_rules('idmenus', 'Idmenus', 'trim|required');
		$this->form_validation->set_rules('rights', 'Rights', 'trim|required');
		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t90_groups_menus.xls";
        $judul = "t90_groups_menus";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Idgroups");
		xlsWriteLabel($tablehead, $kolomhead++, "Idmenus");
		xlsWriteLabel($tablehead, $kolomhead++, "Rights");

		foreach ($this->T90_groups_menus_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
		    xlsWriteLabel($tablebody, $kolombody++, $data->idgroups);
		    xlsWriteNumber($tablebody, $kolombody++, $data->idmenus);
		    xlsWriteNumber($tablebody, $kolombody++, $data->rights);

		    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t90_groups_menus.doc");

        $data = array(
            't90_groups_menus_data' => $this->T90_groups_menus_model->get_all(),
            'start' => 0
        );

        $this->load->view('t90_groups_menus/t90_groups_menus_doc',$data);
    }

}

/* End of file T90_groups_menus.php */
/* Location: ./application/controllers/T90_groups_menus.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-11-23 16:29:17 */
/* http://harviacode.com */
