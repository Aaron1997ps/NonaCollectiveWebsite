<?php

function prnt($name) {
    echo(MDatabaseElement::getDescription($name));
}
?>

<div class="m-module m-element-slider" id="slider">
    <div class="m-module-content">
        <img class="m-arrow m-left" src="assets/img/icons/amaranth-arrow-left.svg">
        <img class="m-arrow m-right" src="assets/img/icons/amaranth-arrow-right.svg">
        <div class='m-elements-text-container'>
            <h3 class='m-text-title'>Metal</h3>
            <img class='m-down-arrow' src='assets/img/icons/slider-arrow-down.svg'>
            <p class='m-text-desc'>Look at this cool stone.. Its not a stone, its metal but who cares. Look at this cool stone.. Its not a stone, its metal but who cares.Look at this cool stone.. Its not a stone, its metal but who cares.Look at this cool stone.. Its not a stone, its metal but who cares.Look at this cool stone.. Its not a stone, its metal but who cares. (Aaron does, duh)</p>
        </div>
        <div class="m-elements-container">
            <img class="m-element m-01" src="assets/img/player/earth.png" name="Earth"      description="<?php prnt("Earth")?>">
            <img class="m-element m-02" src="assets/img/player/fire.png" name="Fire"        description="<?php prnt("Fire")?>">
            <img class="m-element m-03" src="assets/img/player/ice.png" name="Ice"          description="<?php prnt("Ice")?>">
            <img class="m-element m-04" src="assets/img/player/neutral.png" name="Neutral"  description="<?php prnt("Neutral")?>">
            <img class="m-element m-05" src="assets/img/player/metal.png" name="Metal"      description="<?php prnt("Metal")?>">
            <img class="m-element m-06" src="assets/img/player/water.png" name="Water"      description="<?php prnt("Water")?>">
            <img class="m-element m-07" src="assets/img/player/shadow.png" name="Shadow"    description="<?php prnt("Shadow")?>">
            <img class="m-element m-08" src="assets/img/player/nature.png" name="Nature"    description="<?php prnt("Nature")?>">
            <img class="m-element m-09" src="assets/img/player/light.png" name="Light"      description="<?php prnt("Light")?>">
        </div>
    </div>
</div>
