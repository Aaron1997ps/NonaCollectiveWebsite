<?php

$elements = MDatabaseElement::getAllDescriptions();
?>

<div class="m-module m-element-slider m-inset" id="slider">
    <div class="m-module-content">
        <img class="m-arrow m-left" src="assets/img/icons/amaranth-arrow-left.svg">
        <img class="m-arrow m-right" src="assets/img/icons/amaranth-arrow-right.svg">
        <div class='m-elements-text-container'>
            <h3 class='m-text-title'>Metal</h3>
            <img class='m-down-arrow' src='assets/img/icons/slider-arrow-down.svg'>
            <p class='m-text-desc'>Look at this cool stone.. Its not a stone, its metal but who cares. Look at this cool stone.. Its not a stone, its metal but who cares.Look at this cool stone.. Its not a stone, its metal but who cares.Look at this cool stone.. Its not a stone, its metal but who cares.Look at this cool stone.. Its not a stone, its metal but who cares. (Aaron does, duh)</p>
        </div>
        <div class="m-elements-container">
            <?php
            $i = 1;
            foreach (array_keys($elements) as $element) {
                ?>
                <img class="m-element m-0<?php echo($i);?>" src="assets/img/player/<?php echo($element) ?>.png" name="<?php echo(ucwords($element)) ?>" description="<?php echo($elements[$element]) ?>">
                <?php
                $i++;
            }
            ?>

        </div>
    </div>
</div>
