<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div id="gallery" class="gf-content">
    <div id="controls" class="controls"></div>
    <div class="slideshow-container">
        <div id="loading" class="loader"></div>
        <div id="slideshow" class="slideshow"></div>
    </div>
    <div id="caption" class="caption-container"></div>
</div>
<div id="thumbs" class="navigation">
    <ul class="thumbs noscript">
<?php foreach( $info['gallery'] as $row ){?>
        <li>
            <a class="thumb" name="leaf" href="<?=UPLOAD_PATH_GALLERY_BODAS.$row['image']?>" title="">
                <img src="<?=UPLOAD_PATH_GALLERY_BODAS.$row['thumb']?>" alt="" width="115" height="75" />
            </a>
        </li>
<?php }?>
    </ul>
</div>

<script type="text/javascript">
<!--
    Gallery.initializer();
-->
</script>