<?php
/** -------------------------------------------------------
 * Login Page to admin
 * --------------------------------------------------------
 * 
 */
?>

<div class="page-login pt-12">
	<div class="form-container mx-auto p-4 w-full lg:p-0 lg:w-2/5 flex flex-col aligns-center content-center">
		<h1 class="text-2xl font-bold mb-8 border-b-2 border-gray-200 pb-4">Login page</h1>

		<!-- Validation errors -->
		<?php if (validation_errors()) : ?>
			<div class="validation-errors py-4 px-5 bg-red-600 text-white text-sm mb-6">
				<?php echo validation_errors() ?>
			</div>
		<?php endif; ?>

		<?php 
		$label = "block font-bold text-normal mb-2";
		$input_container = "w-full mb-4";
		$input_form = "border border-gray-400 w-full py-2 px-3 text-gray-700 text-sm";
		?>

		<form action="/login" method="POST" class="">
			<!-- Username -->
			<div class="<?php echo $input_container ?>">
                        <label class="<?php echo $label ?>" for="username">Username <span class="text-red-500">*</span> </label>
                        <input type="text" class="<?php echo $input_form ?>" id="username" name="username" placeholder="Username">
                  </div>

			<!-- Password -->
			<div class="<?php echo $input_container ?>">
                        <label class="<?php echo $label ?>" for="password">Password <span class="text-red-500">*</span> </label>
                        <input type="password" class="<?php echo $input_form ?>" id="password" name="password" placeholder="Password">
                  </div>

			<!-- Login button -->
                  <div class="flex items-center justify-between">
                        <button class="bg-gray-800 hover:bg-gray-900 uppercase text-sm text-white font-bold py-2 px-6" 
					type="submit" name="update">
                              	Login
                        </button>
                  </div>
		</form>

		<div class="mt-8"><?php bdump($misc) ?></div>

	</div> <!-- form-container -->
</div> <!-- page-login -->