
<div class="adv-icons-picker">

    <!-- Selected indicator -->
    <span class="btn btn-info <?php echo $this->size != '' ? 'btn-' . $this->size : ''; ?> adv-icon-selected">
        <span class="<?php echo $this->default; ?>"></span>
        <input type="hidden" id="<?php echo $this->id(); ?>" name="<?php echo $this->getName(); ?>" value="<?php echo $this->default; ?>">
    </span>

    <!--- FontAwesome Icons -->
    <?php if ( $this->fa ): ?>
    <div class="btn-group <?php echo $this->size != '' ? 'button-group-' . $this->size : ''; ?> adv-icons-fa" id="picker-<?php echo $this->id(); ?>">
        <button type="button" class="btn btn-default dropdown-toggle<?php echo substr( $this->default, 0, 2)=='fa' ? ' active' : ''; ?>" data-toggle="dropdown">
            <span class="the-icon"><?php _e('FontAwesome', 'advform'); ?></span>
            <span class="caret"></span>
        </button>
        <div class="dropdown-menu" role="menu">
            <div class="icons-container">
                <span class="fa fa-spin fa-spinner"></span>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if ( $this->glyph ): ?>
    <!-- Glyphicons Icons -->
    <div class="btn-group <?php echo $this->size != '' ? 'button-group-' . $this->size : ''; ?> adv-icons-glyph" id="picker-<?php echo $this->id(); ?>">
        <button type="button" class="btn btn-default dropdown-toggle<?php echo substr( $this->default, 0, 9)=='glyphicon' ? ' active' : ''; ?>" data-toggle="dropdown">
            <span class="the-icon"><?php _e('Glyphicons', 'advform'); ?></span>
            <span class="caret"></span>
        </button>
        <div class="dropdown-menu" role="menu">
            <div class="icons-container">
                <span class="fa fa-spin fa-spinner"></span>
            </div>
        </div>
    </div>
    <?php endif; ?>

</div>

