<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Bodas extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        if( $this->session->userdata('logged_in') && $this->session->userdata('level')==0 ) redirect('/paneluser/');

        $this->load->model('users_model');
        $this->load->model('contents_model');

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
            'content'            => $this->contents_model->get_content('bodas')
        ));
        $this->load->view('template_frontpage_view', $this->_data);
    }

    public function login(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $this->load->library("simplelogin");
            $statusLogin = $this->simplelogin->login($_POST["txtUser"], $_POST["txtPass"], 0);

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
        if( $this->session->userdata('logged_in') && $this->session->userdata('level')==0 ){
            die("logged_in");
        }else{
            $id = $this->uri->segment(3);
            $this->load->view('frontpage/ajax/login_view', array('id'=>$id));            
        }
    }

    /* PRIVATE FUNCTIONS
     **************************************************************************/

}