<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Galeria extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->model('galeria_model');
        $this->load->model('contents_model');

        $this->load->library('dataview', array(
            'tlp_title'            => TITLE_GALERIA,
            'tlp_meta_description' => META_DESCRIPTION_GALERIA,
            'tlp_meta_keywords'    => META_KEYWORDS_GALERIA
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
            'tlp_section'        => 'frontpage/galeria_view.php',
            'tlp_title_section'  => 'Galer&iacute;a',
            'tlp_script'         => array('plugins_galleriffic', 'class_bodas_gallery'),
            'info'               => $this->galeria_model->get_list(),
            'content_footer'     => $this->contents_model->get_content('footer')
        ));
        $this->load->view('template_frontpage_view', $this->_data);
    }


    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/

}