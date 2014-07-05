<?php
// $Id: advform-plugin.php 11036 2013-02-12 04:03:30Z bitc3r0 $
// --------------------------------------------------------------
// AdvancedForm plugin for Common Utilities
// Improves rmcommon forms by adding new fields and controls
// Author: Eduardo Cortés <i.bitcero@gmail.com>
// Email: i.bitcero@gmail.com
// License: GPL 2.0
// --------------------------------------------------------------

class AdvformCUPlugin extends RMIPlugin
{
    
    public function __construct(){
        load_plugin_locale('advform', '', 'rmcommon');
        
        $this->info = array(
            'name'          => __('AdvancedForms Plugin', 'advform'),
            'description'   => __('Improves rmcommon forms by addign new fields and controls','advform'),
            'version'       => array('major'=>0,'minor'=>9,'revision'=>1, 'stage'=>-1,'name'=>'AdvancedForms'),
            'author'        => 'Eduardo Cortes',
            'email'         => 'i.bitcero@gmail.com',
            'web'           => 'http://www.redmexico.com.mx',
            'dir'           => 'advform',
            'updateurl'     => 'http://www.xoopsmexico.net/modules/vcontrol/?action=check&id=10',
            'hasmain'       => true
        );
        
    }
    
    public function on_install(){
        return true;
    }

    public function on_uninstall(){
        return true;
    }

    public function on_update(){
        return true;
    }

    public function on_activate($q){
        return true;
    }

    public function options(){

        //require 'include/options.php';
        return $options;

    }

    /**
     * Demo of elements
     */
    public function main(){

        RMTemplate::get()->header();

        echo '<h1 class="cu-section-title">' . __('Advanced Forms Demo', 'advform') . '</h1>';

        $form = new RMForm( '', '', '' );

        $color = new RMFormColorSelector( __('Pick a color:', 'advform'), 'color', '#FF0000', true );
        $form->addElement( $color );

        $image = new RMFormImageSelect( __('Pick an image:', 'advform' ), 'image', '' );
        $image->addImage('img_errors', XOOPS_URL . '/images/img_errors.png' );
        $image->addImage('password', XOOPS_URL . '/images/password.png' );
        $image->addImage('password', XOOPS_URL . '/images/poweredby.gif' );
        $form->addElement( $image );

        $imgurl = new RMFormImageUrl( __('Image URL:', 'advform'), 'url', 'http://xoops.org/themes/wox/images/giftshop.jpg' );
        $form->addElement( $imgurl );

        $font = new RMFormWebfonts( __('Pick a font:', 'advform'), 'font' );
        $form->addElement( $font );

        $slider = new RMFormSlider( __('Sliders Creator:', 'advform'), 'slider' );
        $slider->addField( 'title', array(
            'caption' => __('Specify the title for this slider','inception'),
            'description' => '',
            'type' => 'textbox'
        ));
        $slider->addField( 'content', array(
            'caption' => __('Text content','inception'),
            'description' => '',
            'type' => 'textarea'
        ));
        $slider->addField( 'image', array(
            'caption' => __('Select image for slider','inception'),
            'description' => __('Description for this field.','xthemes'),
            'type' => 'imageurl'
        ) );
        $form->addElement( $slider );

        $icon = new RMFormIconsPicker( __('Pick an icon:', 'advform') , 'icon', array(
            'selected' => 'fa fa-flag'
        ) );
        $icon->setDescription( __('With FontAwesome and Glyphicons active', 'advform'));
        $form->addElement( $icon );

        $icon = new RMFormIconsPicker( __('Pick an icon:', 'advform') , 'icon1', array(
            'selected' => 'glyphicon glyphicon-plus',
            'fontawesome' => 0
        ) );
        $icon->setDescription( __('Only Glyphicons active', 'advform'));
        $form->addElement( $icon );

        $icon = new RMFormIconsPicker( __('Pick an icon:', 'advform') , 'icon2', array(
            'selected' => 'fa fa-flag',
            'glyphicons' => 0
        ) );
        $icon->setDescription( __('Only FontAwesome active', 'advform'));
        $form->addElement( $icon );

        $form->display();

        RMTemplate::get()->footer();

    }
    
    
}
