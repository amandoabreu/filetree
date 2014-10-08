<?php

/* 
 * Project: File Tree
 * File: tree.class.php
 * Creator: Amando Filipe
 * Github: https://github.com/amando96
 * Web: http://amando-filipe.com
 * Email: eu@amando-filipe.com
 * Twitter: @mndflp
 * Date: Oct 8, 2014
 * Time: 9:47:52 PM
 */
    class FileTree {
        private $path; // Path
        private $files = array(); // Files array
        private $ignore = array(); // files to ignore
        private $counter = 0;
        
        public function __construct($path, array $ignore = array('cgi-bin', '.', '..', 'Thumbs.db', 'ds_store')){
            if(file_exists($path) && is_dir($path)){
                $this->path = $path;
            } else {
                return false;
            }
            
            $this->ignore = $ignore;
        }
        
        public function buildFileTree($path){ // Get current directory unless paramenter is specified              
            $dh = opendir($path); 		
            while(false !== ($file = readdir($dh))){  
                if(!in_array($file, $this->ignore)){              
                    if(is_dir("$path/$file")){ 
                        if(count(glob("$path/$file/*")) == 0){
                            echo "<li class='empty'>$file\n<ul>\n"; 
                        } else {
                            echo "<li class='folder'>$file\n<ul>\n"; 
                        }				
                        $this->buildFileTree("$path/$file");
                        echo "</li>";
                    } else { 
                        $path_info = pathinfo($file);
                        $path_extension = isset($path_info['extension']) ? $path_info['extension'] : 'file';
                        echo "<li class='$path_extension'><a target='_BLANK' href='$path/$file'>$file</a>&nbsp;<span class='filesize'>".filesize($path.'/'.$file)." Bytes</span></li>\n";
                        $has_files = TRUE;				            
                    } 
                }    
            } 
            echo '</ul>';
            closedir( $dh ); 
        } 
        
        public function listFiles(){
            $this->buildFileTree($this->path);
        }
    }