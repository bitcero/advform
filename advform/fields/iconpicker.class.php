<?php
// $Id$
// --------------------------------------------------------------
// AdvancedForm plugin for Common Utilities
// Improves rmcommon forms by adding new fields and controls
// Author: Eduardo Cortés <i.bitcero@gmail.com>
// Email: i.bitcero@gmail.com
// License: GPL 2.0
// --------------------------------------------------------------

class RMFormIconsPicker extends RMFormElement
{
    private $default = '';
    private $size = '';
    private $fa = 1;
    private $glyph = 1;

    /**
     * Class constructor
     * @param string $caption Caption to render for field
     * @param string $name Name of the field (the id will be generated from this)
     * @param array $options Array with additional options for control. Options can be:
     * <ul>
     * <li><strong>'selected'</strong>: contains the initial value for control.</li>
     * <li><strong>'size'</strong>: size of the control. Can be <ul><li>lg</li><li>sm</li><li>xs</li><li>or leave blank for default size</li></ul></li>
     * <li><strong>'fontawesome'</strong>: Can be 1 or 0 and indicate if the control must show FontAwesome icons or not (<em>Default value: 1</em>).</li>
     * <li><strong>'glyphicons'</strong>: Can be 1 or 0 and indicates if the control must show Glyphicons or not (<em>Default value: 1</em>)</li>
     * </ul>
     */
    public function __construct( $caption, $name, $options = array() ){

        $this->setCaption( $caption );
        $this->setName( $name );
        $this->default = isset( $options['selected'] ) ? $options['selected'] : '';
        $this->fa = isset( $options['fontawesome'] ) ? $options['fontawesome'] : 1;
        $this->glyph = isset( $options['glyphicons'] ) ? $options['glyphicons'] : 1;

        $size = isset( $options['size'] ) ? $options['size'] : '';
        $accepted_sizes = array('lg','sm','xs');
        $this->size = in_array( $size, $accepted_sizes ) ? $size : '';

    }

    public function render(){

        RMTemplate::get()->add_script( 'icon-picker.js', 'rmcommon', array('directory' => 'plugins/advform' ) );
        RMTemplate::get()->add_style( 'bootstrap-iconpicker.min.css', 'rmcommon', array('directory' => 'plugins/advform' ) );

        include RMCPATH . '/plugins/advform/templates/icon-picker.php';

    }

}