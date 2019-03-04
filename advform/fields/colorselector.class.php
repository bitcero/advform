<?php
// $Id: colorselector.class.php 11036 2013-02-12 04:03:30Z bitc3r0 $
// --------------------------------------------------------------
// AdvancedForm plugin for Common Utilities
// Improves rmcommon forms by adding new fields and controls
// Author: Eduardo Cortés <i.bitcero@gmail.com>
// Email: i.bitcero@gmail.com
// License: GPL 2.0
// --------------------------------------------------------------

class RMFormColorSelector extends RMFormElement
{
    public function __construct($caption, $name, $initial, $addsharp = false)
    {
        $this->suppressList[] = 'initial';
        $this->suppressList[] = 'sharp';
        $this->suppressList[] = 'id';

        if (is_array($caption)) {
            parent::__construct($caption);
        } else {
            parent::__construct([]);
            $this->setWithDefaults('caption', $caption, '');
            $this->setWithDefaults('name', $name, '');
            $this->setWithDefaults('initial', $initial, '');
            $this->setWithDefaults('sharp', $addsharp, false);
        }

        $this->setIfNotSet('sharp', false);

        $this->addClass('input-group adv-color-chooser');

        if ($addsharp && '' != $initial) {
            if (!preg_match('/^#[a-f0-9]{1,}$/is', $initial) && 'transparent' != $initial) {
                $this->set('initial', '#' . $initial);
            } else {
                $this->set('initial', $initial);
            }
        } else {
            $this->set('initial', str_replace('#', '', $initial));
        }
    }

    public function render()
    {
        global $rmTpl;

        $attributes = $this->renderAttributeString();

        $rmTpl->add_style('colorpicker.css', 'rmcommon');
        $rmTpl->add_script('colorpicker.js', 'rmcommon');

        $ret = '<div ' . $attributes . ' id="adv-color-' . $this->get('id') . '">';
        $ret .= '<span class="input-group-addon previewer" style="background-color: ' . (!$this->get('sharp') ? '#' . $this->get('initial') : $this->get('initial')) . ';">&nbsp;</span>';
        $ret .= '<input class="form-control" ' . ($this->get('sharp') ? 'data="#"' : '') . ' type="text" name="' . $this->get('name') . '" id="' . $this->get('id') . '" value="' . ('' != $this->get('initial') ? $this->get('initial') : ($this->get('sharp') ? '#' : '') . 'FFF') . '">';
        $ret .= '<span class="input-group-btn chooser"><button type="button" class="btn btn-default">...</button></span>';
        $ret .= '</div>';

        return $ret;
    }
}
