<?php
/**
 * @package AayushPlugin
 * */

namespace Inc ;
final class Init {  // final means php will not have ability to extend this class by another class

    /*
     * Store al the classes inside an array
     * @return array full list of classes
     */
    public static function get_services(){
        return [
            Pages\Admin::class,
            Base\Enqueue::class,
            Base\SettingsLinks::class
        ];
    }

    /*
     * Loop through the classes, initialize them, and call the register() method if it exists
     * @return [type] [description]
     */
   public static function register_services() {
        foreach ( self::get_services() as $class){
            $service = self::instantiate ($class);
            if(method_exists($service, 'register')){
                $service->register() ;
            }
        }
   }

    /**
     * Initialize the class
     * @param class  $class class from the services array
     * @return
     */
   private static function instantiate ($class){
        $service = new $class();
        return $service;
   }
}


/*use Inc\Activate;
use Inc\Deactivate;
//use Inc\Admin\AdminPages;
if (!class_exists('AayushPlugin')) {
    class AayushPlugin
    {
        public $plugin;

        function __construct()
        {
            add_action('init', array($this, 'custom_post_type'));
            $this->plugin = plugin_basename(__FILE__);
        }

        public function add_admin_pages()
        {
            add_menu_page('Aayush Plugin', 'Aayush', 'manage_options', 'aayush_plugin', array($this, 'admin_index'), 'dashicons-store', 110);
        }

        public function admin_index()
        {
            //require template
            require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
        }

        function register()
        {
            add_action('admin_enqueue_scripts', array($this, 'enqueue'));
            add_action('admin_menu', array($this, 'add_admin_pages'));
            plugin_basename(__FILE__);
            add_filter("plugin_action_links_$this->plugin", array($this, 'settings_link'));
        }

        public function settings_link($links)
        {
            $settings_link = '<a href="admin.php?page=aayush_plugin">Settings</a>';
            array_push($links, $settings_link);
            return $links;
        }

        function activate()
        {
            //This is done by using composer
            // see file composer.json
//            require_once plugin_dir_path(__FILE__) . 'inc/aayush-plugin-activate.php';
            Activate::activate();
            AdminPages::add_admin_pages();
        }

        function deactivate()
        {
            // require_once plugin_dir_path(__FILE__) . 'inc/aayush-plugin-deactivate.php';
            Deactivate::deactivate();
        }

        /* function uninstall()
         {
             // delete the CPT
         }*/
//        function custom_post_type()
//        {
//            register_post_type('book', ['public' => true, 'label' => 'Books']);
//        }
//
//        function enqueue()
//        {
//            //enqueue all our scripts
//            wp_enqueue_style('my-plugin-style', plugins_url('/assets/aka.css', __FILE__));
//            wp_enqueue_script('my-plugin-script', plugins_url('/assets/scripts.js', __FILE__));
//        }
//    }
//
//    $aayushPlugin = new AayushPlugin();
//    $aayushPlugin->register();
////activation
//    register_activation_hook(__FILE__, array($aayushPlugin, 'activate'));
//
////deactivation
//    register_deactivation_hook(__FILE__, array($aayushPlugin, 'deactivate'));
//}
// uninstall
//register_uninstall_hook(__FILE__, array($aayushPlugin, 'uninstall'));*/