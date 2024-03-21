<?php
/**
 * Plugin Name: UASM - Unleash All System Memory
 * Plugin URI: https://automattic.com
 * Description: This plugin will consume all the memory available in the system.
 * Version: 0.1.0
 * Author: Antonio Sejas
 * Author URI: https://automattic.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

function uasm_use_all_system_memory() {
    echo "Initial memory usage: " . (memory_get_usage()/(1024*1024)) . ' MB <br>';
    $memoryUsage = 0;
    $data = '';

    while (true) {
        $data .= str_repeat('a', 1024 * 1024); // Increase string size by 1MB in each iteration
        $memoryUsage = max($memoryUsage, memory_get_usage());
        echo "* " . (memory_get_usage()/(1024*1024)) . ' MB <br>';
    }
    die();
}

// Hook our function to the wp_footer action to run it on every frontend page load
add_action('init', 'uasm_use_all_system_memory');