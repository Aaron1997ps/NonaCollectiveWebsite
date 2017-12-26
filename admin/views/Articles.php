<?php
function insertElement($name) {?>
    <div class="m-card" name="<?php echo($name) ?>">
                <div class="m-ico">
                    <img src="../../assets/img/player/<?php echo($name) ?>.png" alt="">
                </div>
                <div class="m-text">
                    <div class="m-title">
                        <?php echo(ucwords($name)) ?>
                    </div>
                </div>
                <div style="display: none" class="m-description" contenteditable="true">
        LOADING....
                </div>
                <div class="m-button-container">
                    <div class="m-save" style="display: none">
                        <div class="m-text">Save</div>
                    </div>
                </div>
            </div>
<?php
}
?>

<div class="m-view m-view-articles" style="display: none">
    <div class="m-header">
        <div class="m-title-container">
            <div class="m-title">
                Modules
            </div>
            <div class="m-subtitle">
                Elements
            </div>
        </div>
    </div>

    <div class="m-content">
        <div class="m-cards">
            <?php
            insertElement('earth');
            insertElement('fire');
            insertElement('ice');
            insertElement('light');
            insertElement('metal');
            insertElement('nature');
            insertElement('neutral');
            insertElement('shadow');
            insertElement('water');
            ?>
        </div>
    </div>
</div>