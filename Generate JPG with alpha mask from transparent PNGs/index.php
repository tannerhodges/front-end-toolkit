<?php
$file_path = 'image.jpg';
$file_width = 1608;
$mask_offset = 10;
$img_width = ($file_width - $mask_offset) / 2;
$img_height = 678;
?>
<style>
body {
    max-width: 40em;
    margin: 0 auto;
    background: red;
}
.overlay-wrapper {
    width: 100%;
    height: 0;
    margin: 0; /* Reset `figure` */
    padding: 0 0 <?php echo $img_height / $img_width * 100 ?>%;
}
</style>
<figure class="overlay-wrapper">
    <svg viewBox="0 0 <?php echo $img_width ?> <?php echo $img_height ?>" preserveAspectRatio="xMinYMin">
        <style>#overlay-mask-link { mask: url(#overlay-mask); }</style>
        <symbol id="overlay-image">
            <image width="<?php echo $file_width ?>" height="<?php echo $img_height ?>" xlink:href="<?php echo $file_path ?>" />
        </symbol>
        <mask id="overlay-mask">
            <use xlink:href="#overlay-image" width="<?php echo $file_width ?>" height="<?php echo $img_height ?>" x="<?php echo $img_width * -1 - $mask_offset ?>" y="0" style="overflow: hidden;" />
        </mask>
        <use id="overlay-mask-link" width="<?php echo $img_width ?>" height="<?php echo $img_height ?>" xlink:href="#overlay-image" style="overflow: hidden;" />
    </svg>
</figure>
