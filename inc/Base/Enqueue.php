<?php
/**
 * @package AayushPlugin
 * */

namespace Inc\Base;
class Enqueue extends BaseController
{
    public function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

    function enqueue()
    {
        //enqueue all our scripts
        wp_enqueue_style('my-plugin-style', $this->plugin_url . 'assets/aka.css');
        wp_enqueue_script('my-plugin-script', $this->plugin_url . 'assets/scripts.js');
    }
}

