<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function genarate_key() {
    return random_string('alnum', 50);
}



?>
