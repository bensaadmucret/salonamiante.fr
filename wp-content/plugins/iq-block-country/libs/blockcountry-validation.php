<?php

/*
 * Check of an IP address is a valid IPv4 address
 */
function iqblockcountry_is_valid_ipv4($ipv4) 
{
    if(filter_var($ipv4, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) === FALSE) {
        return false;
    }

    return true;
}

/*
 * Check of an IP address is a valid IPv6 address
 */
function iqblockcountry_is_valid_ipv6($ipv6) 
{
    if(filter_var($ipv6, FILTER_VALIDATE_IP,FILTER_FLAG_IPV6) === FALSE) {
	return false;
    }

    return true;
}

/*
 * Check of given url is a valid url
 */
function iqblockcountry_is_valid_url($input) 
{
    if(filter_var($input,FILTER_VALIDATE_URL) === FALSE) {
      return "";   
    }
else
{
    return $input;
}
    
}


 /*
  * Sanitize callback. Check if supplied IP address list is valid IPv4 or IPv6
  */
function iqblockcountry_validate_ip($input)
{
    $validips = "";
    if (preg_match('/;/',$input))
    {
        $arr = explode(";", $input);
        foreach ($arr as $value) {
            if (iqblockcountry_is_valid_ipv4($value) || iqblockcountry_is_valid_ipv6($value))
            {
                $validips .= $value . ";";
            }
            
        }
    }
    else
    {
        if (iqblockcountry_is_valid_ipv4($input) || iqblockcountry_is_valid_ipv6($input))
        {
            $validips = $input . ";";
        }
    }
    return $validips;
    
}

/*
 * Check if GeoIP API key is correct.
 */
function iqblockcountry_check_geoapikey($input)
{
    
    // Check first if API key is empty....
    if (!empty($input))
    {    
    
        $url = GEOIPAPICHECKURL;
    
        $result = wp_remote_post(
            $url,
            array(
                'body' => array(
                    'api-key' => $input
                )
            )
        );    
        $message = "";
        $type = "updated";
        if ( is_wp_error( $result ) ) {
           return FALSE;
        }

        elseif ( 200 == $result['response']['code'] ) {
            $body = $result['body'];
            $xml = new SimpleXmlElement($body);
            if ($xml->check != "Ok")
            {
                $message = __( 'The GeoIP API key is incorrect. Please update the key.', 'iq-block-country' );
                $type = "error";
                $input = FALSE;
            }
            else 
            {
                $message = __( 'Setting saved.', 'iq-block-country' );
                $type = "updated";
            }
        }
        else
        {
            $input = FALSE;
        }
        add_settings_error('iqblockcountry_geoipapi_error',esc_attr( 'settings_updated' ),$message,$type);
        return $input;
    }
    return "";
}

/*
 * Check if GeoIP API key is correct.
 */
function iqblockcountry_check_adminapikey($input)
{
    
    // Check first if API key is empty....
    if (!empty($input))
    {    
    
        $url = ADMINAPICHECKURL;
    
        $result = wp_remote_post(
            $url,
            array(
                'body' => array(
                    'api-key' => $input
                )
            )
        );    
        $message = "";
        $type = "updated";
        if ( is_wp_error( $result ) ) {
         return FALSE;
        }
        elseif ( 200 == $result['response']['code'] ) {
            $body = $result['body'];
            $xml = new SimpleXmlElement($body);
            if ($xml->check != "Ok")
            {
                $message = __( 'The Admin Block API key is incorrect. Please update the key.', 'iq-block-country' );
                $type = "error";
                $input = FALSE;
            }
            else 
            {
                $message = __( 'Setting saved.', 'iq-block-country' );
                $type = "updated";
            }
        }
        else
        {
            $input = FALSE;
        }
        add_settings_error('iqblockcountry_adminapi_error',esc_attr( 'settings_updated' ),$message,$type);
        return $input;
    }
    return "";
}


/*
 * Check if GeoIP API key is correct.
 */
function iqblockcountry_get_licensedate_geoapikey($apikey)
{

    // Check first if API key is empty....
    if (!empty($apikey))
    {    
    
        $url = GEOIPAPICHECKURL;
    
        $result = wp_remote_post(
            $url,
            array(
                'body' => array(
                    'api-key' => $apikey
                )
            )
        );  
        if ( is_wp_error( $result ) ) {
            return "";
        }
        elseif ( 200 == $result['response']['code'] ) {
            $body = $result['body'];
            $xml = new SimpleXmlElement($body);
            if ($xml->check == "Ok")
            {
                return $xml->LicenseDate;
            }
        }
        else
        {
            return "";
        }
    }
    return "";
}
