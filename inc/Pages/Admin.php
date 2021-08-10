<?php
/**
 * @package AayushPlugin
 * */

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;
use ParagonIE\Sodium\Core\Poly1305\State;

class Admin extends BaseController
{
    public $settings;
    public $pages = array();

    public function __construct()
    {
        $this->settings = new SettingsApi();
        $this-> pages = [['page_title' => 'Aayush Plugin', 'menu_title' => 'Aayush', 'capability' => 'manage_options',
            'menu_slug' => 'aayush_plugin', 'callback' => function () {
            echo '<h1>Aayush Plugin </h1>';
        }, 'icon_url' => 'dashicons-store', 'position' => 110]
           ];
    }

    public function register()
    {
        //    add_action('admin_menu', array ($this, 'add_admin_pages'));
        $this->settings->addPages($this->pages)->register();
    }
    /*  public function add_admin_pages(){
          add_menu_page('Aayush Plugin', 'Aayush', 'manage_options', 'aayush_plugin', array($this, 'admin_index',), 'dashicons-store', 110);
      }
      public function admin_index(){
          require_once $this->plugin_path . 'templates/admin.php';
      }*/
}