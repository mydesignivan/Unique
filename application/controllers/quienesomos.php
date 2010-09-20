<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Quienesomos extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->model('users_model');
        $this->load->model('contents_model');

        $this->load->library('dataview', array(
            'tlp_title'            => TITLE_QUIENESOMOS,
            'tlp_meta_description' => META_DESCRIPTION_QUIENESOMOS,
            'tlp_meta_keywords'    => META_KEYWORDS_QUIENESOMOS
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
            'tlp_section'        => 'frontpage/quienesomos_view.php',
            'tlp_title_section'  => '¿Quienes Somos?',
            'content'            => $this->contents_model->get_content('quienes-somos'),
            'content_footer'     => $this->contents_model->get_content('footer')
        ));
        $this->load->view('template_frontpage_view', $this->_data);
    }


    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/

}