<?php 
	class file{
		public function buildFileTree( $path = '.'){ // Get current directory unless paramenter is specified         
			$ignore = array( 'cgi-bin', '.', '..', 'Thumbs.db', 'ds_store'); // files to ignore
			$dh = opendir($path); 		
			while(false !== ($file = readdir($dh))){  
				if(!in_array($file, $ignore)){              
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
			echo "</ul>"; 
			closedir( $dh ); 
		} 
	}
?>