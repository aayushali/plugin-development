<?php
/**
 * @package AayushPlugin
 * */


// namespace allows us to use
// use Inc\Activate; commmand
namespace Inc\Base;
class Deactivate {
    public static function deactivate() {
        flush_rewrite_rules();
    }
}