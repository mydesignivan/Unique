<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Index extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        if( !$this->session->userdata('logged_in') || !is_numeric($this->session->userdata('bodas_id')) ) redirect($this->config->item('base_url'));

        $this->load->model('bodas_model');

        $this->load->library('dataview', array(
            'tlp_section'          =>  'paneluser/bodas_view.php',
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
        $this->load->model("contents_model");
        $info = $this->bodas_model->get_info($this->session->userdata('bodas_id'));

        $this->_data = $this->dataview->set_data(array(
            'tlp_script'         => array("plugins_validator", "plugins_formatnumber", "plugins_galleriffic", "class_bodas", "class_bodas_gallery"),
            'tlp_title_section'  => "Bodas",
            'info'               => $info,
            'content_footer'     => $this->contents_model->get_content('footer')
        ));
        $this->load->view('template_frontpage_view', $this->_data);
    }

    public function send(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $this->load->library('email');
            
            $message = EMAIL_RSVP_MESSAGE;
            $message = str_replace('{name}', $_POST['txtNameInvitado'], $message);
            $message = str_replace('{adultos}', $_POST['txtAdultos'], $message);
            $message = str_replace('{ninios}', $_POST['txtNinio'], $message);
            $message = str_replace('{menu}', $_POST['cboMenu'], $message);
            $message = str_replace('{mail}', $_POST['txtEmail'], $message);
            $message = str_replace('{phone}', $_POST['txtPhoneCode'].$_POST['txtPhoneNum'], $message);
            $message = str_replace('{observaciones}', $_POST['txtObserv'], $message);

            //die($message);

            $this->email->from($_POST['txtEmail'], $_POST['txtNameInvitado']);
            $this->email->to(EMAIL_RSVP_TO);
            $this->email->subject(EMAIL_RSVP_SUBJECT);
            $this->email->message(nl2br($message));
            $status = $this->email->send();
            $this->session->set_flashdata('status_sendmail', $status ? "ok" : "error");

            redirect('/paneluser/');
        }
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
         switch($vista){
             case "bodas_novios_view": case "bodas_rsvp_view": case "bodas_galerias_view":
                 $this->load->helpers('form');
                 $data['info'] = $this->bodas_model->get_info($this->session->userdata('bodas_id'));
             break;

             case "bodas_dedicatorias_view":
                 $data['list'] = $this->bodas_model->get_list_dedicatoria($this->session->userdata('bodas_id'));
             break;

             case "bodas_cronicas_view":
                 $data['list'] = $this->bodas_model->get_list_cronica($this->session->userdata('bodas_id'));
             break;
         }

         $this->load->view("paneluser/ajax/$vista", $data);
    }

    public function ajax_comments_save(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            if( $_POST['type']=='dedicatoria' ){
                echo json_encode($this->bodas_model->save_dedicatoria());
            }else{
                echo json_encode($this->bodas_model->save_cronica());
            }
            die();
        }
    }
     

    /* PRIVATE FUNCTIONS
     **************************************************************************/
}