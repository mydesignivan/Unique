<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Contents extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        if( !$this->session->userdata('logged_in') || !is_numeric($this->session->userdata('users_id')) ) redirect($this->config->item('base_url'));
        
        $this->load->model("contents_model");

        $this->load->library('dataview', array(
            'tlp_section'        =>  'paneladmin/contents_view.php',
            'tlp_title'          =>  TITLE_INDEX,
            'tlp_title_section'  => "P&aacute;ginas"
        ));
        $this->_data = $this->dataview->get_data();
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/
    private $_data;

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        $this->_data = $this->dataview->set_data(array(
            'tlp_script'  => array('plugins_tiny_mce', 'class_contents'),
            'listPages'   => $this->contents_model->get_list()
        ));
        $this->load->view('template_paneladmin_view', $this->_data);
    }

    /* AJAX FUNCTIONS
     **************************************************************************/
    public function ajax_save(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            die($this->contents_model->save() ? "success" : "error");
        }
    }

    /* PRIVATE FUNCTIONS
     **************************************************************************/
}

?>