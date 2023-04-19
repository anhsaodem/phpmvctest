<?php

namespace Core;

class View
{
    public static function render($path, $data = [])
    {
        extract($data);
        $contenView = self::getView($path, $data);
        $contenView = preg_replace('~{{\s*(.+?\s*)}}~s', '<?php echo htmlentities($1); ?>', $contenView);
        $contenView = preg_replace('~{!!\s*(.+?\s*)!!}~s', '<?php echo $1; ?>', $contenView);
        $contenView = preg_replace('~@foreach\s*(\(.+?\))~s', '<?php foreach $1: ?>', $contenView);
        $contenView = preg_replace('~@endforeach~s', '<?php endforeach; ?>', $contenView);
        eval('?>' . $contenView . '<?php>');
    }
    //chia sẻ tất cả các view
    public static function share(){

    }
    private static function getView($path)
    {

        $path = BASE_ROOT . '/app/Views/' . $path . '.php';
        return file_get_contents($path);
    }
}
