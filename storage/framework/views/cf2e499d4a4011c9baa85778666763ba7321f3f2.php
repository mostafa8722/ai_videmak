

<?php $__env->startSection('content'); ?>
	<div class="row mt-24">
		<div class="col-sm-12">
			<div class="card border-0 p-5 pt-4">
				<div class="card-body">
					<div class="row">	
						<h3 class="card-title mb-3 fs-20 font-weight-bold"><?php echo e($theme['name']); ?> <?php echo e(__('Theme')); ?></h3>										
						<a href="<?php echo e(route('admin.themes')); ?>" class="mb-5 fs-12 text-muted"><i class="fa-solid fa-objects-column mr-2 text-muted"></i><?php echo e(__('View All Themes')); ?></a>		

						<div class="col-lg-8 col-md-7 col-sm-12">
							<div class="card shadow-0 theme">
								<div class="pl-5 pr-5 pt-5 pb-4">
									<img src="<?php echo e($theme['banner']); ?>" style="border-radius: 8px">
								</div>
																	
								<div class="card-body">
									<div class="row">
										<div class="col-lg-3 col-md-6 col-sm-12">
											<div class="card shadow-0 text-center" style="height: 70px;">
												<h6 class="mt-auto mb-auto fs-13 font-weight-semibold"><i class="fa-solid fa-objects-column mr-2 text-primary"></i><?php echo e(ucfirst($theme['type'])); ?> <?php echo e(__('Theme')); ?></h6>
											</div>
										</div>
										<div class="col-lg-3 col-md-6 col-sm-12">
											<div class="card shadow-0 text-center" style="height: 70px;">
												<h6 class="mt-auto mb-auto fs-13 font-weight-semibold"><i class="fa-solid fa-badge-check mr-2 text-primary"></i><?php echo e(__('Tested with DaVinci AI')); ?></h6>
											</div>
										</div>
										<div class="col-lg-3 col-md-6 col-sm-12">
											<div class="card shadow-0 text-center" style="height: 70px;">
												<h6 class="mt-auto mb-auto fs-13 font-weight-semibold"><i class="fa-solid fa-star mr-1 fs-11" style="vertical-align: top"></i>5.0</h6>
											</div>
										</div>
										<div class="col-lg-3 col-md-6 col-sm-12">
											<div class="card shadow-0 text-center" style="height: 70px;">
												<h6 class="mt-auto mb-auto fs-13 font-weight-semibold"><i class="fa-solid fa-timer mr-2"></i><?php echo e(__('Recently Updated')); ?></h6>
											</div>
										</div>
									</div>
									<div class="theme-name">
										<h6 class="mb-5 mt-3 fs-15 number-font"><?php echo e(__('About')); ?> <?php echo e($theme['name']); ?> <?php echo e(__('Theme')); ?></h6>
									</div>
									<div class="theme-info">
										<p class="fs-13 text-muted mb-2"><?php echo e($theme['main_description']); ?></p>
									</div>	
									<div class="theme-info mt-7 mb-7">
										<p class="fs-14 font-weight-semibold mb-5"><i class="fa-solid fa-circle-check fs-20 text-primary mr-2" style="vertical-align: middle"></i> <?php echo e(__('Flexible')); ?></p>
										<p class="fs-14 font-weight-semibold mb-5"><i class="fa-solid fa-circle-check fs-20 text-primary mr-2" style="vertical-align: middle"></i> <?php echo e(__('Lightning Fast')); ?></p>
									</div>	
									<div class="theme-faq">
										<h6 class="mb-5 mt-6 fs-15 font-weight-bold"><?php echo e(__('Got Questions?')); ?></h6>
										<div id="faqs" class="pb-6">
											<div id="accordion">
												<div class="card">
													<div class="card-header" id="heading1">
														<h5 class="mb-0">
														<span class="btn btn-link faq-button" data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="false" aria-controls="collapse-1">
															<i class="fa-solid fa-messages-question fs-14 text-muted mr-2"></i> <?php echo e(__('How to install the theme?')); ?>

														</span>
														</h5>
														<i class="fa-solid fa-plus fs-10"></i>
													</div>
												
													<div id="collapse-1" class="collapse" aria-labelledby="heading1" data-bs-parent="#accordion">
														<div class="card-body">
															<?php echo e(__('After successfully purchasing your target theme, you can click on the install button that will appear after the purchase process is completed. It will start the download process of your new theme and it will be ready for activation and usage within seconds.')); ?>

														</div>
													</div>
												</div>
											</div>
											<div id="accordion">
												<div class="card">
													<div class="card-header" id="heading2">
														<h5 class="mb-0">
														<span class="btn btn-link faq-button" data-bs-toggle="collapse" data-bs-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
															<i class="fa-solid fa-messages-question fs-14 text-muted mr-2"></i> <?php echo e(__('How to switch a theme?')); ?>

														</span>
														</h5>
														<i class="fa-solid fa-plus fs-10"></i>
													</div>
												
													<div id="collapse-2" class="collapse" aria-labelledby="heading2" data-bs-parent="#accordion">
														<div class="card-body">
															<?php echo e(__('In case if you purchased multiple themes, you can click on the activate button, it will automatically set it as your default system theme either for frontend or dashboard depending on which theme you purchased and activated.')); ?>

														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

								</div>
							</div>						
							
						</div>

						<div class="col-lg-4 col-md-5 col-sm-12">
							<form id="payment-form" action="<?php echo e(route('admin.theme.purchase', $theme['slug'])); ?>" method="POST" enctype="multipart/form-data">
								<?php echo csrf_field(); ?>
								<div class="card shadow-0 theme">								
									<div class="card-body text-center">
										<div class="theme-name mt-5">
											<h6 class="mb-4 fs-13 text-muted"><?php echo e(__('For a limited time only')); ?></h6>
										</div>
										<div class="theme-info">
											<h6 class="mb-4 fs-40 number-font" style="opacity: 0.8">$<?php echo e($theme['price']); ?></h6>
										</div>	
										<div class="theme-name mt-3">
											<h6 class="mb-4 fs-13 text-muted"><?php echo e(__('Price is in US dollar. Tax included.')); ?></h6>
										</div>
										<input type="hidden" name="value" id="hidden_value" value="<?php echo e($theme['price']); ?>">
										<input type="hidden" name="type" value="theme">
										<div class="theme-action text-center mt-4 mb-4">
											<?php if($extension->purchased && $extension->installed): ?>
												<a href="<?php echo e(route('admin.theme.activate', $theme['slug'])); ?>" class="btn btn-primary ripple" style="width: 250px; text-transform: none; font-size: 11px; padding-top: 10px; padding-bottom: 10px;"><?php echo e(__('Activate Theme')); ?></a>	
											<?php else: ?>
												<?php if($extension->purchased): ?>
													<a href="<?php echo e(route('admin.theme.install', $theme['slug'])); ?>" class="btn btn-primary ripple" style="width: 250px; text-transform: none; font-size: 11px; padding-top: 10px; padding-bottom: 10px;"><?php echo e(__('Install Theme')); ?></a>	
												<?php else: ?>
													<button type="submit" id="payment-button" class="btn btn-primary ripple" style="width: 250px; text-transform: none; font-size: 11px; padding-top: 10px; padding-bottom: 10px;"><?php echo e(__('Buy Theme')); ?></button>
												<?php endif; ?>	
											<?php endif; ?>										
										</div>	
									</div>
								</div>	
							</form>
							
							<div class="card shadow-0 theme">
								<div class="card-body p-6">
									<p class="card-title mb-4 font-weigth-semibold pb-3" style="border-bottom: 1px solid #dbe2eb"><?php echo e(__('Details')); ?></p>
									<div class="row">
										<div class="col-md-6 col-sm-12">
											<div class="card shadow-0 p-4" style="height: 75px;">
												<h6 class="mb-4 fs-10 text-muted" style="text-transform: uppercase; letter-spacing: 1px"><?php echo e(__('Released Date')); ?></h6>
												<h6 class="fs-13 font-weight-semibold"><?php echo e($theme['released_date']); ?></h6>
											</div>
										</div>
										<div class="col-md-6 col-sm-12">
											<div class="card shadow-0 p-4" style="height: 75px;">
												<h6 class="mb-4 fs-10 text-muted" style="text-transform: uppercase; letter-spacing: 1px"><?php echo e(__('Updated Date')); ?></h6>
												<h6 class="fs-13 font-weight-semibold"><?php echo e($theme['updated_date']); ?></h6>
											</div>
										</div>
										<div class="col-md-6 col-sm-12">
											<div class="card shadow-0 p-4" style="height: 75px;">
												<h6 class="mb-4 fs-10 text-muted" style="text-transform: uppercase; letter-spacing: 1px"><?php echo e(__('Version')); ?></h6>
												<h6 class="fs-13 font-weight-semibold"><?php echo e($theme['version']); ?></h6>
											</div>
										</div>
										<div class="col-md-6 col-sm-12">
											<div class="card shadow-0 p-4" style="height: 75px;">
												<h6 class="mb-4 fs-10 text-muted" style="text-transform: uppercase; letter-spacing: 1px"><?php echo e(__('Installation')); ?></h6>
												<h6 class="fs-13 font-weight-semibold"><?php echo e(__('One Click')); ?></h6>
											</div>
										</div>
										<div class="col-md-6 col-sm-12">
											<div class="card shadow-0 p-4" style="height: 75px;">
												<h6 class="mb-4 fs-10 text-muted" style="text-transform: uppercase; letter-spacing: 1px"><?php echo e(__('License Required')); ?></h6>
												<h6 class="fs-13 font-weight-semibold"><?php echo e(__('Regular or Extended')); ?></h6>
											</div>
										</div>
										<div class="col-md-6 col-sm-12">
											<div class="card shadow-0 p-4" style="height: 75px;">
												<h6 class="mb-4 fs-10 text-muted" style="text-transform: uppercase; letter-spacing: 1px"><?php echo e(__('Free Updates')); ?></h6>
												<h6 class="fs-13 font-weight-semibold"><?php echo e(__('Lifetime')); ?></h6>
											</div>
										</div>
									</div>
								</div>
							</div>	
							
						</div>

					</div>
				</div>
			</div>
		</div>

	</div>
	<!-- END USER PROFILE PAGE -->
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/videmak/public_html/resources/views/default/admin/themes/checkout.blade.php ENDPATH**/ ?>