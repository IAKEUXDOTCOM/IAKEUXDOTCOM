<?php 
function recurDir($dir) {
    if(is_dir($dir)) {
        if($handle = opendir($dir)) {
            while(false !== ($file = readdir($handle))) {
                if(is_dir($dir.'/'.$file)) {
                    if($file != '.' && $file != '..') {
                        $path = $dir.'/'.$file;
                        0755 ? chmod($path,0755) : FALSE;
                        echo $path.'<p>';
                        recurDir($path);
                    }
                }else{
                    $path = $dir.'/'.$file;
                    0644 ? chmod($path,0644) : FALSE;
                    echo $path.'<p>';
                }
            }
        }
        closedir($handle);
    }
}
 
recurDir('.');
?>