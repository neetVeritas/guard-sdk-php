<?php namespace Modules\User;

    use \stdClass;
    
    class Credit {
        
        public static function transfer($user, $cred_secret, $credit, $recipient) {
            $params = array(
                'mod' => 'user',
                'user' => $user->credentials['username'],
                'phrase' => $user ->credentials['phrase'],
                'cmd' => 'credit', // specify module command
                'act' => 'transfer', // specify sub command
                'secret' => $cred_secret, // with automatically update after successful transfer
                'a' => $credit, // specify amount of credit to transfer
                'b' => $recipient // specify recipient
            );
            $result = \Tools\Utility::request( $params );
            return $result->error === null?true:false;
        }
        
    }

?>

<?php namespace Modules;
    
    use \stdClass;
    
    class User {
        
        private static $params = array(
            'mod' => 'user'
        );
        
        public $credentials, $data, $error;
        
        public function __construct($username, $phrase) {
            $this->credentials = array(
                'username' => $username,
                'phrase' => $phrase
            );
            $this->profile(); // grab user data
        }
        
        public function profile() {
            $params = self::$params; // grab clean param list
            $params['user'] = $this->credentials['username'];
            $params['phrase'] = $this->credentials['phrase'];
            $params['cmd'] = 'data'; // specify module command
            
            $data = new stdClass();
            
            $params['a'] = 'guard'; // specify data branch
            $guard_data = \Tools\Utility::request( $params );
            if( !$guard_data->error ):
                $data->guard = (array)$guard_data; // json object struct to array
                unset( $this->error ); // set error report to null
            else:
                $this->error = $guard_data->error; // store local error report
            endif;
            
            $params['a'] = 'foro'; // specify data branch
            $foro_data = \Tools\Utility::request( $params );
            if( !$foro_data->error ):
                $data->foro = (array)$foro_data; // json object struct to array
            endif;
            
            $this->data = $data; // overwrite
        }
        
    }

?>
