<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Country extends CI_Controller {

    public function Index() {
        //  $this->load->view("admin/location");

        $config = array();
        //$config["base_url"] = base_url() . "admin/Location";
        $this->load->model('Model_location');
        $total_row = $this->Model_location->record_count();
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
        $data["locations"] = $this->Model_location->locationsListing($config["per_page"], $page);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);

        // View data according to array.
        $this->load->view("admin/location", $data);
    }

    public function addCountry($viewtype) {

        if (!empty($_POST)) {
            $this->form_validation->set_rules('country_id', 'Country ID', 'required');
            $this->form_validation->set_rules('country_name', 'Country Name', 'required');
            
            if ($this->form_validation->run() == FALSE) {
                $this->load->view(($viewtype=='form')?'admin/addcountry':'admin/formaddcountry');
            } else {
                $country_id = $this->input->post("country_id");
                $country_name = $this->input->post("country_name");

                $insert_data = array(
                    'country_id' => $country_id,
                    'country' => $country_name,
                );

                $this->load->model('Model_country');
                $res = $this->Model_country->addCountry($insert_data);
                if ($res == true) {
                    $this->session->set_flashdata('success', "Successfully added Country!");
                    redirect('Country');
                } else {
                    $this->session->set_flashdata('error', "Unable to add Country, Please check");
                    redirect('Country/addCountry');
                }
            }
        } else {
            $this->load->view("admin/addCountry");
        }
    }

    function edit($id) {
        $this->load->model('Model_location');
        $this->load->model('Model_country');
        $location = $this->Model_location->editLocation($id);
        $country = $this->Model_country->getCountries();
        $data['location'] = $location;
        $data['countries'] = $country;
        $this->load->view('admin/editlocation', $data);
    }

    public function LocationUpdate() {

        if (!empty($_POST)) {
            $this->form_validation->set_rules('branch_name', 'Branch Name', 'required');
            $this->form_validation->set_rules('country', 'Country', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/editlocation');
            } else {
                $id = $this->input->post("branch_id");
                $branch_name = $this->input->post("branch_name");
                $country = $this->input->post("country");

                $update_data = array(
                    'id' => $id,
                    'branch_name' => $branch_name,
                    'country' => $country,
                );

                $this->load->model('Model_location');
                $res = $this->Model_location->locationUpdate($update_data);
                print $this->db->last_query();
                if ($res == true) {
                    $this->session->set_flashdata('success', "Successfully updated Location!");
                    redirect('Location');
                } else {
                    $this->session->set_flashdata('error', "Unable to update Location , Please check");
                    $this->load->view('admin/editlocation');
                    redirect('Location');
                }
            }
        } else {
            $this->load->view("admin/editlocation");
        }
    }

    function delete($id) {
        $this->load->model('Model_location');
        $result = $this->Model_location->locationsDelete($id);
        if ($result === true) {
            $this->session->set_flashdata('success', "Successfully deleted location!");
            redirect('location');
        } else {
            $this->session->set_flashdata('error', "Unable to delete location Please check");
            $this->load->view('admin/location');
            redirect('location');
        }
    }

}
