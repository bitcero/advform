<?php
// $Id: rmcommon.php 11044 2013-02-13 04:54:14Z bitc3r0 $
// --------------------------------------------------------------
// AdvancedForm plugin for Common Utilities
// Improves rmcommon forms by adding new fields and controls
// Author: Eduardo Cortés <i.bitcero@gmail.com>
// Email: i.bitcero@gmail.com
// License: GPL 2.0
// --------------------------------------------------------------

class AdvformPluginRmcommonPreload
{
    public function eventRmcommonFormLoader()
    {
        global $rmTpl;

        if (defined('ADVF_INCLUDED')) {
            return;
        }

        define('ADVF_INCLUDED', 1);
        $path = RMCPATH.'/plugins/advform/fields/';

        include $path.'webfonts.class.php';
        include $path.'imageurl.class.php';
        include $path.'slider.class.php';
        include $path.'colorselector.class.php';
        include $path.'imageselect.class.php';
        include $path.'iconpicker.class.php';

        $rmTpl->add_script('load-script.php?script=webfonts', 'rmcommon', array('footer' => 1, 'directory' => 'plugins/advform'));
        $rmTpl->add_script('advanced-fields.min.js', 'rmcommon', array('footer' => 1, 'directory' => 'plugins/advform', 'id' => 'advform-js'));
        $rmTpl->add_style('advforms.min.css', 'rmcommon', array('directory' => 'plugins/advform'));
        $rmTpl->add_head_script(include_once(RMCPATH.'/plugins/advform/js/adv-lang.php'));
    }

    public function eventRmcommonLoadFormField($ele, $field)
    {
        switch ($field->field) {
            case 'image-url':
                $ele = new RMFormImageUrl($field->caption, $field->name, $field->value);
                break;
        }

        return $ele;
    }
}
