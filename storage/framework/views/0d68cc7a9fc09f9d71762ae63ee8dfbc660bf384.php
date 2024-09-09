

<?php $__env->startSection('content'); ?>
	<div class="row justify-content-center mt-24">
		<div class="col-sm-12">
			<div class="card border-0 p-5 pt-4 h-100vh">
				<div class="card-body">
					<div class="row ">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="border-0 templates-nav-header">
								<div class="card-body">
									<div class="text-center">
										<h3 class="card-title mb-3 ml-2 fs-20 font-weight-bold"><?php echo e(__('Available Themes')); ?></h3>										
										<h6 class="mb-5 fs-12 text-muted"><?php echo e(__('Get your dashboard UI to the next levels')); ?></h6>
									</div>
				
									<div class="templates-nav-menu mt-7 mb-6 ml-auto mr-auto" style="max-width: 500px">
										<div class="template-nav-menu-inner">
											<ul class="nav nav-tabs" id="myTab" role="tablist">
												<li class="nav-item ml-auto mr-auto" role="presentation">
													<button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true"><?php echo e(__('All')); ?></button>
												</li>							
												<li class="nav-item ml-auto mr-auto category-check" role="presentation">
													<button class="nav-link" id="frontend-tab" data-bs-toggle="tab" data-bs-target="#frontend" type="button" role="tab" aria-controls="frontend" aria-selected="false"><?php echo e(__('Frontend')); ?></button>
												</li>	
												<li class="nav-item ml-auto mr-auto category-check" role="presentation">
													<button class="nav-link" id="dashboard-tab" data-bs-toggle="tab" data-bs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false"><?php echo e(__('Dashboard')); ?></button>
												</li>																
											</ul>
										</div>
									</div>					
								</div>
							</div>
						</div>
				
						<div class="col-lg-12 col-md-12 col-sm-12">

				
									<div class="tab-content" id="myTabContent">
				
										<div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
											<div class="row" id="templates-panel">				
													
												<?php $__currentLoopData = $themes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<div class="col-lg-4 col-md-6 col-sm-12">
														<div class="card shadow-0 theme" id="XXXXX-card">
															<div class="theme-banner">
																<figure>
																	<img src="<?php echo e($theme['banner']); ?>" alt="">
																	<figcaption>
																		<a href="<?php echo e($theme['demo_url']); ?>" class="fs-14 text-white font-weight-bold" target="_blank"><?php echo e(__('Live Preview')); ?></a>							
																	</figcaption>
																</figure>
															</div>
																
															<div class="card-body pt-5">
																<div class="theme-group">
																	<?php if($theme['slug'] != 'default'): ?>
																		<h6 class="mb-4 fs-13 text-muted"><i class="fa-solid fa-objects-column mr-1 text-primary"></i> <?php echo e(__('Premium')); ?> <?php echo e(ucfirst($theme['type'])); ?> <?php echo e(__('Theme')); ?></h6>
																	<?php else: ?>
																		<h6 class="mb-4 fs-13 text-muted"><i class="fa-solid fa-objects-column mr-1 text-primary"></i> <?php echo e(__('Free Theme')); ?></h6>
																	<?php endif; ?>																	
																</div>
																<div class="theme-name">
																	<h6 class="mb-4 fs-15 super-strong"><?php echo e($theme['name']); ?>  <?php echo e(__('Theme')); ?></h6>
																</div>
																<div class="theme-info">
																	<p class="fs-13 text-muted mb-2"><?php echo e($theme['short_description']); ?></p>
																</div>	
																<div class="theme-action text-center mt-4 mb-4">	
																	<?php $__currentLoopData = $extensions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extension): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																		<?php if($extension->slug == $theme['slug']): ?>
																			<?php if(($extension->slug != 'default') && ($extension->slug == $settings->dashboard_theme || $extension->slug == $settings->frontend_theme)): ?>
																				<a href="#" class="btn btn-primary ripple disabled" style="width: 250px; text-transform: none; font-size: 11px; padding-top: 10px; padding-bottom: 10px;"><?php echo e(__('Activated')); ?></a>	
																			<?php else: ?>
																				<?php if(!$extension->purchased && ($theme['slug'] != 'default')): ?>
																					<a href="<?php echo e(route('admin.theme.activate', $theme['slug'])); ?>" class="btn btn-primary ripple" style="width: 250px; text-transform: none; font-size: 11px; padding-top: 10px; padding-bottom: 10px;"><?php echo e(__('Activate Theme')); ?></a>	
																				<?php else: ?> 
																					<?php if($theme['slug'] == 'default'): ?>
																						<?php if($settings->dashboard_theme == 'default' && $settings->frontend_theme == 'default'): ?>
																							<a href="#" class="btn btn-primary ripple" style="width: 250px; text-transform: none; font-size: 11px; padding-top: 10px; padding-bottom: 10px;"><?php echo e(__('Activated')); ?></a>	
																						<?php else: ?>
																							<a href="<?php echo e(route('admin.theme.activate', $theme['slug'])); ?>" class="btn btn-primary ripple" style="width: 250px; text-transform: none; font-size: 11px; padding-top: 10px; padding-bottom: 10px;"><?php echo e(__('Activate Theme')); ?></a>	
																						<?php endif; ?>
																					<?php else: ?>
																						<a href="<?php echo e(route('admin.theme.purchase', $theme['slug'])); ?>" class="btn btn-primary ripple" style="width: 250px; text-transform: none; font-size: 11px; padding-top: 10px; padding-bottom: 10px;"><?php echo e(__('Buy Now')); ?></a>	
																					<?php endif; ?>																				
																				<?php endif; ?>
																			<?php endif; ?>
																			
																		<?php endif; ?>																		
																	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>																
																	
																</div>	
															</div>
														</div>						
													</div>	
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												
											</div>	
										</div>				

										<div class="tab-pane fade" id="frontend" role="tabpanel" aria-labelledby="frontend-tab">
											<div class="row" id="templates-panel">
												<?php $__currentLoopData = $themes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<?php if($theme['type'] == 'frontend' || $theme['type'] == 'both'): ?>
														<div class="col-lg-4 col-md-6 col-sm-12">
															<div class="card shadow-0 theme" id="XXXXX-card">
																<div class="theme-banner">
																	<figure>
																		<img src="<?php echo e($theme['banner']); ?>" alt="">
																		<figcaption>
																			<a href="<?php echo e($theme['demo_url']); ?>" class="fs-14 text-white font-weight-bold" target="_blank"><?php echo e(__('Live Preview')); ?></a>							
																		</figcaption>
																	</figure>
																</div>
																	
																<div class="card-body pt-5">
																	<div class="theme-group">
																		<?php if($theme['slug'] != 'default'): ?>
																			<h6 class="mb-4 fs-13 text-muted"><i class="fa-solid fa-objects-column mr-1 text-primary"></i> <?php echo e(__('Premium')); ?> <?php echo e(ucfirst($theme['type'])); ?> <?php echo e(__('Theme')); ?></h6>
																		<?php else: ?>
																			<h6 class="mb-4 fs-13 text-muted"><i class="fa-solid fa-objects-column mr-1 text-primary"></i> <?php echo e(__('Free Theme')); ?></h6>
																		<?php endif; ?>
																	</div>
																	<div class="theme-name">
																		<h6 class="mb-4 fs-15 number-font"><?php echo e($theme['name']); ?>  <?php echo e(__('Theme')); ?></h6>
																	</div>
																	<div class="theme-info">
																		<p class="fs-13 text-muted mb-2"><?php echo e($theme['short_description']); ?></p>
																	</div>	
																	<div class="theme-action text-center mt-4 mb-4">	
																		<?php $__currentLoopData = $extensions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extension): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																			<?php if($extension->slug == $theme['slug']): ?>
																				<?php if(($extension->slug != 'default') && ($extension->slug == $settings->dashboard_theme || $extension->slug == $settings->frontend_theme)): ?>
																					<a href="#" class="btn btn-primary ripple disabled" style="width: 250px; text-transform: none; font-size: 11px; padding-top: 10px; padding-bottom: 10px;"><?php echo e(__('Activated')); ?></a>	
																				<?php else: ?>
																					<?php if(!$extension->purchased && ($theme['slug'] != 'default')): ?>
																						<a href="<?php echo e(route('admin.theme.activate', $theme['slug'])); ?>" class="btn btn-primary ripple" style="width: 250px; text-transform: none; font-size: 11px; padding-top: 10px; padding-bottom: 10px;"><?php echo e(__('Activate Theme')); ?></a>	
																					<?php else: ?> 
																						<?php if($theme['slug'] == 'default'): ?>
																							<?php if($settings->dashboard_theme == 'default' && $settings->frontend_theme == 'default'): ?>
																								<a href="#" class="btn btn-primary ripple" style="width: 250px; text-transform: none; font-size: 11px; padding-top: 10px; padding-bottom: 10px;"><?php echo e(__('Activated')); ?></a>	
																							<?php else: ?>
																								<a href="<?php echo e(route('admin.theme.activate', $theme['slug'])); ?>" class="btn btn-primary ripple" style="width: 250px; text-transform: none; font-size: 11px; padding-top: 10px; padding-bottom: 10px;"><?php echo e(__('Activate Theme')); ?></a>	
																							<?php endif; ?>
																						<?php else: ?>
																							<a href="<?php echo e(route('admin.theme.purchase', $theme['slug'])); ?>" class="btn btn-primary ripple" style="width: 250px; text-transform: none; font-size: 11px; padding-top: 10px; padding-bottom: 10px;"><?php echo e(__('Buy Now')); ?></a>	
																						<?php endif; ?>																				
																					<?php endif; ?>
																				<?php endif; ?>
																				
																			<?php endif; ?>																		
																		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
																	</div>	
																</div>
															</div>						
														</div>	
													<?php endif; ?>													
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</div>
										</div>

										<div class="tab-pane fade" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
											<div class="row" id="templates-panel">
												<?php $__currentLoopData = $themes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<?php if($theme['type'] == 'dashboard' || $theme['type'] == 'both'): ?>
														<div class="col-lg-4 col-md-6 col-sm-12">
															<div class="card shadow-0 theme" id="XXXXX-card">
																<div class="theme-banner">
																	<figure>
																		<img src="<?php echo e($theme['banner']); ?>" alt="">
																		<figcaption>
																			<a href="<?php echo e($theme['demo_url']); ?>" class="fs-14 text-white font-weight-bold" target="_blank"><?php echo e(__('Live Preview')); ?></a>							
																		</figcaption>
																	</figure>
																</div>
																	
																<div class="card-body pt-5">
																	<div class="theme-group">
																		<h6 class="mb-4 fs-13 text-muted"><i class="fa-solid fa-objects-column mr-1 text-primary"></i> <?php echo e(__('Premium')); ?> <?php echo e(ucfirst($theme['type'])); ?> <?php echo e(__('Theme')); ?></h6>
																	</div>
																	<div class="theme-name">
																		<h6 class="mb-4 fs-15 number-font"><?php echo e($theme['name']); ?>  <?php echo e(__('Theme')); ?></h6>
																	</div>
																	<div class="theme-info">
																		<p class="fs-13 text-muted mb-2"><?php echo e($theme['short_description']); ?></p>
																	</div>	
																	<div class="theme-action text-center mt-4 mb-4">	
																		<?php $__currentLoopData = $extensions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extension): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																			<?php if($extension->slug == $theme['slug']): ?>
																				<?php if(($extension->slug != 'default') && ($extension->slug == $settings->dashboard_theme || $extension->slug == $settings->frontend_theme)): ?>
																					<a href="#" class="btn btn-primary ripple disabled" style="width: 250px; text-transform: none; font-size: 11px; padding-top: 10px; padding-bottom: 10px;"><?php echo e(__('Activated')); ?></a>	
																				<?php else: ?>
																					<?php if(!$extension->purchased && ($theme['slug'] != 'default')): ?>
																						<a href="<?php echo e(route('admin.theme.activate', $theme['slug'])); ?>" class="btn btn-primary ripple" style="width: 250px; text-transform: none; font-size: 11px; padding-top: 10px; padding-bottom: 10px;"><?php echo e(__('Activate Theme')); ?></a>	
																					<?php else: ?> 
																						<?php if($theme['slug'] == 'default'): ?>
																							<?php if($settings->dashboard_theme == 'default' && $settings->frontend_theme == 'default'): ?>
																								<a href="#" class="btn btn-primary ripple" style="width: 250px; text-transform: none; font-size: 11px; padding-top: 10px; padding-bottom: 10px;"><?php echo e(__('Activated')); ?></a>	
																							<?php else: ?>
																								<a href="<?php echo e(route('admin.theme.activate', $theme['slug'])); ?>" class="btn btn-primary ripple" style="width: 250px; text-transform: none; font-size: 11px; padding-top: 10px; padding-bottom: 10px;"><?php echo e(__('Activate Theme')); ?></a>	
																							<?php endif; ?>
																						<?php else: ?>
																							<a href="<?php echo e(route('admin.theme.purchase', $theme['slug'])); ?>" class="btn btn-primary ripple" style="width: 250px; text-transform: none; font-size: 11px; padding-top: 10px; padding-bottom: 10px;"><?php echo e(__('Buy Now')); ?></a>	
																						<?php endif; ?>																				
																					<?php endif; ?>
																				<?php endif; ?>
																				
																			<?php endif; ?>																		
																		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
																	</div>	
																</div>
															</div>						
														</div>	
													<?php endif; ?>													
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/videmak/public_html/resources/views/default/admin/themes/index.blade.php ENDPATH**/ ?>