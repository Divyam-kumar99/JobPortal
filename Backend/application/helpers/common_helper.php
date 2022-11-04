<?php
 function resizeimg($path, $new_path, $w, $h){
    $CI=& get_instance();
    $config['image_library'] = 'gd2';
    $config['source_image'] = $path;
    $config['new_image'] = $new_path;
    $config['create_thumb'] = TRUE;
    $config['maintain_ratio'] = TRUE;
    $config['width']         = $w;
    $config['height']       = $h;
    $config['thumb_marker']  ='';
    
    $CI->load->library('image_lib', $config);
    
    $CI->image_lib->initialize($config);

    $CI->image_lib->resize();

    $CI->image_lib->clear();
}
?>