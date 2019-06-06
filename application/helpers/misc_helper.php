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


/** ---------------------------------------------
 * Registrant Badge Background generator
 * ---------------------------------------------- */
function badge_color_generator($status)
{
    $bg_color_class = null;
    switch ($status) :
        case 'initial':
            $bg_color_class = 'bg-asphalt'; break;
        case 'paid':
            $bg_color_class = 'bg-orange'; break;
        case 'confirmed':
            $bg_color_class = 'bg-green'; break;
        default:
            $bg_color_class = 'bg-asphalt'; break;
    endswitch;

    $class = "text-white text-center px-4 py-1 rounded-sm " . $bg_color_class;
    return "<div class='$class'>" . ucfirst($status) . "</div>";
}