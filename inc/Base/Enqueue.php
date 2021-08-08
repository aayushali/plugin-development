<?php
/**
 * @package AayushPlugin
 * */

namespace Inc\Base;
class Enqueue
{
    public function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

    function enqueue()
    {
        //enqueue all our scripts
        wp_enqueue_style('my-plugin-style', PLUGIN_URL . 'assets/aka.css');
        wp_enqueue_script('my-plugin-script', PLUGIN_URL . 'assets/scripts.js');
    }
}

