<?php
/** -------------------------------------------------------
 * Single Event page
 * --------------------------------------------------------
 * 
 */
?>

<div>
    <div class="container mx-auto">
        <article>
            <!-- Title -->
            <h1 class="text-3xl font-bold mb-4"><?php echo $event['title'] ?></h1>
            
            <!-- Content -->
            <div class="event-card-details mb-6">
                <?php echo $event['details'] ?>
            </div>

            <!-- Speakers -->
            <div class="mb-4">
                <h2 class="font-bold mb-1 text-sm">Venue</h2>
                <?php echo $event['venue'] ?>
            </div>
            
            <!-- Venue -->
            <div class="mb-4">
                <h2 class="font-bold mb-1 text-sm">Venue</h2>
                <?php echo $event['venue'] ?>
            </div>

            <!-- Time and Date -->
            <div class="mb-4">
                <h2 class="font-bold mb-1 text-sm">Date and Time</h2>
                <?php echo $event['date']; ?>
            </div>
        </article>
    </div>
</div>