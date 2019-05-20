<?php
/** -------------------------------------------------------
 * This will serve as the Home page
 * --------------------------------------------------------
 * 
 */
?>

<div>
    <div class="container mx-auto px-6">
        <h1 class="hidden">Home</h1>
        <?php 
        foreach ($events as $key => $event) :
            include(APPPATH."views/templates/event_card.php");
        endforeach;
        ?>
    </div>
</div>