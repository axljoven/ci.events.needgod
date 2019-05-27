
<div class="dashboard">
      <div class="flex flex-inline">
            <h1 class="hidden">Dashboard: Registrants</h1>

            <!-- Sidebar -->
            <div class="dashboard-sidebar p-8">
                  <?php include(APPPATH.'views/templates/dashboard-sidebar.php') ?>
            </div>

            <!-- Main -->
            <div class="dashboard-main p-8">

                  <!-- Title and controls -->
                  <h2 class="text-2xl font-bold mb-3">Registrants</h2>
                  
                  <!-- Events -->
                  <?php if (count($events) > 0) : foreach ($events as $key => $event) : ?>

                              <a href="/dashboard/registrants/<?php echo $event['id'] ?>">
                                    <article class="card p-6 shadow-md hover:shadow-lg">
                                          <h1 class="text-lg font-bold text-gray-700 flex flex-inline items-center align-center">
                                                <?php echo $event['title'] ?>
                                          </h1>
                                          <p>
                                                <span class="font-bold text-gray-500">Status</span>: <?php echo $event['status'] ?>
                                                <span class="font-bold text-gray-500 ml-4">Registered:</span> <?php echo $event['reg_count'] ?>
                                          </p>
                                    </article>
                              </a>
                  
                  <?php endforeach; else : ?>
                  
                              <article class="card p-8 shadow-md">
                                    <p>No upcoming events.</p>
                              </article>
                              
                  <?php endif; ?>

            </div>
      </div>
</div>