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
                  <?php //bdump($event); ?>
                        <!-- Event title -->
                        <h2 class="text-2xl font-bold mb-3"><?php echo $event['title'] ?></h2>
                  <?php endif; ?>

                  <!-- Edit form -->
                  <?php
                  $label = "block font-bold text-normal mb-2";
                  $input_container = "w-full mb-8";
                  // $input_container_2_cols = "w-full sm:w-full md:w-1/2 mb-4 px-6";
                  // $input_container_3_cols = "w-full sm:w-full md:w-1/3 mb-4 px-6";
                  $input_form = "border border-gray-400 w-full py-2 px-3 text-gray-700 text-sm";
                  ?>

                  <form action="" class="edit-event-form" method="post">
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

                        <!-- Start date -->
                        <div class="<?php echo $input_container ?>">
                              <div class="block lg:flex flex-inline -mx-4">
                                    <div class="w-full px-4 mb-8 lg:mb-0">
                                          <label class="<?php echo $label ?>" for="date_start">Start date <span class="text-red-500">*</span> </label>
                                          <input class="<?php echo $input_form ?> datepicker" id="date_start" name="date_start" placeholder="Start date"
                                                value="<?php echo $event['date_start'] ?>">
                                    </div>
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

                        



                  </form>

            </div>
      </div>
</div>