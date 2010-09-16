<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Bodas extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        if( !$this->session->userdata('logged_in') ) redirect($this->config->item('base_url'));
        
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
       //     'tlp_script'         =>  array('plugins_jqui_sortable', 'helpers_json', 'class_products_list'),
            'tlp_section'        =>  'paneladmin/bodas_list_view.php',
            'listBodas'          =>  $this->bodas_model->get_list()
        ));
        $this->load->view('template_frontpage_view', $this->_data);
    }

    public function form(){
        $id = $this->uri->segment(4);
        $this->load->helper('form');

        $data = array(
            'tlp_section' =>  'paneladmin/bodas_form_view.php',
            'tlp_script'  =>  array('plugins_validator', 'plugins_fancybox', 'helpers_json', 'class_bodas_form')
        );

        if( is_numeric($id) ){ // Edit
            $data['tlp_title_section'] = "Editar Boda";
            $data['info'] = $this->bodas_model->get_info($id);

        }else{  // New
            $data['tlp_title_section'] = "Agregar Boda";
        }
        
        $this->_data = $this->dataview->set_data($data);
        $this->load->view('template_frontpage_view', $this->_data);
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
            $res = $this->products_model->edit();
            $this->session->set_flashdata('status', $res ? "success" : "error");
            redirect('/panel/products/form/'.$_POST['products_id']);
        }
    }

    public function delete(){
        if( is_numeric($this->uri->segment(4)) ){
            if( !$this->bodas_model->delete($this->uri->segment(4)) ){
                $this->session->set_flashdata('status', 'error');
                $this->session->set_flashdata('message', 'No se pudo eliminar la boda.');
            }
            redirect('/panel/products/');
        }
    }



    /* AJAX FUNCTIONS
     **************************************************************************/
    public function ajax_upload_bodas(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $opcion=$this->input->post("opcion");
            $txt=$this->input->post("txt");
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





    /* PRIVATE FUNCTIONS
     **************************************************************************/
}