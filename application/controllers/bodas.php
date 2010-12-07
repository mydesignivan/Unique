<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Bodas extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        if( $this->session->userdata('logged_in') && is_numeric($this->session->userdata('bodas_id')) ) redirect('/paneluser/');

        $this->load->model('contents_model');
        $this->load->model('bodas_model');

        $this->load->library('dataview', array(
            'tlp_title'            => TITLE_BODAS,
            'tlp_meta_description' => META_DESCRIPTION_BODAS,
            'tlp_meta_keywords'    => META_KEYWORDS_BODAS
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
            'tlp_section'        => 'frontpage/bodas_view.php',
            'tlp_title_section'  => 'Bodas',
            'tlp_script'         => array('plugins_simplemodal', 'class_bodas'),
            'content'            => $this->contents_model->get_content('bodas'),
            'content_footer'     => $this->contents_model->get_content('footer'),
            'listBodas'          => $this->bodas_model->get_list()
        ));
        $this->load->view('template_frontpage_view', $this->_data);
    }

    public function login(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $this->load->library("simplelogin", array('table'=>TBL_BODAS));
            $statusLogin = $this->simplelogin->login($this->input->post("txtUser"), $this->input->post("txtPass"));

            $ret = array('status'=>'ok');
            if( $statusLogin['status']=="error" ){
                $ret['status'] = 'error';
                $ret['message'] = "El usuario y/o password son incorrectos.";
            }

            die(json_encode($ret));
        }
    }


    /* AJAX FUNCTIONS
     **************************************************************************/
    public function ajax_showpopup(){
        $this->load->view('frontpage/ajax/login_view');
    }

    /* PRIVATE FUNCTIONS
     **************************************************************************/

}