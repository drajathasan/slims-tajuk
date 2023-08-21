<?php
/**
 * Plugin Name: Tajuk Src
 * Plugin URI: https://github.com/drajathasan/slims-tajuk
 * Description: Plugin untuk menampilkan subyek berdasarkan tajuk
 * Version: 1.0.0
 * Author: Drajat Hasan
 * Author URI: https://t.me/drajathasan
 */

use SLiMS\Plugins;

// Modifikasi lebar dan tinggi jendela tajuk
Plugins::hook(Plugins::BIBLIOGRAPHY_CUSTOM_FIELD_FORM, function($form, &$js){
    $js = <<<HTML
    $('.notAJAX').each(function(id,el) {
        if (el?.getAttribute('href')?.match(/pop_topic/)?.length > 0)
        {
            el.setAttribute('width', '780')
            el.setAttribute('height', '350')
        }
    })
    HTML;
});

// Manipulasi halaman
Plugins::hook(Plugins::ADMIN_SESSION_AFTER_START, function(){
    global $sysconf,$sanitizer,$dbs;

    $traces = (new Exception)->getTrace();
    $detailTrace = array_pop($traces);

    if (isset($detailTrace['file'])) {
        $info = pathinfo($detailTrace['file']);
        if (file_exists($path = __DIR__ . '/' . $info['basename'])) {
            require __DIR__ . '/vendor/autoload.php';
            include $path;
        }
    }
});
