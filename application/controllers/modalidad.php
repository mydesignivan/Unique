<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Modalidad extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->model('users_model');
        $this->load->model('contents_model');

        $this->load->library('dataview', array(
            'tlp_title'            => TITLE_MODALIDAD,
            'tlp_meta_description' => META_DESCRIPTION_MODALIDAD,
            'tlp_meta_keywords'    => META_KEYWORDS_MODALIDAD
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
            'tlp_section'        => 'frontpage/modalidad_view.php',
            'tlp_title_section'  => 'Modalidad',
            'content'            => $this->contents_model->get_content('modalidad'),
            'content_footer'     => $this->contents_model->get_content('footer')
        ));
        $this->load->view('template_frontpage_view', $this->_data);
    }


    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/

}