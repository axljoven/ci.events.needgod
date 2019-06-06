
<div class="dashboard">
      <div class="flex flex-inline">
            <h1 class="hidden">Dashboard</h1>

            <!-- Sidebar -->
            <div class="dashboard-sidebar p-8">
                  <?php include(APPPATH.'views/templates/dashboard-sidebar.php') ?>
            </div>

            <!-- Main -->
            <div class="dashboard-main p-8">
                  <h1 class="text-2xl font-bold">Welcome to Dashboard</h1>
                  <!-- Events -->
                  <!-- <h2 class="text-2xl font-bold mb-3">Events</h2>
                  
                  <?php //if (count($events) > 0) : foreach ($events as $key => $event) : ?>
                              <?php //include(APPPATH.'/views/dashboard/dashboard-card.php') ?>
                  <?php //endforeach; else : ?>
                              <article class="card p-8 shadow-md">
                                    <p>No upcoming events.</p>
                              </article>
                  <?php //endif; ?> -->

                  <div class="mt-8"><?php bdump($misc) ?></div>
                  
            </div>
      </div>
</div>