<?php 

class Settings {

    // Load app from apps admin
    public static string $framework_app_functions = APPHELPER . '/framework-apps/';

    public static string $sync_functions = APPHELPER . '/sync_functions/';
    
    public static string $sync_classes = APPHELPER . '/sync_classes/';

    static public function framework_app_functions() {
        return self::$framework_app_functions;
    }

    static public function sync_function() {
        return self::$sync_functions;
    }

    static public function sync_class() {
        return self::$sync_classes;
    }
 
}