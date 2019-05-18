<?php
/** ---------------------------------------------
 * Customized var_dump
 * ---------------------------------------------- */
 function bdump($e)
{
    echo "<pre>";
    print_r($e);
    echo "</pre>";
}


/** ---------------------------------------------
 * Create excerpt
 * ---------------------------------------------- */

function excerpt($text)
{
    return substr($text,0, 250);
}