<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Index extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        if( !$this->session->userdata('logged_in') ) redirect($this->config->item('base_url'));

        $this->load->library("simplelogin");
        $this->load->library('dataview', array(
            'tlp_section'        =>  'paneluser/bodas_view.php',
            'tlp_title'          =>  TITLE_INDEX,
            'tlp_title_section'  => "Bodas",
            
        ));
        $this->_data = $this->dataview->get_data();
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/
    private $_data;

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        $this->load->model("contents_model");

        $this->_data = $this->dataview->set_data(array(
            'tlp_script'         => array("plugins_validator", "plugins_formatnumber","class_bodas"),
            'tlp_title'          =>  TITLE_INDEX,
            'tlp_title_section'  => "Bodas"
        ));
        $this->load->view('template_frontpage_view', $this->_data);

    }

    public function logout(){
        $this->load->library("simplelogin");
        $this->simplelogin->logout();
        redirect($this->config->item('base_url'));
    }


    /* AJAX FUNCTIONS
     **************************************************************************/
    public function ajax_get_form(){
         $vista = $this->uri->segment(4);
         $data = array();
         if( $vista=="bodas_novios_view" ){
            $data['form'] = "";
         }
         
         $this->load->view("paneluser/ajax/$vista", $data);
    }

     

    /* PRIVATE FUNCTIONS
     **************************************************************************/
}