<div class="">
	<h2 class="text-3xl mb-4">Registration</h2>

	<?php 
    // Input classes 
    $label = "block text-sm mb-2";
    $input_container = "w-full mb-4 px-6";
    $input_container_2_cols = "w-full sm:w-full md:w-1/2 mb-4 px-6";
    $input_container_3_cols = "w-full sm:w-full md:w-1/3 mb-4 px-6";
    $input_form = "border border-gray-400 w-full py-2 px-3 text-gray-700 text-sm";
    
    ?>

	<!-- Validation and form opening -->
	<?php if (validation_errors()) : ?>
	<div class="validation-errors py-4 px-5 bg-red-600 text-white mb-6">
		<?php echo validation_errors() ?>
	</div>
	<?php endif; ?>

	<!-- Form -->
	<?php // echo form_open('register/'.$event['id']); ?>
	<?php // echo form_open('event/'.$event['id'].'/register'); ?>
	<?php echo form_open('event/'.$event['id']); ?>
	<!-- HEADER: Personal information -->
	<h3 class="text-2xl mb-4">Personal Information</h3>

	<!-- Row -->
	<div class="-px-6">
		<div class="flex-none md:flex -mx-6">
			<!-- Last name -->
			<div class="<?php echo $input_container_2_cols ?>">
				<label class="<?php echo $label ?>" for="lastname">Lastname <span class="text-red-500">*</span> </label>
				<input class="<?php echo $input_form ?>" id="lastname" name="lastname" placeholder="Enter last name"
					value="<?php echo set_value('lastname') ?>">
			</div>

			<!-- First name -->
			<div class="<?php echo $input_container_2_cols ?>">
				<label class="<?php echo $label ?>" for="firstname">Firstname <span class="text-red-500">*</span>
				</label>
				<input class="<?php echo $input_form ?>" id="firstname" name="firstname" placeholder="Enter first name"
					value="<?php echo set_value('firstname') ?>">
			</div>
		</div>
	</div>

	<!-- Row -->
	<div class="-px-6">
		<div class="flex-none md:flex -mx-6">
			<!-- Middle name -->
			<div class="<?php echo $input_container_2_cols ?>">
				<label class="<?php echo $label ?>" for="middlename">Middlename <span class="text-red-500">*</span>
				</label>
				<input class="<?php echo $input_form ?>" id="middlename" name="middlename"
					placeholder="Enter middle name" value="<?php echo set_value('middlename') ?>">
			</div>

			<!-- Nickname -->
			<div class="<?php echo $input_container_2_cols ?>">
				<label class="<?php echo $label ?>" for="nickname">Nickname</label>
				<input class="<?php echo $input_form ?>" id="nickname" name="nickname" placeholder="Enter nickname"
					value="<?php echo set_value('nickname') ?>">
			</div>
		</div>
	</div>

	<!-- Row -->
	<div class="-px-6">
		<div class="flex-none md:flex -mx-6">
			<!-- Gender -->
			<div class="<?php echo $input_container_3_cols ?>">
				<label class="<?php echo $label ?>" for="gender">Gender</label>
				<select class="<?php echo $input_form ?>" id="gender" name="gender">
					<option>Male</option>
					<option>Female</option>
				</select>
			</div>

			<!-- Email -->
			<div class="<?php echo $input_container_3_cols ?>">
				<label class="<?php echo $label ?>" for="email">Email <span class="text-red-500">*</span></label>
				<input class="<?php echo $input_form ?>" id="email" name="email" placeholder="Enter valid email"
					value="<?php echo set_value('email') ?>">
			</div>

			<!-- Mobile Number -->
			<div class="<?php echo $input_container_3_cols ?>">
				<label class="<?php echo $label ?>" for="mobile-number">Mobile Number <span
						class="text-red-500">*</span></label>
				<input class="<?php echo $input_form ?>" id="mobile-number" name="mobile-number"
					placeholder="Enter mobile number" value="<?php echo set_value('mobile-number') ?>">
			</div>
		</div>
	</div>

	<!-- HEADER: Church / Organization -->
	<h3 class="text-2xl mb-4 mt-6">Church/Organization</h3>

	<!-- Row -->
	<div class="-px-6">
		<div class="flex-none md:flex -mx-6">
			<!-- Church / Organization name -->
			<div class="<?php echo $input_container_2_cols ?>">
				<label class="<?php echo $label ?>" for="church-name">Name <span class="text-red-500">*</span></label>
				<input class="<?php echo $input_form ?>" id="church-name" name="church-name"
					placeholder="Enter church / organization" value="<?php echo set_value('church-name') ?>">
			</div>

			<!-- Nickname -->
			<div class="<?php echo $input_container_2_cols ?>">
				<label class="<?php echo $label ?>" for="church-city">City <span class="text-red-500">*</span></label>
				<input class="<?php echo $input_form ?>" id="church-city" name="church-city" placeholder="Enter city"
					value="<?php echo set_value('church-city') ?>">
			</div>
		</div>
	</div>

	<!-- Row -->
	<div class="-px-6">
		<div class="flex-none md:flex -mx-6">
			<!-- Role -->
			<div class="<?php echo $input_container ?>">
				<label class="<?php echo $label ?>" for="role">Role <span class="text-red-500">*</span></label>
				<select class="<?php echo $input_form ?>" id="role" name="role">
					<option value="pastor">Pastor</option>
					<option value="elder">Elder</option>
					<option value="deacon">Deacon</option>
					<option value="member">Member</option>
					<option value="others">Others</option>
				</select>
			</div>
		</div>
	</div>

	<!-- Register button -->
	<div class="flex items-center justify-between">
		<button class="bg-blue-500 hover:bg-blue-700 uppercase text-sm text-white font-bold py-2 px-6" type="submit"
			name="submit">
			Register
		</button>
	</div>

	<?php echo form_close(); ?>
</div>
