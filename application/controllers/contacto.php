<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Contacto extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->model('users_model');
        $this->load->model('contents_model');

        $this->load->library('dataview', array(
            'tlp_title'            => TITLE_CONTACTO,
            'tlp_meta_description' => META_DESCRIPTION_CONTACTO,
            'tlp_meta_keywords'    => META_KEYWORDS_CONTACTO
        ));
        $this->_data = $this->dataview->get_data();
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/
    private $_data;

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        $this->load->library('encpss');
        $this->_data = $this->dataview->set_data(array(
            'tlp_section'        => 'frontpage/contacto_view.php',
            'tlp_title_section'  => 'Contacto',
            'tlp_script'         => array('plugins_validator', 'plugins_jqui-datepicker', 'class_account'),
            'content'            => $this->contents_model->get_content('contacto')
        ));
        $this->load->view('template_frontpage_view', $this->_data);
    }

    public function send(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $this->load->library('email');

            $message = EMAIL_CONTACT_MESSAGE;
            $message = str_replace('{name_novia}', $_POST['txtNameNovia'], $message);
            $message = str_replace('{name_novio}', $_POST['txtNameNovio'], $message);
            $message = str_replace('{lugar}', $_POST['txtLugar'], $message);
            $message = str_replace('{fecha}', $_POST['txtDate'], $message);
            $message = str_replace('{mail}', $_POST['txtEmail'], $message);
            $message = str_replace('{phone}', $_POST['txtPhoneCode'].$_POST['txtPhoneNum'], $message);
            $message = str_replace('{message}', $_POST['txtConsult'], $message);


            $datauser = $this->users_model->get_info(array('username'=>'admin'));
            $to = $datauser['email'];
            /*echo $datauser."<br>";
            echo $to."<br>";
            echo $message."<br>";*/

            $this->email->from($_POST['txtEmail'], $_POST['txtNameNovia'].", ".$_POST['txtNameNovio']);
            $this->email->to($to);
            $this->email->subject(EMAIL_CONTACT_SUBJECT);
            $this->email->message(nl2br($message));
            $status = $this->email->send();
            $this->session->set_flashdata('status_sendmail', $status ? "ok" : "error");

            redirect('/contacto/');
        }
    }

    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/

}