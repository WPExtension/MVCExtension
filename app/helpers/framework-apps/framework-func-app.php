<?php

/**
 * This function defined as get the file header or different header file
 * v1.0
 * TYPE: Function 
 * 08.10.2023 */
function app_get_header( string $file = '' ) { require APPVIEWS_INC . $file . PHP_EXTENSION; }

/**
 * This function defined as get the file header or different header file
 * v1.0
 * TYPE: Function 
 * 08.10.2023 */
function app_get_footer( string $file = '' ) { require APPVIEWS_INC . $file . PHP_EXTENSION; }
