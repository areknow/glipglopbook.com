<?php
class Amazon {

  public function getSignedUrl($params) {

    if(!$params) return '';

    // build array with urlencoded $params
    $encoded_values = array();
    foreach($params as $key=>$val) {
      $encoded_values[$key] = rawurlencode($key) . '=' . rawurlencode($val);
    }

    // add the account params and urlencode
    if(! $encoded_values['AssociateTag'])
      $encoded_values['AssociateTag']= 'AssociateTag='.rawurlencode("glipglop07-20");
    if(! $encoded_values['AWSAccessKeyId'])
      $encoded_values['AWSAccessKeyId'] = 'AWSAccessKeyId='.rawurlencode('AKIAIT6OZORDNISO3EQA');
    if(! $encoded_values['Service'])
      $encoded_values['Service'] = 'Service=AWSECommerceService';
    if(! $encoded_values['Timestamp'])
      $encoded_values['Timestamp'] = 'Timestamp='.rawurlencode(gmdate('Y-m-d\TH:i:s\Z'));
    if(! $encoded_values['Version'])
      $encoded_values['Version'] = 'Version=2011-08-01';

    // sort
    ksort($encoded_values);

    // set the server, uri, and method
    $server = 'webservices.amazon.com';
    $uri = '/onca/xml';
    $method = 'GET'; 

    // implode the encoded values and generate hash signature
    $query_string = str_replace("%7E", "~", implode('&',$encoded_values));   
    $sig = base64_encode(hash_hmac('sha256', "{$method}\n{$server}\n{$uri}\n{$query_string}", 'I22KTaEDo+/fn78EwfcI1+iZGGuTeptdptPcgxin', true));

    // return the URL string and add the signature as the last parameter
    return "http://{$server}{$uri}?{$query_string}&Signature=" 
      . str_replace("%7E", "~", rawurlencode($sig));
  }
}
