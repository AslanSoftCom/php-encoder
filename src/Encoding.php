<?php 

class Encoding {

    public $tex;
    public $openssl;

    public function __construct($tex = "") {

        if(isset($tex[1])) {
        $this->cod1 = $tex[1];
        } else {
        $this->cod1 = "o1";
        } 
        
        if(isset($tex[2])) {
        $this->cod2 = $tex[2];
        } else {
        $this->cod2 = "a1";
        } 

        if(isset($tex[3])) {
        $this->cod3 = $tex[3];
        } else {
        $this->cod3 = "c1";
        }

        if(isset($tex[4])) {
        $this->cod4 = $tex[4];
        } else {
        $this->cod4 = "e1";
        }

        if(isset($tex[5])) {
        $this->cod5 = $tex[5];
        } else {
        $this->cod5 = "b1";
        } 
        
        if(isset($tex[6])) {
        $this->cod6 = $tex[6];
        } else {
        $this->cod6 = "s1";
        }

        if(isset($tex[7])) {
        $this->cod7 = $tex[7];
        } else {
        $this->cod7 = "d1";
        }

        if(isset($tex[8])) {
        $this->cod8 = $tex[8];
        } else {
        $this->cod8 = "x1";
        }

        if(isset($tex[9])) {
        $this->cod9 = $tex[9];
        } else {
        $this->cod9 = "w1";
        }
    }

    public function encrypt($text) {

        if(empty($text)) {
        return array("status" => "fail", "mesages" => "enter data to be encrypted!");    
        }

        $arr = array('q' => '90' . $this->cod1, 'w' => '80' . $this->cod1, 'a' => '70' . $this->cod1, 'b' => '60' . $this->cod1, 'c' => '50' . $this->cod1,  'ç' => '40' . $this->cod1, 'd' => '30' . $this->cod1, 'e' => '20' . $this->cod1, 'f' => '90' . $this->cod2, 'g' => '80' . $this->cod2, 'ğ' => '70' . $this->cod2, 'h' => '60' . $this->cod2, 'i' => '50' . $this->cod2, 'ı' => '40' . $this->cod2, 'j' => '30' . $this->cod2, 'k' => '20' . $this->cod2, 'l' => '90' . $this->cod3, 'm' => '80' . $this->cod3, 'n' => '70' . $this->cod3, 'o' => '60' . $this->cod3, 'ö' => '50' . $this->cod3, 'p' => '40' . $this->cod3, 'r' => '30' . $this->cod3, 's' => '20' . $this->cod3, 'ş' => '90' . $this->cod4, 't' => '80' . $this->cod4, 'u' => '70' . $this->cod4, 'ü' => '60' . $this->cod4, 'y' => '50' . $this->cod4, 'z' => '40' . $this->cod4, '0' => '30' . $this->cod4, '1' => '20' . $this->cod4, '2' => '90' . $this->cod5, '3' => '80' . $this->cod5, '4' => '70' . $this->cod5, '5' => '60' . $this->cod5, '6' => '50' . $this->cod5, '7' => '40' . $this->cod5, '8' => '30' . $this->cod5, '9' => '20' . $this->cod5, ' ' => '90' . $this->cod6, '.' => '80' . $this->cod6, ':' => '70' . $this->cod6, ';' => '60' . $this->cod6, ',' => '50' . $this->cod6, '"' => '40' . $this->cod6, '<' => '30' . $this->cod6, '>' => '20' . $this->cod6, "'" => '90' . $this->cod7, '#' => '80' . $this->cod7, '+' => '70' . $this->cod7, '$' => '60' . $this->cod7, '%' => '50' . $this->cod7, '½' => '40' . $this->cod7, '&' => '30' . $this->cod7, '/' => '20' . $this->cod7, '{' => '90' . $this->cod8, '[' => '80' . $this->cod8, '(' => '70' . $this->cod8, ')' => "60x1", ']' => '50' . $this->cod8, '=' => '40' . $this->cod8, '?' => '30' . $this->cod8, '*' => '20' . $this->cod8, '_' => '90' . $this->cod9, '-' => '80' . $this->cod9, '|' => '70' . $this->cod9, '}' => '60' . $this->cod9, '!' => '50' . $this->cod9);
        $encrypt = strtr(mb_strtolower($text, "UTF-8"), $arr);

        if(isset($this->openssl)) {
        $encrypt = openssl_encrypt($encrypt, $this->method, $this->key, 0, $this->iv);
        }
        
        if(isset($this->gzcompress)) {
        $encrypt = gzcompress($encrypt);    
        }

        if(isset($this->serialize)) {
        $encrypt = serialize($encrypt);    
        }

        if(isset($this->urlencode)) {
        $encrypt = urlencode($encrypt);    
        } 

        if(isset($this->rawurlencode)) {
        $encrypt = rawurlencode($encrypt);    
        } 

        if(isset($this->base64)) {
        $encrypt = base64_encode($encrypt);    
        }
        return $encrypt;
    }

