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

         $json = json_decode($_POST['json']);
         //$gallery = $json->gallery;
         
        $user_id=$this->session->userdata("users_id");

         $data = array(
            'google_maps_salon'=>$_POST['txtUbiSalon'],
            'google_maps_iglesia'=> $_POST['txtUbiIglesia'],
            'users_id'=> $user_id,
            'nombre_novio'=>$_POST['txtNombreNovio'],
            'apellido_novio'=>$_POST['txtApellidoNovio'],
            'nombre_novia'=> $_POST['txtNombreNovia'],
            'apellido_novia'=> $_POST['txtApellidoNovia'],
            'historia_novia'=> $_POST['txtHistNovia'],
            'imagen_novia'=> $json->txtImageNovia->filename_image,
            'imagen_novia_width'=> $json->txtImageNovia->thumb_width,
            'imagen_novia_height'=> $json->txtImageNovia->thumb_height,
            'historia_novio'=> $_POST['txtHistNovios'],
            'imagen_novio'=>$json->txtImageNovio->filename_image,
            'imagen_novio_width'=>$json->txtImageNovio->thumb_width,
            'imagen_novio_height'=>$json->txtImageNovio->thumb_height,
            'historia_novios'=>$_POST['txtHistNovios'],
            'imagen_novios'=>$json->txtImageNovios->filename_image,
            'imagen_novios_width'=>$json->txtImageNovios->thumb_width,
            'imagen_novios_height'=>$json->txtImageNovios->thumb_height,
        );


       //   print_array($data, true);

         $this->db->trans_start(); // INICIO TRANSACCION

         if( $this->db->insert(TBL_BODAS, $data) ){
            $id = $this->db->insert_id();

            //Copia la imagen de los novios
            if( !@copy($json->txtImageNovios->href_image_full, UPLOAD_PATH_NOVIOS.$json->txtImageNovios->filename_image) ) echo "error";
            if( !@copy($json->txtImageNovia->href_image_full, UPLOAD_PATH_NOVIA.$json->txtImageNovia->filename_image) )  echo "error";
            if( !@copy($json->txtImageNovio->href_image_full, UPLOAD_PATH_NOVIO.$json->txtImageNovio->filename_image) )  echo "error";
            
            //if( !$this->_copy_images($gallery->images_new, $id) ) return false;


             foreach($json->menus as $menu){
                 $data = array(
                    'bodas_id'=>$id,
                    'menu'=> $menu
                   );
                    $this->db->insert(TBL_MENU, $data);
               }

             foreach($json->regalos as $regalo){
                 $data = array(
                    'bodas_id'=>$id,
                    'regalo'=> $regalo
                   );
                   $this->db->insert(TBL_REGALOS, $data);
               };


         }else return false;

         $this->_delete_images_tmp(); //Elimina todas las imagenes temporales

         $this->db->trans_complete(); // COMPLETO LA TRANSACCION*/
         
         return true;
     }

     public function edit(){
         $bodas_id = $_POST['bodas_id'];

        $data = array(
            'google_maps_salon'=>$_POST['txtUbiSalon'],
            'google_maps_iglesia'=> $_POST['txtUbiIglesia'],
            'users_id'=> $user_id,
            'nombre_novio'=>$_POST['txtNombreNovio'],
            'apellido_novio'=>$_POST['txtApellidoNovio'],
            'nombre_novia'=> $_POST['txtNombreNovia'],
            'apellido_novia'=> $_POST['txtApellidoNovia'],
            'historia_novia'=> $_POST['txtHistNovia'],
            'imagen_novia'=> $json->txtImageNovia->filename_image,
            'imagen_novia_width'=> $json->txtImageNovia->thumb_width,
            'imagen_novia_height'=> $json->txtImageNovia->thumb_height,
            'historia_novio'=> $_POST['txtHistNovios'],
            'imagen_novio'=>$json->txtImageNovio->filename_image,
            'imagen_novio_width'=>$json->txtImageNovio->thumb_width,
            'imagen_novio_height'=>$json->txtImageNovio->thumb_height,
            'historia_novios'=>$_POST['txtHistNovios'],
            'imagen_novios'=>$json->txtImageNovios->filename_image,
            'imagen_novios_width'=>$json->txtImageNovios->thumb_width,
            'imagen_novios_height'=>$json->txtImageNovios->thumb_height,
        );

         if( $json->txtImageNovia ){
            $data['image_name'] = $json->image_thumb->filename_image;
            $data['image_width'] = $json->image_thumb->thumb_width;
            $data['image_height'] = $json->image_thumb->thumb_height;
         }

         $this->db->trans_start(); // INICIO TRANSACCION

         $this->db->where('bodas_id', $bodas_id);
         if( $this->db->update(TBL_BODAS, $data) ){

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


         $this->db->trans_complete(); // COMPLETO LA TRANSACCION

         return true;
     }

     public function delete($id){
         $info = $this->get_info($id);

         if( $this->db->delete(TBL_BODAS, array('bodas_id'=>$id))  ){
             @unlink(UPLOAD_PATH_NOVIA . $info['imagen_novia']);
             @unlink(UPLOAD_PATH_NOVIO . $info['imagen_novio']);
             @unlink(UPLOAD_PATH_NOVIOS . $info['imagen_novios']);

             $this->db->delete(TBL_MENU, array('bodas_id'=>$id));
             $this->db->delete(TBL_REGALOS, array('bodas_id'=>$id));
         }

    /*         foreach( $info['gallery'] as $row ){
                @unlink(UPLOAD_PATH_GALLERY . $row['image']);
                @unlink(UPLOAD_PATH_GALLERY . $row['thumb']);
             }
         }else return false;*/
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
         $where=array('bodas_id'=>$id);
         $info = $this->db->get_where(TBL_BODAS, $where)->row_array();
         $this->db->select("regalo, regalo_id");
         $info['regalos'] = $this->db->get_where(TBL_REGALOS,  $where)->result_array();
         $this->db->select("menu, menu_id");
         $info['menus'] = $this->db->get_where(TBL_MENU,  $where)->result_array();
         return $info;
     }

     
    /* PUBLIC FUNCTIONS (LLAMADAS POR AJAX)
     **************************************************************************/
     public function check($name, $id){
         $where = !is_numeric($id) ? array('products_name'=>$name) : array('products_id !='=>$id, 'products_name'=>$name);
         return $this->db->get_where(TBL_PRODUCTS, $where)->num_rows>0;
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