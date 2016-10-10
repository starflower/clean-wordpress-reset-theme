<?php
/*
*
* CSS Compress
*
*/

/* 7 days */
#$offset = 7 * 24 * 60 * 60;
/* 60 seconds */
#$offset = 60;


ob_start ("ob_gzhandler");
ob_start("compress");
header("Content-type: text/css;charset: UTF-8");
#header("Cache-Control: max-age=" . $offset . ", public, must-revalidate");

require('parts/reset.css');
require('parts/unsemantic-grid-responsive-tablet.css');
require('parts/font-sizes.css');
require('parts/font-basics.css');
require('parts/divider.css');
require('parts/flexbox-basics.css');
require('parts/helper.css');
require('parts/spacings.css');
require('parts/print.css');


function compress($buffer) {
  /* remove comments */
  $buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
  /* remove tabs, spaces, new lines, etc. */
  $buffer = str_replace(array("\r\n","\r","\n","\t",'  ','    ','    '),'',$buffer);
  /* remove unnecessary spaces */
  $buffer = str_replace('{ ', '{', $buffer);
  $buffer = str_replace(' }', '}', $buffer);
  $buffer = str_replace('; ', ';', $buffer);
  $buffer = str_replace(', ', ',', $buffer);
  $buffer = str_replace(' {', '{', $buffer);
  $buffer = str_replace('} ', '}', $buffer);
  $buffer = str_replace(': ', ':', $buffer);
  $buffer = str_replace(' ,', ',', $buffer);
  $buffer = str_replace(' ;', ';', $buffer);
  $buffer = str_replace(';}', '}', $buffer);
  return $buffer;
}
?>