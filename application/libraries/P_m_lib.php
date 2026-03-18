<?php

class P_m_lib{ 


public function newP(){
//				$this->load->helper('file');
			$handle = fopen("sd_assets/js/dummy.txt", "r");
			if ($handle) {
			    while (($line = fgets($handle)) !== false) {
			        $parts = explode(":", $line);
			        if (count($parts) == 2) {
			          	$d[] = $parts[0];
			        	$f[] = $parts[1];
        }

    }
    fclose($handle);
} else {
    // error opening the file.
}

$array = array('acc'=>$f[0],'fac'=>$f[1],'pp'=>$f[2]);
return $array;
}


}

?>