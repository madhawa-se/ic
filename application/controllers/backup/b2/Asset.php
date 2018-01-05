<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Asset extends CI_Controller {

    public function Index() {


        $config = array();
        $config["base_url"] = base_url() . "admin/asset";
        $this->load->model('model_asset');
        $total_row = $this->model_asset->record_count();
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
        $data["assets"] = $this->model_asset->assetListing($config["per_page"], $page);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);

        // View data according to array.
        $this->load->view("admin/asset", $data);
    }

    public function detailListing() {
        //  $this->load->view("admin/asset-details");

        $id = $this->uri->segment(3);
        $this->load->model('model_asset');
        $result = $this->model_asset->assetDetails($id);
        //print_r($result);
        $data['assets'] = $result;
        $this->load->view('admin/assetdetails', $data);
    }

    public function addAsset() {
        $this->load->model('model_manufacturer');
        $this->load->model('model_model');
        $this->load->model('model_asset');
        $this->load->model('model_location');
        $this->load->model('model_department');
        $this->load->model('model_employee');
        $this->load->model('model_license');
        $this->load->model('model_supplier');


        $data['manufacturers'] = $this->model_manufacturer->getManufacturers();
        $data['models'] = $this->model_model->getModels();
        $data['assets'] = $this->model_asset->getAssets();
        $data['asset_types'] = $this->model_asset->getAssetTypes();
        $data['locations'] = $this->model_location->getLocations();
        $data['departments'] = $this->model_department->getDepartments();
        $data['employees'] = $this->model_employee->getEmployees();
        $data['licenses'] = $this->model_license->getLicenses();
        $data['suppliers'] = $this->model_supplier->getSuppliers();

        if (!empty($_POST)) {
            $this->form_validation->set_rules('asset_id', 'Asset ID', 'required|is_unique[assets.asset_id]');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/addasset');
            } else {
                $asset_id = $this->input->post("asset_id");
                $brand = $this->input->post("manufacturer");
                $hostname = $this->input->post("hostname");
                $serial_number = $this->input->post("serial_number");
                $sap_asset_id = $this->input->post("sap_asset_id");
                $model_number = $this->input->post("model_number");
                $asset_type = $this->input->post("asset_type");
                $location = $this->input->post("location");
                $department = $this->input->post("department");
                $assigned_to = $this->input->post("assigned_to");
                $assigned_date = $this->input->post("assigned_date");
                $notes = $this->input->post("notes");
                $licenses = $this->input->post("licenses");
                $mul_val_string = serialize($licenses);
                // $licenses=implode(",", $this->input->post("licenses");
                $ip_address = $this->input->post("ip_address");
                $mac_address = $this->input->post("mac_address");
                $supplier = $this->input->post("supplier");
                $purchase_date = $this->input->post("purchase_date");
                $warranty_expiry_date = $this->input->post("warranty_expiry_date");
                $managed_by = $this->input->post("managed_by");
                $asset_lifetime = $this->input->post("asset_lifetime");
                $last_modified_date = $this->input->post("last_modified_date");
                $last_modified_user = $this->input->post("last_modified_user");
                $insert_data = array(
                    'asset_id' => $asset_id,
                    'manufacturer' => $brand,
                    'hostname' => $hostname,
                    'serial_number' => $serial_number,
                    'sap_asset_id' => $sap_asset_id,
                    'model_number' => $model_number,
                    'asset_type' => $asset_type,
                    'location' => $location,
                    'department' => $department,
                    'assigned_to' => $assigned_to,
                    'assigned_date' => $assigned_date,
                    'notes' => $notes,
                    'licenses' => $mul_val_string,
                    'ip_address' => $ip_address,
                    'mac_address' => $mac_address,
                    'supplier' => $supplier,
                    'purchase_date' => $purchase_date,
                    'warranty_expiry_date' => $warranty_expiry_date,
                    'managed_by' => $managed_by,
                    'asset_lifetime' => $asset_lifetime,
                    'last_modified_date' => $last_modified_date,
                    'last_modified_user' => $last_modified_user
                );

                $this->load->model('Model_asset');
                $res = $this->Model_asset->assetAdd($insert_data);
                if ($res == true) {
                    $this->session->set_flashdata('success', "Successfully added Asset data!");
                    redirect('Asset/addAsset');
                } else {
                    $this->session->set_flashdata('error', "Unable to add asset data Please check");
                    $this->load->view('admin/addasset');
                    redirect('Asset/addAsset');
                }
            }
        } else {
            //  $this->load->view("admin/addasset");
            $this->load->model('model_asset');
            $result = $this->model_asset->getLicense();
            //print_r($result);
            $data['licenses'] = $result;
            $this->load->view('admin/addasset', $data);
        }
    }

    private function getAssetData() {
        
    }

    function assetEdit() {
        $id = $this->uri->segment(3);
        $this->load->model('Model_asset');
        $row = $this->Model_asset->assetEdit($id);
        $data['assets'] = $row;
        $this->load->view('admin/editasset', $data);
    }

    public function assetUpdate() {

        if (!empty($_POST)) {
            $this->form_validation->set_rules('asset_id', 'Asset ID', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/editasset');
            } else {
                $id = $this->input->post("id");
                $asset_id = $this->input->post("asset_id");
                $brand = $this->input->post("brand");
                $hostname = $this->input->post("hostname");
                $serial_number = $this->input->post("serial_number");
                $sap_asset_id = $this->input->post("sap_asset_id");
                $model_number = $this->input->post("model_number");
                $asset_type = $this->input->post("asset_type");
                $location = $this->input->post("location");
                $department = $this->input->post("department");
                $assigned_to = $this->input->post("assigned_to");
                $assigned_date = $this->input->post("assigned_date");
                $notes = $this->input->post("notes");
                $licenses = $this->input->post("licenses");
                $ip_address = $this->input->post("ip_address");
                $mac_address = $this->input->post("mac_address");
                $supplier = $this->input->post("supplier");
                $purchase_date = $this->input->post("purchase_date");
                $warranty_expiry_date = $this->input->post("warranty_expiry_date");
                $managed_by = $this->input->post("managed_by");
                $asset_lifetime = $this->input->post("asset_lifetime");
                $last_modified_date = $this->input->post("last_modified_date");
                $last_modified_user = $this->input->post("last_modified_user");
                $update_data = array(
                    'id' => $id,
                    'asset_id' => $asset_id,
                    'brand' => $brand,
                    'hostname' => $hostname,
                    'serial_number' => $serial_number,
                    'sap_asset_id' => $sap_asset_id,
                    'model_number' => $model_number,
                    'asset_type' => $asset_type,
                    'location' => $location,
                    'department' => $department,
                    'assigned_to' => $assigned_to,
                    'assigned_date' => $assigned_date,
                    'notes' => $notes,
                    'licenses' => $licenses,
                    'ip_address' => $ip_address,
                    'mac_address' => $mac_address,
                    'supplier' => $supplier,
                    'purchase_date' => $purchase_date,
                    'warranty_expiry_date' => $warranty_expiry_date,
                    'managed_by' => $managed_by,
                    'asset_lifetime' => $asset_lifetime,
                    'last_modified_date' => $last_modified_date,
                    'last_modified_user' => $last_modified_user
                );

                $this->load->model('Model_asset');
                $res = $this->Model_asset->assetUpdate($update_data);
                if ($res == true) {
                    $this->session->set_flashdata('success', "Successfully updated Asset data!");
                    redirect('Asset');
                } else {
                    $this->session->set_flashdata('error', "Unable to update asset data Please check");
                    $this->load->view('admin/addasset');
                    redirect('Asset');
                }
            }
        } else {
            $this->load->view("admin/addasset");
        }
    }

    function assetDelete($id) {

        $id = $this->uri->segment(3);
        $this->load->model('Model_asset');
        $result = $this->Model_asset->assetDelete($id);
        if ($result == true) {
            $this->session->set_flashdata('success', "Successfully deleted  asset!");
            redirect('asset');
        } else {
            $this->session->set_flashdata('error', "Unable to delete asset Please check");
            $this->load->view('admin/asset');
            redirect('asset');
        }
    }

    public function assetType() {
        //$this->load->view('admin/assettype');
        //  $this->load->view("admin/license");

        $config = array();
        $config["base_url"] = base_url() . "admin/assettype";
        $this->load->model('Model_asset');
        $total_row = $this->Model_asset->count_type();
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
        $data["types"] = $this->Model_asset->assetType($config["per_page"], $page);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);

        // View data according to array.
        $this->load->view("admin/assettype", $data);
    }

    function typeEdit() {
        $id = $this->uri->segment(3);
        $this->load->model('Model_asset');
        $row = $this->Model_asset->typeEdit($id);
        $data['types'] = $row;
        $this->load->view('admin/editassettype', $data);
    }

    public function typeUpdate() {
        if (!empty($_POST)) {
            $this->form_validation->set_rules('asset_type_id', 'Asset Type ID', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/editassettype');
            } else {
                $id = $this->input->post("type_id");
                $asset_type_id = $this->input->post("asset_type_id");
                $asset_type = $this->input->post("asset_type");
                $asset_description = $this->input->post("asset_description");

                $update_data = array(
                    'id' => $id,
                    'asset_type_id' => $asset_type_id,
                    'asset_type' => $asset_type,
                    'asset_description' => $asset_description
                );

                $this->load->model('Model_asset');
                $res = $this->Model_asset->typeUpdate($update_data);
                if ($res == true) {
                    $this->session->set_flashdata('success', "Successfully updated Asset type!");
                    redirect('Asset/assetType');
                } else {
                    $this->session->set_flashdata('error', "Unable to update asset type Please check");
                    $this->load->view('admin/editassettype');
                    redirect('Admin/assetType');
                }
            }
        } else {
            $this->load->view("admin/addasset");
        }
    }

    public function addType() {

        if (!empty($_POST)) {
            $this->form_validation->set_rules('asset_type_id', 'Asset Type ID', 'required|is_unique[asset_type.asset_type_id]');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/addtype');
            } else {
                $asset_type_id = $this->input->post("asset_type_id");
                $asset_type = $this->input->post("asset_type");
                $asset_description = $this->input->post("asset_description");
                $insert_data = array(
                    'asset_type_id' => $asset_type_id,
                    'asset_type' => $asset_type,
                    'asset_description' => $asset_description
                );

                $this->load->model('Model_asset');
                $res = $this->Model_asset->addType($insert_data);
                if ($res == true) {
                    $this->session->set_flashdata('success', "Successfully added Asset Type!");
                    redirect('Asset/addType');
                } else {
                    $this->session->set_flashdata('error', "Unable to add asset type Please check");
                    $this->load->view('admin/addtype');
                    redirect('Asset/addType');
                }
            }
        } else {
            $this->load->view("admin/addtype");
        }
    }

    function typeDelete($id) {

        $id = $this->uri->segment(3);
        $this->load->model('Model_asset');
        $result = $this->Model_asset->typeDelete($id);
        if ($result == true) {
            $this->session->set_flashdata('success', "Successfully deleted  type!");
            redirect('Asset/assetType');
        } else {
            $this->session->set_flashdata('error', "Unable to delete type Please check");
            $this->load->view('admin/assettype');
            redirect('Asset/assetType');
        }
    }

    public function getLicense() {

        $this->load->model('model_asset');
        $result = $this->model_asset->getLicense();
        //print_r($result);
        $data['licenses'] = $result;
        $this->load->view('admin/addasset', $data);
    }

}
