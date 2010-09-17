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
         $gallery = $json->gallery;
         $this->load->library('encpss');
         $pass= $this->encpss->encode($_POST['txtPass']);

         $data = array(
            'username'=>$_POST['txtUsuario'],
            'password'=> $pass,

            'google_maps_salon'=>$_POST['txtUbiSalon'],
            'google_maps_iglesia'=> $_POST['txtUbiIglesia'],

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

            //Copia las nuevas imagenes de la galeria
                if( count($gallery)>0 ){
                    if( !$this->_copy_images($gallery, $id) ) echo "error archivo galeria";
                }


                 $this->_delete_images_tmp(); //Elimina todas las imagenes temporales

                // Elimina las imagenes quitadas
                if( isset($gallery->images_del) ){
                    foreach( $gallery->images_del as $row ){

                        if( $this->db->delete(TBL_BODAS_GALLERY, array('image'=>$row->image_full)) ){
                            @unlink(UPLOAD_PATH_GALLERY_BODAS . $row->image_full);
                            @unlink(UPLOAD_PATH_GALLERY_BODAS . $row->image_thumb);
                        }else return false;
                    }
                 }


         }else return false;

         $this->_delete_images_tmp(); //Elimina todas las imagenes temporales

         $this->db->trans_complete(); // COMPLETO LA TRANSACCION*/
         
         return true;
     }

     public function edit(){
        $this->load->library('encpss');
         $json = json_decode($_POST['json']);
         $pass= $this->encpss->encode($_POST['txtPass']);
         $gallery = $json->gallery;


         $bodas_id = $_POST['bodas_iimages_del

d'];

         $data = array(
            'username'=>$_POST['txtUsuario'],
            'password'=>$pass,
            'google_maps_salon'=>$_POST['txtUbiSalon'],
            'google_maps_iglesia'=> $_POST['txtUbiIglesia'],
            'nombre_novio'=>$_POST['txtNombreNovio'],
            'apellido_novio'=>$_POST['txtApellidoNovio'],
            'nombre_novia'=> $_POST['txtNombreNovia'],
            'apellido_novia'=> $_POST['txtApellidoNovia'],
            'historia_novia'=> $_POST['txtHistNovia'],
            'historia_novio'=> $_POST['txtHistNovios'],
            'historia_novios'=>$_POST['txtHistNovios'],

        );

         if( isset($json->txtImageNovia->filename_image)){
            $data['imagen_novia'] = $json->txtImageNovia->filename_image;
            $data['imagen_novia_width'] = $json->txtImageNovia->thumb_width;
            $data['imagen_novia_height'] = $json->txtImageNovia->thumb_height;
            @unlink(urldecode($_POST['image_old_novia']));
            if(!copy(urldecode($json->txtImageNovia->href_image_full), UPLOAD_PATH_NOVIA.urldecode($json->txtImageNovia->filename_image))){
                    echo "error copiando imagen novia";
                 }
         }

         if( isset($json->txtImageNovio->filename_image )){
            $data['imagen_novio'] = $json->txtImageNovio->filename_image;
            $data['imagen_novio_width'] = $json->txtImageNovio->thumb_width;
            $data['imagen_novio_height'] = $json->txtImageNovio->thumb_height;
            @unlink(urldecode($_POST['image_old_novio']));
            if(!copy(urldecode($json->txtImageNovio->href_image_full), UPLOAD_PATH_NOVIO.urldecode($json->txtImageNovio->filename_image))){
                    echo "error copiando imagen novio";
                 }
         }

         if( isset($json->txtImageNovios->filename_image )){
            $data['imagen_novios'] = $json->txtImageNovios->filename_image;
            $data['imagen_novios_width'] = $json->txtImageNovios->thumb_width;
            $data['imagen_novios_height'] = $json->txtImageNovios->thumb_height;
            @unlink(urldecode($_POST['image_old_novios']));
            if(!copy(urldecode($json->txtImageNovios->href_image_full), UPLOAD_PATH_NOVIOS.urldecode($json->txtImageNovios->filename_image))){
                    echo "error copiando imagen novios";
                 }
         }



         $this->db->trans_start();  // INICIO TRANSACCION
         $this->db->where('bodas_id', $bodas_id);
         if( $this->db->update(TBL_BODAS, $data) ){
             $this->db->delete(TBL_MENU, array("bodas_id"=>$bodas_id));
             foreach($json->menus as $menu){
                 $data = array(
                    'bodas_id'=>$bodas_id,
                    'menu'=> $menu
                   );
                    $this->db->insert(TBL_MENU, $data);
               }


            $this->db->delete(TBL_REGALOS, array("bodas_id"=>$bodas_id));
             foreach($json->regalos as $regalo){
                 $data = array(
                    'bodas_id'=>$bodas_id,
                    'regalo'=> $regalo
                   );
                   $this->db->insert(TBL_REGALOS, $data);
               };

 
            //Copia las nuevas imagenes de la galeria
            if( count($gallery)>0 ){
                if( !$this->_copy_images($gallery, $bodas_id) ) echo "error archivo galeria";
            }


             $this->_delete_images_tmp(); //Elimina todas las imagenes temporales

            // Elimina las imagenes quitadas
            if( isset($gallery->images_del)){
                foreach( $gallery->images_del as $row ){

                    if( $this->db->delete(TBL_BODAS_GALLERY, array('image'=>$row->image_full)) ){
                        @unlink(UPLOAD_PATH_GALLERY_BODAS . $row->image_full);
                        @unlink(UPLOAD_PATH_GALLERY_BODAS . $row->image_thumb);
                    }else return false;
                }
             }

        }
         $this->db->trans_complete(); // COMPLETO LA TRANSACCION

         return true;
     }

     public function delete($id_array){

        if (is_array($id_array)){
            foreach($id_array as $id){
                $info = $this->get_info($id);

                 if( $this->db->delete(TBL_BODAS, array('bodas_id'=>$id))  ){
                     @unlink(UPLOAD_PATH_NOVIA . urldecode($info['imagen_novia']));
                     @unlink(UPLOAD_PATH_NOVIO . urldecode($info['imagen_novio']));
                     @unlink(UPLOAD_PATH_NOVIOS .urldecode($info['imagen_novios']));

                     $this->db->delete(TBL_MENU, array('bodas_id'=>$id));
                     $this->db->delete(TBL_REGALOS, array('bodas_id'=>$id));
                 }
            }
        }

         foreach( $info['gallery'] as $row ){
            @unlink(UPLOAD_PATH_GALLERY_BODAS . $row['image']);
            @unlink(UPLOAD_PATH_GALLERY_BODAS . $row['thumb']);
         }

         return true;
     }

     public function get_list(){
         $this->db->order_by('bodas_id', 'desc');
         return $this->db->get_where(TBL_BODAS);
     }

     public function get_list2(){
         $this->db->order_by('order', 'asc');
         return $this->db->get_where(TBL_BODAS);
     }

     public function get_info($id){
         $this->load->library("encpss");

         $where=array('bodas_id'=>$id);

         $info = $this->db->get_where(TBL_BODAS, $where)->row_array();

         $info['gallery'] = $this->db->get_where(TBL_BODAS_GALLERY, $where)->result_array();

         $info['password'] = $this->encpss->decode($info['password']);

         $this->db->select("regalo, regalo_id");
         $info['regalos'] = $this->db->get_where(TBL_REGALOS,  $where)->result_array();
         $this->db->select("menu, menu_id");
         $info['menus'] = $this->db->get_where(TBL_MENU,  $where)->result_array();
         return $info;
     }

     
    /* PUBLIC FUNCTIONS (LLAMADAS POR AJAX)
     **************************************************************************/
     public function check_exists($v, $id){
         $where = $id==0 ? array('username'=>$v) : array('bodas_id<>'=>$id, 'username'=>$v);         
         return $this->db->get_where(TBL_BODAS, $where)->num_rows>0;
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
            $cp1 = @copy(UPLOAD_PATH_GALLERY_BODAS.".tmp/".$row->image_full, UPLOAD_PATH_GALLERY_BODAS . $row->image_full);
            $cp2 = @copy(UPLOAD_PATH_GALLERY_BODAS.".tmp/".$row->image_thumb, UPLOAD_PATH_GALLERY_BODAS . $row->image_thumb);

            if( $cp1 && $cp2 ){
                $data = array(
                    'bodas_id'    => $id,
                    'image'       => $row->image_full,
                    'thumb'       => $row->image_thumb,
                    'width'       => $row->width,
                    'height'      => $row->height
                );

                if( !is_numeric($_POST['bodas_id']) ) $data['order'] = $n;
                if( !$this->db->insert(TBL_BODAS_GALLERY, $data) ) return false;
            }else return false;
        }

        return true;
    }
    
}
?>