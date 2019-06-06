<?php
/** -------------------------------------------------------
 * Single Event page
 * --------------------------------------------------------
 * 
 */
?>

<div>
	<div class="container mx-auto px-6">
		<article class="mb-8 pb-6 border-b border-b-gray-100 pt-12">
			<!-- Title -->
			<h1 class="text-3xl font-bold mb-4"><?php echo $event['title'] ?></h1>

			<!-- Content -->
			<div class="event-card-details mb-12">
				<?php echo $event['details'] ?>
			</div>

			<!-- Speakers -->
			<div class="mb-6">
				<h2 class="font-bold mb-1 text-sm flex items-center">
					<i class="icon ion-ios-person text-red-600 mr-2"></i> Speaker(s)
				</h2>
				<p class=""><?php echo $event['speakers'] ?></p>
			</div>

			<!-- Reg fee -->
			<div class="mb-6">
				<h2 class="font-bold mb-1 text-sm flex items-center">
					<i class="icon ion-ios-pricetag text-red-600 mr-2"></i> Registration fee
				</h2>
				<p class=""><?php echo $event['reg_fee_details'] ?></p>
			</div>

			<!-- Venue -->
			<div class="mb-6">
				<h2 class="font-bold mb-1 text-sm flex items-center">
					<i class="icon ion-ios-map text-red-600 mr-2"></i> Venue
				</h2>
				<p class=""><?php echo $event['venue'] ?></p>
			</div>

			<!-- Time and Date -->
			<div class="mb-6">
				<h2 class="font-bold mb-1 text-sm flex items-center">
					<i class="icon ion-ios-calendar text-red-600 mr-2"></i> Date and Time
				</h2>
				<p class=""><?php echo $event['date']; ?></p>
			</div>
		</article>

		<!-- Registration form -->
		<?php include('reg-form.php') ?>
	</div>
</div>
