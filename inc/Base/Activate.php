<?php
/**
 * @package AayushPlugin
 * */


// namespace allows us to use
// use Inc\Activate; commmand
namespace Inc\Base;

class Activate {

    public static function activate() {
        flush_rewrite_rules();
    }
}