<?php

class MY_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

}

class Crud_Controller extends MY_Controller {

    protected $table_name = '';
    protected $primary_key = '';
    protected $column_names=[];
                function __construct() {
        parent::__construct();
        // do some session stuff here :)
    }

    function loadForm($form, $view_mode) {
        
    }

    function loadMasterTemplate($form,$data) {
        $this->load->view('admin/inc/header');
        $this->load->view('admin/templates/preview_form_wrapper',array("form"=>$this->load->view($form,$data,TRUE)));
        $this->load->view('admin/inc/footer');
    }

    //crud functions

    function PreviewTable($data_set,$primary) {
        $data['column_names']=$this->column_names;
        $data['data_set']=$data_set;
        //$data['column_names']=$column_names;
        $this->loadMasterTemplate('admin/templates/preview_form',$data);
    }

    function genarateTable() {
        
    }

}
