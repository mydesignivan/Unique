<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Index extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

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


    /* AJAX FUNCTIONS
     **************************************************************************/
    public function ajax_get_form(){
         $form=$this->uri->segment(4);
         
         $this->load->view("paneluser/ajax/$form");
    }

     

    /* PRIVATE FUNCTIONS
     **************************************************************************/
}