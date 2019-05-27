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
                        <!-- Event title -->
                        <h2 class="text-2xl font-bold mb-3"><?php echo $event['title'] ?></h2>
                        <div class="controls mb-12">
                              <a href="" class="controls-add"><i class="icon ion-ios-add"></i></a>
                              <a href="" class="controls-delete"><i class="icon ion-ios-trash"></i></a>
                        </div>
                  <?php endif; ?>

                  <!-- Edit form -->
                  <?php
                  $label = "block font-bold text-normal mb-2";
                  $input_container = "w-full mb-8";
                  $input_form = "border border-gray-400 w-full py-2 px-3 text-gray-700 text-sm";
                  ?>

                  <form action="" class="edit-event-form" method="post">

                        <!-- Status -->
                        <div class="<?php echo $input_container ?>">
                              <label class="<?php echo $label ?>" for="status">Status</label>
                              <select class="<?php echo $input_form ?>" id="status">
                                    <option value="inactive" 
                                          selected="<?php echo ($event['status'] === 'inactive') ? 'selected' : '' ?>">
                                                Inactive
                                    </option>
                                    <option value="active" 
                                          selected="<?php echo ($event['status'] === 'active') ? 'selected' : '' ?>">
                                                Active
                                    </option>
                              </select>
                        </div>
                  
                        <!-- Title -->
                        <div class="<?php echo $input_container ?>">
                              <label class="<?php echo $label ?>" for="title">Title <span class="text-red-500">*</span> </label>
                              <input class="<?php echo $input_form ?>" id="title" name="title" placeholder="Title"
                                    value="<?php echo $event['title'] ?>">
                        </div>

                        <!-- Details -->
                        <div class="<?php echo $input_container ?>">
                              <label class="<?php echo $label ?>" for="details">Details <span class="text-red-500">*</span> </label>
                              <textarea rows="20" cols="20" class="tinymce <?php echo $input_form ?>" id="details" name="details" 
                                    placeholder="Details">
                                          <?php echo $event['details'] ?>
                              </textarea>
                        </div>

                        <!-- Speakers -->
                        <div class="<?php echo $input_container ?>">
                              <label class="<?php echo $label ?>" for="speakers">Speakers <span class="text-red-500">*</span> </label>
                              <textarea rows="5" cols="20" class="tinymce <?php echo $input_form ?>" id="speakers" name="speakers" 
                                    placeholder="Speakers">
                                          <?php echo $event['speakers'] ?>
                              </textarea>
                        </div>

                        <!-- Speakers -->
                        <div class="<?php echo $input_container ?>">
                              <label class="<?php echo $label ?>" for="venue">Venue <span class="text-red-500">*</span> </label>
                              <textarea rows="10" cols="20" class="tinymce <?php echo $input_form ?>" id="venue" name="venue" 
                                    placeholder="Venue">
                                          <?php echo $event['venue'] ?>
                              </textarea>
                        </div>

                        <!-- Reg fee -->
                        <div class="<?php echo $input_container ?>">
                              <label class="<?php echo $label ?>" for="reg_fee">Registration Fee <span class="text-red-500">*</span> </label>
                              <input class="<?php echo $input_form ?>" id="reg_fee" name="reg_fee" placeholder="Registration fee"
                                    value="<?php echo $event['reg_fee'] ?>">
                        </div>

                        <!-- Reg fee details -->
                        <div class="<?php echo $input_container ?>">
                              <label class="<?php echo $label ?>" for="reg_fee_details">Registration Fee details <span class="text-red-500">*</span> </label>
                              <textarea rows="10" cols="20" class="tinymce <?php echo $input_form ?>" id="reg_fee_details" name="reg_fee_details" 
                                    placeholder="Registration fee details">
                                          <?php echo $event['reg_fee_details'] ?>
                              </textarea>
                        </div>

                        <!-- Image -->
                        <div class="<?php echo $input_container ?>">
                              <label class="<?php echo $label ?>" for="image">Image <span class="text-red-500">*</span> </label>
                              
                              <?php if (isset($event['image'])) : ?>
                                    <img src="<?php echo $event['image'] ?>" alt="" srcset="">
                              <?php endif; ?>

                              <input type="file" name="image" id="image">
                        </div>

                        <!-- Start / End date -->
                        <div class="<?php echo $input_container ?>">
                              <div class="block lg:flex flex-inline -mx-4">

                                    <!-- Start date -->
                                    <div class="w-full px-4 mb-8 lg:mb-0">
                                          <label class="<?php echo $label ?>" for="date_start">Start date <span class="text-red-500">*</span> </label>
                                          <input class="<?php echo $input_form ?> datepicker" id="date_start" name="date_start" placeholder="Start date"
                                                value="<?php echo $event['date_start'] ?>">
                                    </div>

                                    <!-- End date -->
                                    <div class="w-full px-4 mb-8 lg:mb-0">
                                          <label class="<?php echo $label ?>" for="date_end">End date <span class="text-red-500">*</span> </label>
                                          <input class="<?php echo $input_form ?> datepicker" id="date_end" name="date_end" placeholder="End date"
                                                value="<?php echo $event['date_end'] ?>">
                                    </div>

                              </div> <!-- flex -->
                        </div>

                        <!-- Date details -->
                        <div class="<?php echo $input_container ?>">
                              <label class="<?php echo $label ?>" for="date">Date details <span class="text-red-500">*</span> </label>
                              <textarea rows="10" cols="20" class="tinymce <?php echo $input_form ?>" id="date" name="date" 
                                    placeholder="Date details">
                                          <?php echo $event['date'] ?>
                              </textarea>
                        </div>

                        <!-- Update button -->
                        <div class="flex items-center justify-between">
                              <button class="bg-blue-500 hover:bg-blue-700 uppercase text-sm text-white font-bold py-2 px-6" type="submit"
                                    name="update">
                                    Update Event
                              </button>
                        </div>

                  </form>

            </div> <!-- dashboard-main -->
      </div> <!-- flex flex-inline -->
</div>