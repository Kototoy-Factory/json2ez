<?php 

class json2ez{

    var $result;

    function fetch( $url, $type = 'jsonp' ){
        $data = file_get_contents( $url );
        switch ($type) {
        case 'jsonp':
            $result = $this->parse_jsonp( $data );
            break;
        case 'json':
            $result = $this->parse_json( $data );
            break;
        case 'xml':
            $result = $this->parse_xml( $data );
            break;
        }   
        var_dump($result);
        $this->result = $result;
    }   

    function parse_jsonp( $text ){
        $regexp = '/^[a-z][^\(]*\((.*)\)$/s';
        preg_match( $regexp, $text, $matches );
        return $this->parse_json( $matches[1] );
    }   

    function parse_json( $text ){
        return json_decode( $text, true );
    }   

    function parse_xml( $text ){
        return json_decode( json_encode( (array) simplexml_load_string($text) ), true); 
    }   

}

?>
