<?php 


    require_once 'config/configuration.php';

    function Autoloader($class) {
        
        $paths = [
            AppRoot."/core/",
            AppRoot."/services/interfaces/",
            AppRoot."/services/implementations/",
            AppRoot."/models/"
        ];

        foreach ($paths as $path) {
            $file = $path . $class . '.php';
            if (file_exists($file)) {
                require_once $file;
            }
        }
    }


    spl_autoload_register('Autoloader');

    $init = new Core();

?>