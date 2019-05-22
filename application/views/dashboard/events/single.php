
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
                        <h2 class="text-2xl font-bold mb-3"><?php echo $event['title'] ?></h2>
                        <!-- <div><?php // echo $event['details'] ?></div> -->
                  <?php endif; ?>

            </div>
      </div>
</div>