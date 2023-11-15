<?php
// namespace App\Helpers;
use Illuminate\Support\Facades\Route;

/**
 * Return active if current path begins with path.
 *
 * @param string $path
 * @return string
 */
function set_active($uri, $output = 'active-page')
{
    if (is_array($uri)) {
        foreach ($uri as $u) {
            if (Route::is($u)) {
                return $output;
            }
        }
    } else {
        if (Route::is($uri)) {
            return $output;
        }
    }
}
function set_active_sub($uri, $output = 'active')
{
    if (is_array($uri)) {
        foreach ($uri as $u) {
            if (Route::is($u)) {
                return $output;
            }
        }
    } else {
        if (Route::is($uri)) {
            return $output;
        }
    }
}
