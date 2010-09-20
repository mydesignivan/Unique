<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Myaccount extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        if( !$this->session->userdata('logged_in') || !is_numeric($this->session->userdata('users_id')) ) redirect($this->config->item('base_url'));
        
        $this->load->model("users_model");

        $this->load->library('dataview', array(
            'tlp_section'        =>  'paneladmin/myaccount_view.php',
            'tlp_title'          =>  TITLE_INDEX,
            'tlp_title_section'  => "Mi Cuenta"
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
            'tlp_script'    =>  array('plugins_validator', 'class_account'),
            'info'          =>  $this->users_model->get_info(array('username'=>$this->session->userdata('username')))
        ));
        $this->load->view('template_paneladmin_view', $this->_data);
    }

    public function save(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $res = $this->users_model->save();
            $this->session->set_flashdata('status', $res ? "success" : "error");
            redirect('/paneladmin/myaccount/');
        }
    }

    /* AJAX FUNCTIONS
     **************************************************************************/
    public function ajax_check_pass(){
        if( $_SERVER['REQUEST_METHOD']=="POST" && $_POST['txtPassOld'] ){
            $this->load->library('encpss');
            $res = $this->users_model->get_info(array('username'=>$this->session->userdata('username')));
            echo json_encode($this->encpss->decode($res['password'])==trim($_POST['txtPassOld']));
        }
    }

    /* PRIVATE FUNCTIONS
     **************************************************************************/
}

?>