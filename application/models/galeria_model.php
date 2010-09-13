<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Galeria_model extends Model {

    /* CONSTRUCTOR
     **************************************************************************/
    function  __construct() {
        parent::Model();
    }

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function save(){
        $data = array(
            'content'       => $_POST['content'],
            'last_modified' => date('Y-m-d H:i:s')
        );

        $this->db->where('reference', $_POST['reference']);
        return $this->db->update(TBL_CONTENTS, $data);
    }

    public function get_list(){
        $this->db->order_by('order', 'asc');
        return $this->db->get_where(TBL_GALLERY)->result_array();
    }
    
}
?>