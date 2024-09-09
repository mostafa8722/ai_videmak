<?php if(config('frontend.custom_url.status') == 'on'): ?>
    <script type="text/javascript">
		window.location.href = "<?php echo e(config('frontend.custom_url.link')); ?>"
	</script>
<?php else: ?>

<!DOCTYPE html>
<html lang="<?php echo e(LaravelLocalization::getCurrentLocale()); ?>" dir="<?php echo e(LaravelLocalization::getCurrentLocaleDirection()); ?>">
	<head>
		<!-- Meta Data -->
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <meta name="robots" content="index, follow">	   
        <meta name="revisit-after" content="7 days">	   
        <meta name="distribution" content="web">	
		
		<?php echo $__env->yieldContent('metadata'); ?>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

		<?php echo $__env->make('layouts.frontend.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		<?php
			$scss_path = 'resources/views/' . get_theme() . '/scss/frontend.scss';
		?>

		<!-- All Styles -->
		<?php echo app('Illuminate\Foundation\Vite')($scss_path); ?>

		<!--Google AdSense-->
		<?php echo adsense_header(); ?>


		<!--Custom Header JS Code-->
		<?php if($frontend_settings): ?>
			<?php if(!is_null($frontend_settings->custom_header_code)): ?> 
				<?php echo $frontend_settings->custom_header_code; ?>

			<?php endif; ?>
		<?php endif; ?>
	</head>

	<body class="app sidebar-mini frontend-body <?php echo e(Request::path() != '/' ? 'blue-background' : ''); ?>">

		<?php if(config('frontend.maintenance') == 'on'): ?>
			
			<div class="container h-100vh">
				<div class="row text-center h-100vh align-items-center">
					<div class="col-md-12">
						<img src="<?php echo e(theme_url('img/files/maintenance.png')); ?>" alt="Maintenance Image">
						<h2 class="mt-4 font-weight-bold"><?php echo e(__('We are just tuning up a few things')); ?>.</h2>
						<h5><?php echo e(__('We apologize for the inconvenience but')); ?> <span class="font-weight-bold text-info"><?php echo e(config('app.name')); ?></span> <?php echo e(__('is currently undergoing planned maintenance')); ?>.</h5>
					</div>
				</div>
			</div>
		<?php else: ?>

			<?php if(config('frontend.frontend_page') == 'on'): ?>
						
				<div class="page">
					<div class="page-main">
						<section id="main">					
							<div class="relative flex items-top justify-center min-h-screen">				
								<div class="container-fluid fixed-top pl-0 pr-0" id="navbar-container">
									
									<?php echo $__env->yieldContent('menu'); ?>
				
								</div>				
							</div>  
						</section>

		
						<div class="main-content">
							<div class="side-app frontend-background">

								<?php echo $__env->yieldContent('content'); ?>

							</div>                   
						</div>
					</div>				
				</div>
			
				<!-- FOOTER SECTION
				========================================================-->
				<?php echo $__env->yieldContent('footer'); ?>
				
				<?php echo $__env->make('cookie-consent::index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

			<?php endif; ?>
		
		<?php endif; ?>

		<?php echo $__env->make('layouts.frontend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		<!--Custom Body JS Code-->
		<?php if($frontend_settings): ?>
			<?php if(!is_null($frontend_settings->custom_body_code)): ?> 
				<?php echo $frontend_settings->custom_body_code; ?>

			<?php endif; ?>
		<?php endif; ?>
	</body>
</html>

<?php endif; ?><?php /**PATH /home/videmak/public_html/resources/views/default/layouts/frontend.blade.php ENDPATH**/ ?>