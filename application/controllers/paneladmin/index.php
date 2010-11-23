<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Index extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->library("simplelogin");
        $this->load->library('dataview', array(
            'tlp_section'        =>  'paneladmin/login_view.php',
            'tlp_title'          =>  TITLE_INDEX,
            'tlp_title_section'  => "Panel Admin - Iniciar Sesi&oacute;n"
        ));
        $this->_data = $this->dataview->get_data();
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/
    private $_data;

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        //die($this->encpss->decode('A2YFbw1zWyZRcwlhBzQFaQIEDB0='));
        if( $this->session->userdata('logged_in') && $this->session->userdata('level')==1 ) {
            redirect('/paneladmin/myaccount/');
        }else{
            $this->load->view('template_paneladmin_view', $this->_data);
        }
    }

    public function login(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $statusLogin = $this->simplelogin->login($_POST["txtUser"], $_POST["txtPass"]);
            
            if( $statusLogin['status']=="error" ){
                if( $statusLogin['error']=="loginfaild" ){
                    $message = "El usuario y/o password son incorrectos.";
                }
                $this->session->set_flashdata('message_login', $message);
                redirect('/panel/');

            }else{
                redirect('/paneladmin/myaccount/');
            }
        }
    }

    public function logout(){
        $this->simplelogin->logout();
        redirect($this->config->item('base_url'));
    }


    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/
}