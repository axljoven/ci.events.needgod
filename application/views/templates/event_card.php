<div class="event-card shadow shadow-md p-12 mb-6">
	<article>
		<!-- Title -->
		<h1 class="event-card-title text-2xl font-bold mb-4">
			<a href="event/<?php echo $event['id'] ?>"><?php echo $event['title'] ?></a>
		</h1>

		<!-- Details -->
		<div class="event-card-details mb-6"><?php echo excerpt($event['details']) ?></div>

		<!-- Speakers -->
		<div class="border-l-4 border-color-100 pl-4 mb-4">
			<h2 class="font-bold mb-1 text-sm">Speakers</h2>
			<?php echo $event['speakers'] ?>
		</div>

		<!-- Venue -->
		<div class="border-l-4 border-color-100 pl-4 mb-4">
			<h2 class="font-bold mb-1 text-sm">Venue</h2>
			<?php echo $event['venue'] ?>
		</div>

		<!-- Time and Date -->
		<div class="border-l-4 border-color-100 pl-4 mb-4">
			<h2 class="font-bold mb-1 text-sm">Date and Time</h2>
			<?php echo $event['date']; ?>
		</div>
	</article>
</div>