<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function loadEditer() {
    $obj = & get_instance();

    if (isset($obj->ckeditor))
        return;

    if (!class_exists('CKEditor')) {
        require_once FCPATH . 'ckeditor/ckeditor.php';
    }
    if (!class_exists('CKFinder')) {
        require_once FCPATH . APPPATH . 'third_party/ckfinder/ckfinder.php';
    }
    $obj->ckeditor = new CKeditor(base_url() . "ckeditor/");
    $obj->ckeditor->returnOutput = true;

    $obj->ckfinder = new CKFinder(site_url("/ckfinder/"));
    $obj->ckfinder->SetupCKEditor($obj->ckeditor, site_url("/ckfinder/"));
}

function editerGetDefaultConfig() {
    $toolbar = array(
        array('Bold', 'Italic', 'Underline', '-',
            'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-',
            'Undo', 'Redo','SelectAll', '-', 'Link', 'Unlink',  'Image', 'Table', '-',
        ),
        array('Styles', 'Format', 'Font', 'FontSize',
            'TextColor', 'BGColor'),
        array(
            'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 
            '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'
        ),
        array('Preview', 'Print'),
        array('Maximize', 'ShowBlocks')
       
    );
    $config = array(
        "fullPage" => false,
        "extraPlugins" => 'docprops,autogrow,tableresize',
        "enterMode" => "CKEDITOR.ENTER_BR",
        "shiftEnterMode" => "CKEDITOR.ENTER_P",
        "autoGrow_maxHeight" => 800,
        "skin" => 'kama',
        "language" => 'vi',
        "jqueryOverrideVal" => true,
        "toolbar" => $toolbar,
        "removePlugins" => 'resize'
    );
    return $config;
}

function editerGetEnConfig() {

    $config = array(
        "fullPage" => false,
        "extraPlugins" => 'docprops,autogrow,tableresize',
        "enterMode" => "CKEDITOR.ENTER_BR",
        "shiftEnterMode" => "CKEDITOR.ENTER_P",
        "autoGrow_maxHeight" => 800,
        "skin" => 'kama',
        "language" => 'en',
        "jqueryOverrideVal" => true,
        //"toolbar"=>$toolbar,
        "removePlugins" => 'resize'
    );
    return $config;
}

loadEditer();