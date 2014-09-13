<?php namespace Tools;

    class Utility {
        
        public static function request($parameters) {
            $loc = DRIVER_LOC;
            foreach( $parameters as $p=>$key ):
                $loc .= "&$p=$key";
            endforeach; // loop through param nodes
            return json_decode( file_get_contents( $loc ) );
        }
                
    }
    
?>