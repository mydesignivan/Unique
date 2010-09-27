<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Bodas extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        if( !$this->session->userdata('logged_in') || !is_numeric($this->session->userdata('users_id')) ) redirect($this->config->item('base_url'));
        
        $this->load->model("bodas_model");

        $this->load->library('dataview', array(
            'tlp_title'  =>  TITLE_INDEX
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
            'tlp_title_section'  => "Bodas",
            'tlp_script'         =>  array('plugins_jqui_sortable', 'helpers_json', 'class_bodas_list'),
            'tlp_section'        =>  'paneladmin/bodas_list_view.php',
            'listBodas'          =>  $this->bodas_model->get_list()
        ));
        $this->load->view('template_paneladmin_view', $this->_data);
    }

    public function form(){
        $id = $this->uri->segment(4);
        $this->load->helper('form');

        $data = array(
            'tlp_section' =>  'paneladmin/bodas_form_view.php',
            'tlp_script'  =>  array('plugins_validator', 'plugins_fancybox','plugins_jqui_sortable' ,'helpers_json', 'class_bodas_form')
        );

        if( is_numeric($id) ){ // Edit
            $data['tlp_title_section'] = "Editar Boda";
            $data['info'] = $this->bodas_model->get_info($id);

        }else{  // New
            $data['tlp_title_section'] = "Agregar Boda";
        }
        
        $this->_data = $this->dataview->set_data($data);
        $this->load->view('template_paneladmin_view', $this->_data);
    }

    public function create(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $res = $this->bodas_model->create();
            if( !$res ){
                $this->session->set_flashdata('status', "error");
                redirect('/paneladmin/bodas/form/');
            }else redirect('/paneladmin/bodas/');
        }
    }

    public function edit(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $res = $this->bodas_model->edit();
            $this->session->set_flashdata('status', $res ? "success" : "error");
            redirect('/paneladmin/bodas/form/'.$_POST['bodas_id']);
        }
    }

    public function delete(){       
        if( $this->uri->segment(4) ){
            $id = $this->uri->segment_array();
            array_splice($id, 0,3);
            $res = $this->bodas_model->delete($id);

            $this->session->set_flashdata('status', $res ? "success" : "error");
            
            redirect('/paneladmin/bodas/');
        }
    }


    /* AJAX FUNCTIONS
     **************************************************************************/
    public function ajax_upload_bodas(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $opcion=$this->input->post("opcion");
            $this->load->library('superupload');

            $config = array(
                'path'          => UPLOAD_PATH_BODAS,
                'thumb_width'   => $opcion=='NOVIOS' ? IMAGE_THUMB_PAREJA_WIDTH : IMAGE_THUMB_NOVIOS_WIDTH,
                'thumb_height'  => $opcion=='NOVIOS' ? IMAGE_THUMB_PAREJA_HEIGHT : IMAGE_THUMB_NOVIOS_HEIGHT,
                'maxsize'       => UPLOAD_MAXSIZE,
                'filetype'      => UPLOAD_FILETYPE,
                'resize_image_original' => false,
                'master_dim'            => 'width',
                'filename_prefix'       => $this->session->userdata('users_id')."_"
            );
            $this->superupload->initialize($config);
            echo json_encode($this->superupload->upload(key($_FILES)));
        }        
    }

    public function ajax_upload_gallery(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){

            $this->load->library('superupload');

            $config = array(
                'path'            => UPLOAD_PATH_GALLERY_BODAS.'.tmp/',
                'thumb_width'     => IMAGE_THUMB_GALLERY_WIDTH,
                'thumb_height'    => IMAGE_THUMB_GALLERY_HEIGHT,
                'image_width'     => IMAGE_FULL_GALLERY_WIDTH,
                'image_height'    => IMAGE_FULL_GALLERY_HEIGHT,
                'maxsize'         => UPLOAD_MAXSIZE,
                'filetype'        => UPLOAD_FILETYPE,
                'filename_prefix' => $this->session->userdata('users_id')."_",
                'master_dim'      => 'height'
            );
            $this->superupload->initialize($config);
            echo json_encode($this->superupload->upload('txtUploadFile'));
            die();
        }
    }
    public function ajax_upload_delete(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            @unlink($_POST['au_filename_image']);
            @unlink($_POST['au_filename_thumb']);
            die("ok");
        }
    }

    public function ajax_check_exists(){
        if( $_SERVER['REQUEST_METHOD']=="POST" && $_POST['txtUsuario'] ){
            echo json_encode(!$this->bodas_model->check_exists($_POST['txtUsuario'], $_POST['bodas_id']));
        }
    }

    public function ajax_order(){
        die($this->bodas_model->order() ? "success" : "error");
    }

    public function ajax_popup_comments(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){

            if( $_POST['view']=="bodas_dedicatorias_view" ){
                $data = array('list' => $this->bodas_model->get_list_dedicatoria($_POST['bodas_id']));
            }else{
                $data = array('list' => $this->bodas_model->get_list_cronica($_POST['bodas_id']));
            }

            $this->load->view('paneladmin/ajax/'.$_POST['view'], $data);
        }
    }

    public function ajax_comments_del(){
        if( $this->uri->segment(4) ){
            $id = $this->uri->segment_array();
            array_splice($id, 0,3);

            $res = $this->bodas_model->comments_delete($id);
            echo $res;

            echo json_encode($res);
            die();
        }
    }




    /* PRIVATE FUNCTIONS
     **************************************************************************/
}