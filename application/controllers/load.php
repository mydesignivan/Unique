<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Load extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->helper('file');

        $this->_uri = $this->uri->segment_array();
        unset($this->_uri[1]);
        unset($this->_uri[2]);
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/
    private $_uri;

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        redirect($this->config->item('base_url'));
    }

    public function js(){
        header('Content-Type: text/javascript');
        $_modejs=true;
        foreach ( $this->_uri as $filename ){
            $script_js = array();
            require('./js/includes/'.$filename.'_inc.php');

            foreach ( $script_js as $val ){
                if( $val=="global" ) {
                    $indexphp = index_page();
                    if( !empty($indexphp) ) $indexphp.="/";
                    echo 'var baseURI = document.getElementsByTagName("base")[0].getAttribute("href")+"'.$indexphp.'";';
                }
                echo read_file('./js/'.$val.".js");
            }
        }
    }

    public function css(){
        header('Content-Type: text/css');

        foreach ( $this->_uri as $filename ){
            $filename = str_replace(":", "/", $filename);
            echo read_file('./css/'.$filename.".css");
        }
    }

    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/

}