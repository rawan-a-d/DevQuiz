<!-- Load classes -->
<?php

function autoloader($className){
    $pathController = '../../../app/controller/';
    $pathModel = '../../../app/model/';
    $pathView = '../../../app/view/';
    $extension = ".class.php";
    $controllerFileName = $pathController . $className . $extension;
    $modelFileName = $pathModel . $className . $extension;
    $viewFileName = $pathView . $className . $extension;
    $fileNames = [$controllerFileName, $modelFileName, $viewFileName];
    $exists = false;
    foreach($fileNames as $fileName){
        if(file_exists($fileName)){
            include_once $fileName;
            $exists = true;
        }
    }
}

spl_autoload_register('autoloader');

?>