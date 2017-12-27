<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class License extends CI_Controller {

    public function Index() {
        //  $this->load->view("admin/license");

        $config = array();
        $config["base_url"] = base_url() . "admin/license";
        $this->load->model('Model_license');
        $total_row = $this->Model_license->record_count();
        $config["total_rows"] = $total_row;
        $config["per_page"] = 5;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = $total_row;
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        if ($this->uri->segment(3)) {
            $page = ($this->uri->segment(3));
        } else {
            $page = 1;
        }
        $data["assets"] = $this->Model_license->licenseListing($config["per_page"], $page);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);

        // View data according to array.
        $this->load->view("admin/license", $data);
    }

    public function addLicense() {

        if (!empty($_POST)) {
            $this->form_validation->set_rules('license_name', 'License Name', 'required|is_unique[licenses.license_name]');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/addlicense');
            } else {
                $manufacturer = $this->input->post("manufacturer");
                $license_name = $this->input->post("license_name");
                $product_key = $this->input->post("product_key");
                $number_of_licenses = $this->input->post("number_of_licenses");
                $insert_data = array(
                    'manufacturer' => $manufacturer,
                    'license_name' => $license_name,
                    'product_key' => $product_key,
                    'number_of_licenses' => $number_of_licenses
                );

                $this->load->model('Model_license');
                $res = $this->Model_license->addLicense($insert_data);
                if ($res == true) {
                    $this->session->set_flashdata('success', "Successfully added License!");
                    redirect('License/addLicense');
                } else {
                    $this->session->set_flashdata('error', "Unable to add license, Please check");
                    $this->load->view('admin/addlicense');
                    redirect('License/addLicense');
                }
            }
        } else {
            $this->load->view("admin/addlicense");
        }
    }

    function edit() {
        $id = $this->uri->segment(3);
        $this->load->model('Model_license');
        $row = $this->Model_license->editLicense($id);
        $data['license'] = $row;
        $this->load->view('admin/editlicense', $data);
    }

    public function licenseUpdate() {

        if (!empty($_POST)) {
            $this->form_validation->set_rules('license_name', 'License Name', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('License/edit');
            } else {
                $id = $this->input->post("license_id");
                $manufacturer = $this->input->post("manufacturer");
                $license_name = $this->input->post("license_name");
                $product_key = $this->input->post("product_key");
                $number_of_licenses = $this->input->post("number_of_licenses");

                $update_data = array(
                    'id' => $id,
                    'manufacturer' => $manufacturer,
                    'license_name' => $license_name,
                    'product_key' => $product_key,
                    'number_of_licenses' => $number_of_licenses,
                );

                $this->load->model('Model_license');
                $res = $this->Model_license->licenseUpdate($update_data);
                if ($res == true) {
                    $this->session->set_flashdata('success', "Successfully updated License!");
                    redirect('License');
                } else {
                    $this->session->set_flashdata('error', "Unable to update License , Please check");
                    $this->load->view('admin/editlicense');
                    redirect('License');
                }
            }
        } else {
            $this->load->view("admin/editlicense");
        }
    }

    function delete($id) {

        $id = $this->uri->segment(3);
        $this->load->model('Model_license');
        $result = $this->Model_license->licenseDelete($id);
        if ($result == true) {
            $this->session->set_flashdata('success', "Successfully deleted  license!");
            redirect('license');
        } else {
            $this->session->set_flashdata('error', "Unable to delete license Please check");
            $this->load->view('admin/license');
            redirect('license');
        }
    }

}
