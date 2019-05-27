<div class="dashboard">
      <div class="flex flex-inline">
            <h1 class="hidden">Dashboard: Event</h1>

            <!-- Sidebar -->
            <div class="dashboard-sidebar p-8">
                  <?php include(APPPATH.'views/templates/dashboard-sidebar.php') ?>
            </div>

            <!-- Main -->
            <div class="dashboard-main p-8">

                  <?php if (isset($event)) : ?>
                        <!-- Event title and controls -->
                        <h2 class="text-2xl font-bold mb-3">
                              <span class="text-lg">Registrants for:</span> <br>
                              <?php echo $event['title'] ?>
                        </h2>
                        <div class="controls mb-12">
                              <a href="" class="controls-add"><i class="icon ion-ios-add"></i></a>
                        </div>
                  <?php endif; ?>

                  <?php if (isset($registrants)) : ?>
                              <?php bdump($registrants) ?>
                  <?php else : ?>
                              <p>No registrants yet.</p>
                  <?php endif; ?>

                  

            </div> <!-- dashboard-main -->
      </div> <!-- flex flex-inline -->
</div>