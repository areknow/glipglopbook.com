<?php

function is_404($url) {
  $handle = curl_init($url);
  curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);
  $response = curl_exec($handle);
  $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
  curl_close($handle);
  if ($httpCode >= 200 && $httpCode < 300) {
      return false;
  } else {
      return true;
  }
}