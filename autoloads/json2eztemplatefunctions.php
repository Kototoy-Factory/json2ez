<?php

class json2ezTemplateFunctions
{
    function operatorList()
    {   
        return array( 
            'get_external_json'
        );  
    }   

    function namedParameterPerOperator()
    {   
        return true;
    }   

    function namedParameterList()
    {   
        return array( 
            'get_external_json' => array(
                'url' => array(   
                    'type' => 'string',
                    'required' => true,
                    'default' => false 
                ),  
                'type' => array(   
                    'type' => 'string',
                    'required' => false,
                    'default' => 'jsonp'
                )   
            ) 
        );  
    }   
    function modify( $tpl, $operatorName, $operatorParameters, $rootNamespace, $currentNamespace,
        &$operatorValue, $namedParameters, $placement )
    {   
        switch ( $operatorName )
        {   
        case 'get_external_json':
        {
            $url = $namedParameters['url'];
            $type = $namedParameters['type'];

            $json2ez = new json2ez();
            $json2ez->fetch( $url, $type );
            $operatorValue = $json2ez->result;
        }
        break;
        }
    }
}

