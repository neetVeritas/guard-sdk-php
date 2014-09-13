<?php namespace Modules;

    use \stdClass;
    
    class App {
        
        private static $params = array(
            'mod' => 'app'
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
            
            $app_data = \Tools\Utility::request( $params );
            if( !$app_data->error ):
                $this->data = (array)$app_data; // json object struct to array
                unset( $this->error ); // set error report to null
            else:
                $this->error = $app_data->error; // store local error report
            endif;
        }
        
    }