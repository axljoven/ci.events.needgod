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
                              <table id="registrants-table" class="w-full text-sm">
                                    <thead>
                                          <th class="text-left">Last name</th>
                                          <th class="text-left">First name</th>
                                          <th class="text-left">Email</th>
                                          <th class="text-left">Church Name</th>
                                          <th class="text-left">Status</th>
                                          <th class="">&nbsp;</th>
                                          <th class="">&nbsp;</th>
                                    </thead>
                                    <tbody>
                                          <?php foreach ($registrants as $key => $reg) : ?>
                                                      <?php $stat_class = "text-red text-sm flex align-center stat-popup-trigger popup" . $key ."_open" ?>
                                                      <tr>
                                                            <td><?php echo $reg['lastname'] ?></td>
                                                            <td><?php echo $reg['firstname'] ?></td>
                                                            <td><?php echo $reg['email'] ?></td>
                                                            <td><?php echo $reg['church_name'] ?></td>
                                                            <td><?php echo $reg['status'] ?></td>
                                                            <td>
                                                                  <a href="javascript:void(0)" data-pop-id="<?php echo $key ?>" class="<?php echo $stat_class ?>">
                                                                        <i class="icon ion-ios-create"></i> Change status
                                                                  </a>
                                                                  <div id="popup<?php echo $key ?>" class="hidden p-8 round-lg bg-white shadow-md w-1/3">
                                                                        <h4 class="mb-4 font-bold text-lg">
                                                                              <span class="text-sm">Change status for:</span> <br/>
                                                                              <?php echo $reg['lastname'] . ', ' . $reg['firstname'] . ' ' . $reg['middlename'] ?>
                                                                        </h4>

                                                                        <form action="">
                                                                              <select name="status" id="status" class="border border-gray-400 w-full py-2 px-3 text-gray-700 text-sm mb-3">
                                                                                    <option value="initial" <?php echo ($reg['status'] === 'initial') ? 'selected' : '' ?>>Initial</option>
                                                                                    <option value="paid" <?php echo ($reg['status'] === 'paid') ? 'selected' : '' ?>>Paid</option>
                                                                                    <option value="confirmed" <?php echo ($reg['status'] === 'confirmed') ? 'selected' : '' ?>>Confirmed</option>
                                                                              </select>
                                                                              <div class="flex items-center justify-between">
                                                                                    <button class="bg-blue-500 hover:bg-blue-700 uppercase text-sm text-white font-bold py-2 px-6" type="submit" name="update">Change Status</button>
                                                                              </div>
                                                                        </form>
                                                                  </div>
                                                            </td>
                                                            <td><a href="javascript:void(0)"><i class="icon ion-ios-more"></i></a></td>
                                                      </tr>
                                          <?php endforeach; ?>
                                    </tbody>
                              </table>
                  <?php else : ?>
                              <p>No registrants yet.</p>
                  <?php endif; ?>

                  

            </div> <!-- dashboard-main -->
      </div> <!-- flex flex-inline -->
</div>