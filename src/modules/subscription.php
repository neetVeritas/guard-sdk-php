<?php namespace Modules;

    use \stdClass;
    
    class Subscription {
        
        private static $params = array(
            'mod' => 'subscription'
        );
        
        private $identifier;
        
        public $data, $error;
        
        public function __construct($identifier) {
            $this->identifier = $identifier;
            $this->query();
        }
        
        public function query() {
            $params = self::$params; // grab clean param list
            $params['id'] = $this->identifier;
            $params['cmd'] = 'data'; // specify module command
            
            $sub_data = \Tools\Utility::request( $params );
            if( !$sub_data->error ):
                $this->data = (array)$sub_data; // json object struct to array
                unset( $this->error ); // set error report to null
            else:
                $this->error = $sub_data->error; // store local error report
            endif;
        }
        
    }