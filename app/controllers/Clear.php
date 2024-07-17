<?php

class Clear extends Controller{
    public function index(){
// Clear browser cache
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Clear server-side cache (example: OPCache)
if (function_exists('opcache_reset')) {
    opcache_reset();
}

// Clear APC Cache if enabled
if (function_exists('apc_clear_cache')) {
    apc_clear_cache();
    apc_clear_cache('user');
    apc_clear_cache('opcode');
} 

Helpers::back();
    }
    
}