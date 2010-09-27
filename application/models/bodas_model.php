<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Bodas_model extends Model {

    /* CONSTRUCTOR
     **************************************************************************/
    function  __construct() {
        parent::Model();
    }

    /* PUBLIC FUNCTIONS
     **************************************************************************/
     public function create(){

         $this->load->library('encpss');

         $json = json_decode($_POST['json']);
         $gallery = $json->gallery;

         //print_array($gallery, true);

         $data = array(
            'username'  =>  $_POST['txtUsuario'],
            'password'  =>  $this->encpss->encode($_POST['txtPass']),
            'nombre_novio' => $_POST['txtNombreNovio'],
            'apellido_novio' => $_POST['txtApellidoNovio'],
            'nombre_novia' => $_POST['txtNombreNovia'],
            'apellido_novia' => $_POST['txtApellidoNovia'],
            'historia_novia' => $_POST['txtHistNovia'],
            'imagen_novia' => $json->txtImageNovia->filename_image,
            'imagen_novia_width' => $json->txtImageNovia->thumb_width,
            'imagen_novia_height' => $json->txtImageNovia->thumb_height,
            'historia_novio' => $_POST['txtHistNovios'],
            'imagen_novio' => $json->txtImageNovio->filename_image,
            'imagen_novio_width' => $json->txtImageNovio->thumb_width,
            'imagen_novio_height' => $json->txtImageNovio->thumb_height,
            'historia_novios' => $_POST['txtHistNovios'],
            'imagen_novios' => $json->txtImageNovios->filename_image,
            'imagen_novios_width' => $json->txtImageNovios->thumb_width,
            'imagen_novios_height' => $json->txtImageNovios->thumb_height,
            'google_maps_salon' => $_POST['txtUbiSalon'],
            'google_maps_iglesia' => $_POST['txtUbiIglesia'],
            'nombre_salon' => $_POST['txtNombreSalon'],
            'nombre_iglesia' => $_POST['txtNombreIglesia'],
            'order' => $this->_get_num_order(TBL_BODAS),
            'date_added' => date('Y-m-d H:i:s')
        );

         $this->db->trans_start(); // INICIO TRANSACCION

         if( $this->db->insert(TBL_BODAS, $data) ){
            $id = $this->db->insert_id();

            if( !$this->_insert_menus($json, $id) ) return false;
            if( !$this->_insert_regalos($json, $id) ) return false;

            //Copia las imagenes del novio, novia y pareja
            if( !@copy(urldecode($json->txtImageNovios->href_image_full), UPLOAD_PATH_PAREJA . urldecode($json->txtImageNovios->filename_image)) ) return false;
            if( !@copy(urldecode($json->txtImageNovia->href_image_full), UPLOAD_PATH_NOVIA . urldecode($json->txtImageNovia->filename_image)) ) return false;
            if( !@copy(urldecode($json->txtImageNovio->href_image_full), UPLOAD_PATH_NOVIO . urldecode($json->txtImageNovio->filename_image)) ) return false;
            
            //Copia las nuevas imagenes de la galeria
            if( !$this->_copy_images($gallery->images_new, $id) ) return false;

         }else return false;

         $this->_delete_images_tmp(); //Elimina todas las imagenes temporales

         $this->db->trans_complete(); // COMPLETO LA TRANSACCION*/
         
         return true;
     }

     public function edit(){
        $this->load->library('encpss');

        $json = json_decode($_POST['json']);
        $gallery = $json->gallery;
        
        //print_array($_POST, true);

        $bodas_id = $_POST['bodas_id'];

         $data = array(
            'username' => $_POST['txtUsuario'],
            'password' => $this->encpss->encode($_POST['txtPass']),
            'nombre_novio' => $_POST['txtNombreNovio'],
            'apellido_novio' => $_POST['txtApellidoNovio'],
            'nombre_novia' => $_POST['txtNombreNovia'],
            'apellido_novia' => $_POST['txtApellidoNovia'],
            'historia_novia' => $_POST['txtHistNovia'],
            'historia_novio' => $_POST['txtHistNovios'],
            'historia_novios' => $_POST['txtHistNovios'],
            'google_maps_salon' => $_POST['txtUbiSalon'],
            'google_maps_iglesia' => $_POST['txtUbiIglesia'],
            'nombre_salon' => $_POST['txtNombreSalon'],
            'nombre_iglesia' => $_POST['txtNombreIglesia'],
            'last_modified' => date('Y-m-d H:i:s')
        );

        if( isset($json->txtImageNovia->filename_image)){
            $data['imagen_novia'] = $json->txtImageNovia->filename_image;
            $data['imagen_novia_width'] = $json->txtImageNovia->thumb_width;
            $data['imagen_novia_height'] = $json->txtImageNovia->thumb_height;
            @unlink(urldecode($_POST['image_old_novia']));
            if( !@copy(urldecode($json->txtImageNovia->href_image_full), UPLOAD_PATH_NOVIA.urldecode($json->txtImageNovia->filename_image)) ) return false;
        }

        if( isset($json->txtImageNovio->filename_image )){
            $data['imagen_novio'] = $json->txtImageNovio->filename_image;
            $data['imagen_novio_width'] = $json->txtImageNovio->thumb_width;
            $data['imagen_novio_height'] = $json->txtImageNovio->thumb_height;
            @unlink(urldecode($_POST['image_old_novio']));
            if( !@copy(urldecode($json->txtImageNovio->href_image_full), UPLOAD_PATH_NOVIO.urldecode($json->txtImageNovio->filename_image)) ) return false;
        }

        if( isset($json->txtImageNovios->filename_image )){
            $data['imagen_novios'] = $json->txtImageNovios->filename_image;
            $data['imagen_novios_width'] = $json->txtImageNovios->thumb_width;
            $data['imagen_novios_height'] = $json->txtImageNovios->thumb_height;
            @unlink(urldecode($_POST['image_old_novios']));
            if( !@copy(urldecode($json->txtImageNovios->href_image_full), UPLOAD_PATH_PAREJA.urldecode($json->txtImageNovios->filename_image))) return false;
        }

         $this->db->trans_start();  // INICIO TRANSACCION
         $this->db->where('bodas_id', $bodas_id);
         if( $this->db->update(TBL_BODAS, $data) ){

            $this->db->delete(TBL_MENU, array("bodas_id" => $bodas_id));
            $this->db->delete(TBL_REGALOS, array("bodas_id" => $bodas_id));
            if( !$this->_insert_menus($json, $bodas_id) ) return false;
            if( !$this->_insert_regalos($json, $bodas_id) ) return false;

            //Copia las nuevas imagenes de la galeria
            if( !$this->_copy_images($gallery->images_new, $bodas_id) ) return false;

            // Elimina las imagenes quitadas
            if( isset($gallery->images_del)){
                foreach( $gallery->images_del as $row ){
                    if( $this->db->delete(TBL_BODAS_GALLERY, array('image'=>$row->image_full)) ){
                        @unlink(UPLOAD_PATH_GALLERY_BODAS . $row->image_full);
                        @unlink(UPLOAD_PATH_GALLERY_BODAS . $row->image_thumb);
                    }else return false;
                }
             }
             
            // Reordena los thumbs
            if( isset($gallery->images_order) ){
                foreach( $gallery->images_order as $row ){
                    $this->db->where('image', $row->image_full);
                    $this->db->update(TBL_BODAS_GALLERY, array('order' => $row->order));
                }
            }

        }

        $this->_delete_images_tmp(); //Elimina todas las imagenes temporales

        $this->db->trans_complete(); // COMPLETO LA TRANSACCION
        
        return true;
     }

     public function delete($id_array){

         if (is_array($id_array)){
            foreach($id_array as $id){
                $info = $this->get_info($id);
                $where = array('bodas_id'=>$id);

                if( $this->db->delete(TBL_BODAS, $where) && $this->db->delete(TBL_MENU, $where) && $this->db->delete(TBL_REGALOS, $where) && $this->db->delete(TBL_BODAS_GALLERY, $where) ){

                     @unlink(UPLOAD_PATH_NOVIA . urldecode($info['imagen_novia']));
                     @unlink(UPLOAD_PATH_NOVIO . urldecode($info['imagen_novio']));
                     @unlink(UPLOAD_PATH_PAREJA .urldecode($info['imagen_novios']));

                     foreach( $info['gallery'] as $row ){
                        @unlink(UPLOAD_PATH_GALLERY_BODAS . $row['image']);
                        @unlink(UPLOAD_PATH_GALLERY_BODAS . $row['thumb']);
                     }

                }else return false;
            }

         }else return false;

         return true;
     }

     public function get_list(){
         $this->db->order_by('order', 'asc');
         return $this->db->get_where(TBL_BODAS);
     }

     public function get_info($id){
         $this->load->library("encpss");

         $where=array('bodas_id'=>$id);

         $info = $this->db->get_where(TBL_BODAS, $where)->row_array();

         $info['password'] = $this->encpss->decode($info['password']);

         $this->db->select("regalo, regalo_id");
         $info['regalos'] = $this->db->get_where(TBL_REGALOS, $where)->result_array();

         $this->db->select("menu, menu_id");
         $info['menus'] = $this->db->get_where(TBL_MENU, $where)->result_array();

         $info['gallery'] = $this->db->get_where(TBL_BODAS_GALLERY, $where)->result_array();

         return $info;
     }

    public function order(){
        $initorder = $_POST['initorder'];
        $rows = json_decode($_POST['rows']);

        $res = $this->db->query('SELECT `order` FROM '.TBL_BODAS.' WHERE bodas_id='.$initorder)->row_array();
        $order = $res['order'];

        //print_array($rows, true);
        foreach( $rows as $row ){
            $id = substr($row, 2);
            $this->db->where('bodas_id', $id);
            if( !$this->db->update(TBL_BODAS, array('order' => $order)) ) return false;
            $order++;
        }

        return true;
    }

    public function save_dedicatoria(){
        $data = array(
            'bodas_id'    => $this->session->userdata('bodas_id'),
            'name' => $_POST['txtNameDedicatoria'],
            'dedicatoria' => $_POST['txtDedicatoria']
        );
        return $this->db->insert(TBL_DEDICATORIAS, $data);
    }

    public function get_list_dedicatoria($id){
        $this->db->select(TBL_BODAS.'.username, '.TBL_DEDICATORIAS.'.*');
        $this->db->join(TBL_BODAS, TBL_DEDICATORIAS.'.bodas_id='.TBL_BODAS.'.bodas_id');
        $this->db->order_by(TBL_DEDICATORIAS.'.id', 'desc');
        return $this->db->get_where(TBL_DEDICATORIAS, array(TBL_DEDICATORIAS.'.bodas_id' => $id))->result_array();
    }

    public function save_cronica(){
        $data = array(
            'bodas_id'    => $this->session->userdata('bodas_id'),
            'name' => $_POST['txtNameCronica'],
            'cronica'     => $_POST['txtCronica']
        );
        return $this->db->insert(TBL_CRONICA, $data);
    }

    public function get_list_cronica($id){
        $this->db->select(TBL_BODAS.'.username, '.TBL_CRONICA.'.*');
        $this->db->join(TBL_BODAS, TBL_CRONICA.'.bodas_id='.TBL_BODAS.'.bodas_id');
        $this->db->order_by(TBL_CRONICA.'.id', 'desc');
        return $this->db->get_where(TBL_CRONICA, array(TBL_CRONICA.'.bodas_id' => $id))->result_array();
    }



    /* PUBLIC FUNCTIONS (LLAMADAS POR AJAX)
     **************************************************************************/
     public function check_exists($v, $id){
         $where = $id==0 ? array('username'=>$v) : array('bodas_id !='=>$id, 'username'=>$v);
         return $this->db->get_where(TBL_BODAS, $where)->num_rows>0;
     }

     public function comments_delete($comment_array_id, $tabla){
  //       $this->db->where_in('id', $id);
         foreach($comment_array_id as $comment_id){
            $this->db->delete($tabla, array("id"=>$comment_id));
         }
         return true;
     }


    /* PRIVATE FUNCTIONS
     **************************************************************************/
    private function _delete_images_tmp(){
        $dir = UPLOAD_PATH_BODAS;
        $d = opendir($dir);
        while( $file = readdir($d) ){
            if( $file!="." AND $file!=".." ){
                if( preg_replace('/_.*$/', '', $file)==$this->session->userdata('users_id') )
                    @unlink($dir.$file);
            }
        }

        $dir = UPLOAD_PATH_GALLERY_BODAS.".tmp/";
        $d = opendir($dir);
        while( $file = readdir($d) ){
            if( $file!="." AND $file!=".." ){
                if( preg_replace('/_.*$/', '', $file)==$this->session->userdata('users_id') )
                    @unlink($dir.$file);
            }
        }
    }

    private function _copy_images($arr, $id){
        $n=0;
        foreach( $arr as $row ){
            $n++;
            $cp1 = @copy(UPLOAD_PATH_GALLERY_BODAS.".tmp/".urldecode($row->image_full), UPLOAD_PATH_GALLERY_BODAS . urldecode($row->image_full));
            $cp2 = @copy(UPLOAD_PATH_GALLERY_BODAS.".tmp/".urldecode($row->image_thumb), UPLOAD_PATH_GALLERY_BODAS . urldecode($row->image_thumb));

            if( $cp1 && $cp2 ){
                $data = array(
                    'bodas_id'      => $id,
                    'image'         => urldecode($row->image_full),
                    'thumb'         => urldecode($row->image_thumb),
                    'width'         => $row->width,
                    'height'        => $row->height,
                    'last_modified' => date('Y-m-d H:i:s')
                );

                if( $id==0 ) $data['order'] = $n;
                if( !$this->db->insert(TBL_BODAS_GALLERY, $data) ) return false;
            }else return false;
        }

        return true;
    }

    private function _insert_regalos($json, $id){
        foreach($json->regalos as $regalo){
             $data = array(
                'bodas_id' => $id,
                'regalo' => $regalo
              );
              if( !$this->db->insert(TBL_REGALOS, $data) ) return false;
        };
        return true;
    }

    private function _insert_menus($json, $id){
        foreach($json->menus as $menu){
            $data = array(
                'bodas_id' => $id,
                'menu' => $menu
            );
            if( !$this->db->insert(TBL_MENU, $data) ) return false;
        }
        return true;
    }

    private function _get_num_order($tbl_name){
        $this->db->select_max('`order`');
        $row = $this->db->get($tbl_name)->row_array();
        return is_null($row['order']) ? 1 : $row['order']+1;
    }

}
?>