    public function decrypt($text) {

        if(empty($text)) {
        return array("status" => "fail", "mesages" => "enter data to be decrypted!");    
        }

        if(isset($this->base64) == true) {
        $text = @base64_decode($text);    
        }

        if(isset($this->rawurlencode) == true) {
        $text = @rawurldecode($text);    
        } 

        if(isset($this->urlencode) == true) {
        $text = @urldecode($text);    
        } 

        if(isset($this->serialize) == true) {
        $text = @unserialize($text);    
        }   

        if(isset($this->gzcompress) == true) {
        $text = @gzuncompress($text);    
        }

        if(isset($this->openssl)) {
        $text = openssl_decrypt($text, $this->method, $this->key, 0, $this->iv);
        }

        $arr = array('50' . $this->cod9 => '!', '60' . $this->cod9 => '}', '70' . $this->cod9 => '|', '80' . $this->cod9 => '-', '90' . $this->cod9 => '_', '20' . $this->cod8 => '*', '30' . $this->cod8 => '?', '40' . $this->cod8 => '=', '50' . $this->cod8 => ']', "60x1" => ')', '70' . $this->cod8 => '(', '80' . $this->cod8 => '[', '90' . $this->cod8 => '{', '20' . $this->cod7 => '/', '30' . $this->cod7 => '&', '40' . $this->cod7 => '½', '50' . $this->cod7 => '%', '60' . $this->cod7 => '$', '70' . $this->cod7 => '+', '80' . $this->cod7 => '#', '90' . $this->cod7 => "'", '20' . $this->cod6 => '>', '30' . $this->cod6 => '<', '40' . $this->cod6 => '"', '50' . $this->cod6 => ',', '60' . $this->cod6 => ';', '70' . $this->cod6 => ':', '80' . $this->cod6 => '.', '90' . $this->cod6 => ' ', '20' . $this->cod5 => '9', '30' . $this->cod5 => '8', '40' . $this->cod5 => '7', '50' . $this->cod5 => '6', '60' . $this->cod5 => '5', '70' . $this->cod5 => '4', '80' . $this->cod5 => '3', '90' . $this->cod5 => '2', '20' . $this->cod4 => '1', '30' . $this->cod4 => '0', '40' . $this->cod4 => 'z', '50' . $this->cod4 => 'y', '60' . $this->cod4 => 'ü', '70' . $this->cod4 => 'u', '80' . $this->cod4 => 't', '90' . $this->cod4 => 'ş', '20' . $this->cod3 => 's', '30' . $this->cod3 => 'r', '40' . $this->cod3 => 'p', '50' . $this->cod3 => 'ö', '60' . $this->cod3 => 'o', '70' . $this->cod3 => 'n', '80' . $this->cod3 => 'm', '90' . $this->cod3 => 'l', '20' . $this->cod2 => 'k', '30' . $this->cod2 => 'j', '40' . $this->cod2 => 'ı', '50' . $this->cod2 => 'i', '60' . $this->cod2 => 'h', '70' . $this->cod2 => 'ğ', '80' . $this->cod2 => 'g', '90' . $this->cod2 => 'f', '20' . $this->cod1 => 'e', '30' . $this->cod1 => 'd', '40' . $this->cod1 => 'ç', '50' . $this->cod1 => 'c', '60' . $this->cod1 => 'b', '70' . $this->cod1 => 'a', '80' . $this->cod1 => 'w', '90' . $this->cod1 => 'q');
        $decrypt = strtr(mb_strtolower($text, "UTF-8"), $arr);

        if(empty($decrypt)) {
        return array("status" => "fail", "mesages" => "could not be resolved");           
        }
        
        return $decrypt;
    }

    public function openssl($openssl) {
        $this->openssl = $openssl;
        if(isset($this->openssl)) {
        $this->method = 'AES-256-CBC';
        $this->key = hash('sha256', $this->openssl);
        $this->iv = substr(hash('sha256', $this->key), 0, 16);
        return true;
        }
    }

    public function base64($var = false) {
    if($var == true) {
        $this->base64 = true;  
        } else {
        $this->base64 = null;
    }
}
    
    public function gzcompress($var = false) {
    if($var == true) {
        $this->gzcompress = true;  
        } else {
        $this->gzcompress = null;
        }        
    }  
 
    public function serialize($var = false) {
    if($var == true) {
        $this->serialize = true;  
        } else {
        $this->serialize = null;
        }        
    }  

    public function urlencode($var = false) {
    if($var == true) {
        $this->urlencode = true;  
        } else {
        $this->urlencode = null;
        }        
    }      
    
    public function rawurlencode($var = false) {
    if($var == true) {
        $this->rawurlencode = true;  
        } else {
        $this->rawurlencode = null;
        }        
    }
}