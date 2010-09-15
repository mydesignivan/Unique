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

         $order = @$_POST['cboOrder'];
         $json = json_decode($_POST['json']);
         $gallery = $json->gallery;
         $reference = normalize($_POST['txtName']);

         $data = array(
            'users_id' => $_POST['users_id'],
            'nombre_novio' => $_POST['txtName'],
            'nombre_novia'     => $reference,
            'historia_novia'   => $_POST['txtDescription'],
            'imagen_novia'   => $_POST['txtDescription'],
            'imagen_novia_width'       => $_POST['txtContent'],
            'imagen_novia_height'         => $_POST['txtColor'],
            'historia_novio'   => $_POST['txtDescription'],
            'imagen_novio'   => $_POST['txtDescription'],
            'imagen_novio_width'       => $_POST['txtContent'],
            'imagen_novio_height'         => $_POST['txtColor'],
            'historia_novios'   => $_POST['txtDescription'],
            'imagen_novios'   => $_POST['txtDescription'],
            'imagen_novios_width'       => $_POST['txtContent'],
            'imagen_novios_height'         => $_POST['txtColor'],
            'google_maps_salon'    => $json->image_thumb->filename_image,
            'google_maps_iglesia'   => $json->image_thumb->thumb_width,
            'fecha_evento'  => $json->image_thumb->thumb_height,

         );

         $this->db->trans_start(); // INICIO TRANSACCION

         if( $this->db->insert(TBL_BODAS, $data) ){
            $id = $this->db->insert_id();

            //Copia la imagen del producto
            if( !@copy($json->image_thumb->href_image_full, UPLOAD_PATH_PRODUCTS.$json->image_thumb->filename_image) ) return false;
            
            if( !$this->_copy_images($gallery->images_new, $id) ) return false;

         }else return false;

         $this->_delete_images_tmp(); //Elimina todas las imagenes temporales

         $this->db->trans_complete(); // COMPLETO LA TRANSACCION
         
         return true;
     }

     public function edit(){
         $order = @$_POST['cboOrder'];
         $json = json_decode($_POST['json']);
         $gallery = $json->gallery;
         $reference = normalize($_POST['txtName']);
         $products_id = $_POST['products_id'];

         $data = array(
            'products_name'  => $_POST['txtName'],
            'reference'      => $reference,
            'description'    => $_POST['txtDescription'],
            'content'        => $_POST['txtContent'],
            'color'          => $_POST['txtColor'],
            'last_modified'  => date('Y-m-d H:i:s')
         );

         if( $json->image_thumb ){
            $data['image_name'] = $json->image_thumb->filename_image;
            $data['image_width'] = $json->image_thumb->thumb_width;
            $data['image_height'] = $json->image_thumb->thumb_height;
         }

         // Esto es para cambiar el orden
         /*if( $_POST['cboOrder']!=0 ){
             $this->db->select('products_id');
             $row = $this->db->get_where(TBL_PRODUCTS, array('order'=>$_POST['cboOrder']))->row_array();
             $id = $row['products_id'];

             if( $_POST['products_id']<$id ){
                 $between = 'BETWEEN '.$_POST['products_id'].' AND '.$id;
             }else{
                 $between = 'BETWEEN '.$id.' AND '.$_POST['products_id'];
             }
             $arr = $this->db->query('SELECT products_id FROM '.TBL_PRODUCTS.' WHERE products_id '.$between)->result_array();

             print_array($arr);
             echo "<br><br>";

            for( $n=0; $n<=count($arr)-1; $n++ ){
                if( $arr[$n]['products_id']==$id ){
                    $key1 = $n;
                }
                if( $arr[$n]['products_id']==$_POST['products_id'] ){
                    $val = $arr[$n];
                    $key2 = $n+1;
                }
            }

            array_insert($arr, $val, $key1);
            //unset($arr[$key2]);
             print_array($arr, true);
            
             $n=$_POST['cboOrder'];
             foreach( $arr as $row ){
                 $this->db->where('products_id', $row['products_id']);
                 $this->db->update(TBL_PRODUCTS, array('order'=>$n));
                 $n++;
             }
         }*/
         //-----


         $this->db->trans_start(); // INICIO TRANSACCION

         $this->db->where('products_id', $products_id);
         if( $this->db->update(TBL_PRODUCTS, $data) ){

            //Copia la imagen del producto
            if( $json->image_thumb ){
                @unlink($_POST['image_old']);
                if( !@copy($json->image_thumb->href_image_full, UPLOAD_PATH_PRODUCTS.$json->image_thumb->filename_image) ) return false;
            }

            //Copia las nuevas imagenes de la galeria
            if( count($gallery->images_new)>0 ){
                if( !$this->_copy_images($gallery->images_new, $products_id) ) return false;
            }
         }else return false;

         $this->_delete_images_tmp(); //Elimina todas las imagenes temporales

        // Elimina las imagenes quitadas
         if( count($gallery->images_del)>0 ){
            foreach( $gallery->images_del as $row ){

                if( $this->db->delete(TBL_GALLERY, array('image'=>$row->image_full)) ){
                    @unlink(UPLOAD_PATH_GALLERY . $row->image_full);
                    @unlink(UPLOAD_PATH_GALLERY . $row->image_thumb);
                }else return false;
            }
         }

        // Reordena los thumbs
        foreach( $gallery->images_order as $row ){
            $this->db->where('image', $row->image_full);
            $this->db->update(TBL_GALLERY, array('order' => $row->order));
        }

         $this->db->trans_complete(); // COMPLETO LA TRANSACCION

         return true;
     }

     public function delete($id){
         $info = $this->get_info($id);

         if( $this->db->delete(TBL_PRODUCTS, array('products_id'=>$id)) && $this->db->delete(TBL_GALLERY, array('products_id'=>$id)) ){
             @unlink(UPLOAD_PATH_PRODUCTS . $info['image_name']);

             foreach( $info['gallery'] as $row ){
                @unlink(UPLOAD_PATH_GALLERY . $row['image']);
                @unlink(UPLOAD_PATH_GALLERY . $row['thumb']);
             }
         }else return false;
         return true;
     }

     public function get_list(){
         $this->db->select('bodas_id, nombre_novia, nombre_novio, fecha_evento');
         $this->db->order_by('nombre_novia', 'asc');
         return $this->db->get_where(TBL_BODAS);
     }

     public function get_list2(){
         $this->db->order_by('order', 'asc');
         return $this->db->get_where(TBL_BODAS);
     }

     public function get_info($id){
         if( is_numeric($id) ){
             $where = array('bodas_id'=>$id);
         }else{
             $where = array('reference'=>$id);
         }

         $query = $this->db->get_where(TBL_BODAS, $where);

         if( $query->num_rows==0 ) return false;
         else{
             $info = $query->row_array();
            return $info;
         }
     }

     public function get_info2($ref){
         $this->db->select('content, products_name');
         return $this->db->get_where(TBL_PRODUCTS, array('reference'=>$ref))->row_array();
     }

     public function get_list_productsorder($id){
         $this->db->select('products_name, order');
         if( is_numeric($id) ) $this->db->where('products_id !=', $id);
         $this->db->order_by('order', 'asc');
         $query = $this->db->get_where(TBL_PRODUCTS);
         if( $query->num_rows==0 ) return false;
         else{
             return $query->result_array();
         }
     }

     public function get_list_productsname($ref){
         $this->db->select('products_name, reference, color');
         $this->db->where('reference !=', $ref);
         $this->db->order_by('order', 'asc');
         return $this->db->get_where(TBL_PRODUCTS)->result_array();
     }

    public function order(){
        $initorder = $_POST['initorder'];
        $rows = json_decode($_POST['rows']);

        $res = $this->db->query('SELECT `order` FROM '.TBL_PRODUCTS.' WHERE products_id='.$initorder)->row_array();
        $order = $res['order'];

        //print_array($rows, true);
        foreach( $rows as $row ){
            $id = substr($row, 2);
            $this->db->where('products_id', $id);
            if( !$this->db->update(TBL_PRODUCTS, array('order' => $order)) ) return false;
            $order++;
        }
        
        return true;
    }

    /* PUBLIC FUNCTIONS (LLAMADAS POR AJAX)
     **************************************************************************/
     public function check_exists($name, $id){
         $where = !is_numeric($id) ? array('products_name'=>$name) : array('products_id !='=>$id, 'products_name'=>$name);
         return $this->db->get_where(TBL_PRODUCTS, $where)->num_rows>0;
     }

    /* PRIVATE FUNCTIONS
     **************************************************************************/
    private function _get_num_order($tbl_name){
        $this->db->select_max('`order`');
        $row = $this->db->get($tbl_name)->row_array();
        return is_null($row['order']) ? 1 : $row['order']+1;
    }

    private function _delete_images_tmp(){
        // Elimina archivos temporales de la galeria
        $dir = UPLOAD_PATH_GALLERY.".tmp/";
        $d = opendir($dir);
        while( $file = readdir($d) ){
            if( $file!="." AND $file!=".."  ){
                if( preg_replace('/_.*$/', '', $file)==$this->session->userdata('users_id') )
                    @unlink($dir.$file);
            }
        }
        // Elimina archivos temporales de los productos
        $dir = UPLOAD_PATH_PRODUCTS.".tmp/";
        $d = opendir($dir);
        while( $file = readdir($d) ){
            if( $file!="." AND $file!=".." ){
                if( preg_replace('/_.*$/', '', $file)==$this->session->userdata('users_id') )
                    @unlink($dir.$file);
            }
        }
    }

    private function _copy_images($json, $id){
        $n=0;
        foreach( $json as $row ){
            $n++;
            $cp1 = @copy(UPLOAD_PATH_GALLERY.".tmp/".$row->image_full, UPLOAD_PATH_GALLERY . $row->image_full);
            $cp2 = @copy(UPLOAD_PATH_GALLERY.".tmp/".$row->image_thumb, UPLOAD_PATH_GALLERY . $row->image_thumb);

            if( $cp1 && $cp2 ){
                $data = array(
                    'products_id' => $id,
                    'image'       => $row->image_full,
                    'thumb'       => $row->image_thumb,
                    'width'       => $row->width,
                    'height'      => $row->height
                );

                if( !is_numeric($_POST['products_id']) ) $data['order'] = $n;
                if( !$this->db->insert(TBL_GALLERY, $data) ) return false;
            }else return false;
        }

        return true;
    }
    
}
?>