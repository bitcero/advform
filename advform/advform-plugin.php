<?php
/**
 * Advanced Form Fields for Common Utilities
 *
 * Copyright © 2015 Eduardo Cortés http://www.redmexico.com.mx
 * -------------------------------------------------------------
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301, USA.
 * -------------------------------------------------------------
 * @copyright    Eduardo Cortés (http://www.redmexico.com.mx)
 * @license      GNU GPL 2
 * @package      advform
 * @author       Eduardo Cortés (AKA bitcero)    <i.bitcero@gmail.com>
 * @url          http://www.redmexico.com.mx
 * @url          http://www.eduardocortes.mx
 */

class AdvformCUPlugin extends RMIPlugin
{
    public function __construct()
    {
        load_plugin_locale('advform', '', 'rmcommon');

        $this->info = array(
            'name'          => __('AdvancedForms Plugin', 'advform'),
            'description'   => __('Improves rmcommon forms by addign new fields and controls', 'advform'),
            'version'       => array('major'=>1,'minor'=>0,'revision'=>5, 'stage'=>0,'name'=>'AdvancedForms'),
            'author'        => 'Eduardo Cortes (AKA bitcero)',
            'email'         => 'i.bitcero@gmail.com',
            'web'           => 'http://www.redmexico.com.mx',
            'dir'           => 'advform',
            'updateurl'     => 'http://www.xoopsmexico.net/modules/vcontrol/',
            'hasmain'       => true
        );
    }

    public function on_install()
    {
        return true;
    }

    public function on_uninstall()
    {
        return true;
    }

    public function on_update()
    {
        return true;
    }

    public function on_activate($q)
    {
        return true;
    }

    public function options()
    {
        return null;
    }

    /**
     * Demo of elements
     */
    public function main()
    {
        RMTemplate::get()->header();

        echo '<h1 class="cu-section-title">' . __('Advanced Forms Demo', 'advform') . '</h1>';

        $form = new RMForm('', '', '');

        $color = new RMFormColorSelector(__('Pick a color:', 'advform'), 'color', '#FF0000', true);
        $form->addElement($color);

        $image = new RMFormImageSelect(__('Pick an image:', 'advform'), 'image', '');
        $image->addImage('img_errors', XOOPS_URL . '/images/img_errors.png');
        $image->addImage('password', XOOPS_URL . '/images/password.png');
        $image->addImage('password', XOOPS_URL . '/images/poweredby.gif');
        $form->addElement($image);

        $imgurl = new RMFormImageUrl(__('Image URL:', 'advform'), 'url', 'http://xoops.org/themes/wox/images/giftshop.jpg');
        $form->addElement($imgurl);

        $font = new RMFormWebfonts(__('Pick a font:', 'advform'), 'font');
        $form->addElement($font);

        $slider = new RMFormSlider(__('Sliders Creator:', 'advform'), 'slider');
        $slider->addField('title', array(
            'caption' => __('Specify the title for this slider', 'inception'),
            'description' => '',
            'type' => 'textbox'
        ));
        $slider->addField('content', array(
            'caption' => __('Text content', 'inception'),
            'description' => '',
            'type' => 'textarea'
        ));
        $slider->addField('image', array(
            'caption' => __('Select image for slider', 'inception'),
            'description' => __('Description for this field.', 'xthemes'),
            'type' => 'imageurl'
        ));
        $form->addElement($slider);

        //--
        $icon = new RMFormIconsPicker(__('All icons:', 'advform'), 'icon', array(
            'selected' => 'fa fa-flag',
            'moon' => true,
            'fontawesome' => true,
            'glyphicons' => true,
            'svg' => true
        ));
        $icon->setDescription(__('With FontAwesome and Glyphicons active', 'advform'));
        $form->addElement($icon);

        //--
        $icon = new RMFormIconsPicker(__('Glyphicons Icons:', 'advform'), 'icon1', array(
            'selected' => 'glyphicon glyphicon-plus',
            'fontawesome' => false,
            'svg' => false
        ));
        $icon->setDescription(__('Only Glyphicons active', 'advform'));
        $form->addElement($icon);

        //--
        $icon = new RMFormIconsPicker(__('FontAwesome Icons:', 'advform'), 'icon2', array(
            'selected' => 'fa fa-flag',
            'glyphicons' => false,
            'svg' => false
        ));
        $icon->setDescription(__('Only FontAwesome active', 'advform'));
        $form->addElement($icon);

        //--
        $icon = new RMFormIconsPicker(__('SVG Icons:', 'advform'), 'icon3', array(
            'selected' => 'svg-rmcommon-xoops',
            'glyphicons' => false,
            'fontawesome' => false
        ));
        $icon->setDescription(__('Only FontAwesome active', 'advform'));
        $form->addElement($icon);

        $form->display();

        RMTemplate::get()->footer();
    }

    public static function getInstance()
    {
        static $instance;

        if (!isset($instance)) {
            $instance = new AdvformCUPlugin();
        }

        return $instance;
    }
}
