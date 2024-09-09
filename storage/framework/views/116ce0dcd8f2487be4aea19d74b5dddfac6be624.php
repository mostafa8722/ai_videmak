<section id="prices">

    <div class="container pt-9 text-center">

        <!-- SECTION TITLE -->
        <div class="row mb-6">
            <div class="title">
                <p class="m-2"><?php echo e(__($frontend_sections->pricing_subtitle)); ?></p>
                <h3 class="mb-4"><?php echo __($frontend_sections->pricing_title); ?></h3>    
                <h6 class="font-weight-normal fs-14 text-center"><?php echo e(__($frontend_sections->pricing_description)); ?></h6>                  
            </div>
        </div> <!-- END SECTION TITLE --> 
                        
    </div> <!-- END CONTAINER -->

    <div class="container">
        
        <div class="row">
            <div class="card-body">			

                <?php if($monthly || $yearly || $prepaid || $lifetime): ?>
    
                    <div class="tab-menu-heading text-center">
                        <div class="tabs-menu">								
                            <ul class="nav">
                                <?php if($prepaid): ?>						
                                    <li><a href="#prepaid" class="<?php if(!$monthly && !$yearly && $prepaid): ?> active <?php else: ?> '' <?php endif; ?>" data-bs-toggle="tab"> <?php echo e(__('Prepaid Packs')); ?></a></li>
                                <?php endif; ?>							
                                <?php if($monthly): ?>
                                    <li><a href="#monthly_plans" class="<?php if(($monthly && $prepaid && $yearly) || ($monthly && !$prepaid && !$yearly) || ($monthly && $prepaid && !$yearly) || ($monthly && !$prepaid && $yearly)): ?> active <?php else: ?> '' <?php endif; ?>" data-bs-toggle="tab"> <?php echo e(__('Monthly Plans')); ?></a></li>
                                <?php endif; ?>	
                                <?php if($yearly): ?>
                                    <li><a href="#yearly_plans" class="<?php if(!$monthly && !$prepaid && $yearly): ?> active <?php else: ?> '' <?php endif; ?>" data-bs-toggle="tab"> <?php echo e(__('Yearly Plans')); ?></a></li>
                                <?php endif; ?>		
                                <?php if($lifetime): ?>
                                    <li><a href="#lifetime" class="<?php if(!$monthly && !$yearly && !$prepaid &&  $lifetime): ?> active <?php else: ?> '' <?php endif; ?>" data-bs-toggle="tab"> <?php echo e(__('Lifetime Plans')); ?></a></li>
                                <?php endif; ?>							
                            </ul>
                        </div>
                    </div>
    
                
    
                    <div class="tabs-menu-body">
                        <div class="tab-content">
    
                            <?php if($prepaid): ?>
                                <div class="tab-pane <?php if((!$monthly && $prepaid) && (!$yearly && $prepaid)): ?> active <?php else: ?> '' <?php endif; ?>" id="prepaid">
    
                                    <?php if($prepaids->count()): ?>
                                                        
                                        <div class="row justify-content-md-center">
                                        
                                            <?php $__currentLoopData = $prepaids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prepaid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>																			
                                                <div class="col-lg-4 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="200" data-aos-once="true" data-aos-duration="400">
                                                    <div class="price-card pl-3 pr-3 pt-2 mb-6">
                                                        <div class="card p-4 pl-5 prepaid-cards <?php if($prepaid->featured): ?> price-card-border <?php endif; ?>">
                                                            <?php if($prepaid->featured): ?>
                                                                <span class="plan-featured-prepaid"><?php echo e(__('Most Popular')); ?></span>
                                                            <?php endif; ?>
                                                            <div class="plan prepaid-plan">
                                                                <div class="plan-title"><?php echo e($prepaid->plan_name); ?> </div>
                                                                <div class="plan-cost-wrapper mt-2 text-center mb-3 p-1"><span class="plan-cost"><?php if(config('payment.decimal_points') == 'allow'): ?> <?php echo e(number_format((float)$prepaid->price, 2)); ?> <?php else: ?> <?php echo e(number_format($prepaid->price)); ?> <?php endif; ?></span><span class="prepaid-currency-sign text-muted"><?php echo e($prepaid->currency); ?></span></div>
                                                                <p class="fs-12 mb-3 text-muted"><?php echo e(__('Included Credits')); ?></p>	
                                                                <div class="credits-box">										 
                                                                    <?php if($prepaid->gpt_4_credits_prepaid != 0): ?> <p class="fs-12 mt-2 mb-0"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <?php echo e(__('GPT 4 Model Words')); ?>: <span class="ml-2 font-weight-bold text-primary"><?php echo e(number_format($prepaid->gpt_4_credits_prepaid)); ?></span></p><?php endif; ?>
                                                                    <?php if($prepaid->gpt_4o_credits_prepaid != 0): ?> <p class="fs-12 mt-2 mb-0"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <?php echo e(__('GPT 4o Model Words')); ?>: <span class="ml-2 font-weight-bold text-primary"><?php echo e(number_format($prepaid->gpt_4o_credits_prepaid)); ?></span></p><?php endif; ?>
                                                                    <?php if($prepaid->gpt_4o_mini_credits_prepaid != 0): ?> <p class="fs-12 mt-2 mb-0"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <?php echo e(__('GPT 4o mini Model Words')); ?>: <span class="ml-2 font-weight-bold text-primary"><?php echo e(number_format($prepaid->gpt_4o_mini_credits_prepaid)); ?></span></p><?php endif; ?>
                                                                    <?php if($prepaid->gpt_4_turbo_credits_prepaid != 0): ?> <p class="fs-12 mt-2 mb-0"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <?php echo e(__('GPT 4 Turbo Model Words')); ?>: <span class="ml-2 font-weight-bold text-primary"><?php echo e(number_format($prepaid->gpt_4_turbo_credits_prepaid)); ?></span></p><?php endif; ?>
                                                                    <?php if($prepaid->gpt_3_turbo_credits_prepaid != 0): ?> <p class="fs-12 mt-2 mb-0"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <?php echo e(__('GPT 3.5 Turbo Model Words')); ?>: <span class="ml-2 font-weight-bold text-primary"><?php echo e(number_format($prepaid->gpt_3_turbo_credits_prepaid)); ?></span></p><?php endif; ?>
                                                                    <?php if($prepaid->fine_tune_credits_prepaid != 0): ?> <p class="fs-12 mt-2 mb-0"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <?php echo e(__('Fine Tune Model  Words')); ?>: <span class="ml-2 font-weight-bold text-primary"><?php echo e(number_format($prepaid->fine_tune_credits_prepaid)); ?></span></p><?php endif; ?>
                                                                    <?php if($prepaid->claude_3_opus_credits_prepaid != 0): ?> <p class="fs-12 mt-2 mb-0"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <?php echo e(__('Claude 3 Opus Model Words')); ?>: <span class="ml-2 font-weight-bold text-primary"><?php echo e(number_format($prepaid->claude_3_opus_credits_prepaid)); ?></span></p><?php endif; ?>
                                                                    <?php if($prepaid->claude_3_sonnet_credits_prepaid != 0): ?> <p class="fs-12 mt-2 mb-0"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <?php echo e(__('Claude 3.5 Sonnet Model Words')); ?>: <span class="ml-2 font-weight-bold text-primary"><?php echo e(number_format($prepaid->claude_3_sonnet_credits_prepaid)); ?></span></p><?php endif; ?>
                                                                    <?php if($prepaid->claude_3_haiku_credits_prepaid != 0): ?> <p class="fs-12 mt-2 mb-0"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <?php echo e(__('Claude 3 Haiku Model Words')); ?>: <span class="ml-2 font-weight-bold text-primary"><?php echo e(number_format($prepaid->claude_3_haiku_credits_prepaid)); ?></span></p><?php endif; ?>
                                                                    <?php if($prepaid->gemini_pro_credits_prepaid != 0): ?> <p class="fs-12 mt-2 mb-0"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <?php echo e(__('Gemini Pro Model Words')); ?>: <span class="ml-2 font-weight-bold text-primary"><?php echo e(number_format($prepaid->gemini_pro_credits_prepaid)); ?></span></p><?php endif; ?>
                                                                    <?php if($prepaid->dalle_images != 0): ?> <p class="fs-12 mt-2 mb-0"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <?php echo e(__('Dalle Images Included')); ?>: <span class="ml-2 font-weight-bold text-primary"><?php echo e(number_format($prepaid->dalle_images)); ?></span></p><?php endif; ?>
                                                                    <?php if($prepaid->sd_images != 0): ?> <p class="fs-12 mt-2 mb-0"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <?php echo e(__('SD Images Included')); ?>: <span class="ml-2 font-weight-bold text-primary"><?php echo e(number_format($prepaid->sd_images)); ?></span></p><?php endif; ?>
                                                                    <?php if($prepaid->characters != 0): ?> <p class="fs-12 mt-2 mb-0"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <?php echo e(__('Characters Included')); ?>: <span class="ml-2 font-weight-bold text-primary"><?php echo e(number_format($prepaid->characters)); ?></span></p><?php endif; ?>																							
                                                                    <?php if($prepaid->minutes != 0): ?> <p class="fs-12 mt-2 mb-0"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <?php echo e(__('Minutes Included')); ?>: <span class="ml-2 font-weight-bold text-primary"><?php echo e(number_format($prepaid->minutes)); ?></span></p><?php endif; ?>	
                                                                </div>
                                                                <div class="text-center action-button mt-2 mb-2">
                                                                    <a href="<?php echo e(route('register')); ?>" class="btn btn-primary-pricing"><?php echo e(__('Select Package')); ?></a> 
                                                                </div>																								                                                                          
                                                            </div>							
                                                        </div>	
                                                    </div>							
                                                </div>										
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>						
    
                                        </div>
    
                                    <?php else: ?>
                                        <div class="row text-center">
                                            <div class="col-sm-12 mt-6 mb-6">
                                                <h6 class="fs-12 font-weight-bold text-center"><?php echo e(__('No Prepaid plans were set yet')); ?></h6>
                                            </div>
                                        </div>
                                    <?php endif; ?>
    
                                </div>			
                            <?php endif; ?>	
    
                            <?php if($monthly): ?>	
                                <div class="tab-pane <?php if(($monthly && $prepaid) || ($monthly && !$prepaid) || ($monthly && !$yearly)): ?> active <?php else: ?> '' <?php endif; ?>" id="monthly_plans">
    
                                    <?php if($monthly_subscriptions->count()): ?>		
    
                                        <div class="row justify-content-md-center">
    
                                            <?php $__currentLoopData = $monthly_subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>																			
                                                <div class="col-lg-4 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="200" data-aos-once="true" data-aos-duration="400">
                                                    <div class="pt-2 ml-2 mr-2 h-100 prices-responsive">
                                                        <div class="card p-5 mb-4 pl-6 pr-6 h-100 price-card <?php if($subscription->featured): ?> price-card-border <?php endif; ?>">
                                                            <?php if($subscription->featured): ?>
                                                                <span class="plan-featured"><?php echo e(__('Most Popular')); ?></span>
                                                            <?php endif; ?>
                                                            <div class="plan">			
                                                                <div class="plan-title"><?php echo e($subscription->plan_name); ?></div>	
                                                                <p class="plan-cost mb-5">																					
                                                                    <?php if($subscription->free): ?>
                                                                        <?php echo e(__('Free')); ?>

                                                                    <?php else: ?>
                                                                        <?php echo config('payment.default_system_currency_symbol'); ?><?php if(config('payment.decimal_points') == 'allow'): ?><?php echo e(number_format((float)$subscription->price, 2)); ?> <?php else: ?><?php echo e(number_format($subscription->price)); ?> <?php endif; ?><span class="fs-12 text-muted"><span class="mr-1">/</span> <?php echo e(__('per month')); ?></span>
                                                                    <?php endif; ?>   
                                                                </p>                                                                         
                                                                <div class="text-center action-button mt-2 mb-5">
                                                                    <a href="<?php echo e(route('register')); ?>" class="btn btn-primary-pricing"><?php echo e(__('Subscribe Now')); ?></a>                                               														
                                                                </div>
                                                                <p class="fs-12 mb-3 text-muted"><?php echo e(__('Included Features')); ?></p>																		
                                                                <ul class="fs-12 pl-3">	
                                                                    <?php if($subscription->gpt_4_turbo_credits == -1): ?>
                                                                        <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('GPT 4T Model')); ?> <?php echo e(__('words')); ?></span></li>
                                                                    <?php else: ?>	
                                                                        <?php if($subscription->gpt_4_turbo_credits != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('GPT 4T')); ?> <?php echo e(number_format($subscription->gpt_4_turbo_credits)); ?></span> <span class="plan-feature-text"><?php echo e(__('words')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if($subscription->gpt_4_credits == -1): ?>
                                                                        <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('GPT 4 Model')); ?> <?php echo e(__('words')); ?></span></li>
                                                                    <?php else: ?>	
                                                                        <?php if($subscription->gpt_4_credits != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('GPT 4')); ?> <?php echo e(number_format($subscription->gpt_4_credits)); ?></span> <span class="plan-feature-text"><?php echo e(__('words')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if($subscription->gpt_4o_credits == -1): ?>
                                                                        <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('GPT 4o Model')); ?> <?php echo e(__('words')); ?></span></li>
                                                                    <?php else: ?>	
                                                                        <?php if($subscription->gpt_4o_credits != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('GPT 4o')); ?> <?php echo e(number_format($subscription->gpt_4o_credits)); ?></span> <span class="plan-feature-text"><?php echo e(__('words')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if($subscription->gpt_4o_mini_credits == -1): ?>
                                                                        <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('GPT 4o mini Model')); ?> <?php echo e(__('words')); ?></span></li>
                                                                    <?php else: ?>	
                                                                        <?php if($subscription->gpt_4o_mini_credits != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('GPT 4o mini')); ?> <?php echo e(number_format($subscription->gpt_4o_mini_credits)); ?></span> <span class="plan-feature-text"><?php echo e(__('words')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if($subscription->gpt_3_turbo_credits == -1): ?>
                                                                        <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('GPT 3.5T Model')); ?> <?php echo e(__('words')); ?></span></li>
                                                                    <?php else: ?>	
                                                                        <?php if($subscription->gpt_3_turbo_credits != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('GPT 3.5T')); ?> <?php echo e(number_format($subscription->gpt_3_turbo_credits)); ?></span> <span class="plan-feature-text"><?php echo e(__('words')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if($subscription->fine_tune_credits == -1): ?>
                                                                        <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('Fine Tune Model')); ?> <?php echo e(__('words')); ?></span></li>
                                                                    <?php else: ?>	
                                                                        <?php if($subscription->fine_tune_credits != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Fine Tune Model')); ?> <?php echo e(number_format($subscription->fine_tune_credits)); ?></span> <span class="plan-feature-text"><?php echo e(__('words')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if($subscription->claude_3_opus_credits == -1): ?>
                                                                        <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('Claude 3 Opus Model')); ?> <?php echo e(__('words')); ?></span></li>
                                                                    <?php else: ?>	
                                                                        <?php if($subscription->claude_3_opus_credits != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Claude 3 Opus Model')); ?> <?php echo e(number_format($subscription->claude_3_opus_credits)); ?></span> <span class="plan-feature-text"><?php echo e(__('words')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if($subscription->claude_3_sonnet_credits == -1): ?>
                                                                        <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('Claude 3.5 Sonnet Model')); ?> <?php echo e(__('words')); ?></span></li>
                                                                    <?php else: ?>	
                                                                        <?php if($subscription->claude_3_sonnet_credits != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Claude 3.5 Sonnet Model')); ?> <?php echo e(number_format($subscription->claude_3_sonnet_credits)); ?></span> <span class="plan-feature-text"><?php echo e(__('words')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if($subscription->claude_3_haiku_credits == -1): ?>
                                                                        <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('Claude 3 Haiku Model')); ?> <?php echo e(__('words')); ?></span></li>
                                                                    <?php else: ?>	
                                                                        <?php if($subscription->claude_3_haiku_credits != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Claude 3 Haiku Model')); ?> <?php echo e(number_format($subscription->claude_3_haiku_credits)); ?></span> <span class="plan-feature-text"><?php echo e(__('words')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if($subscription->gemini_pro_credits == -1): ?>
                                                                        <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('Gemini Pro Model')); ?> <?php echo e(__('words')); ?></span></li>
                                                                    <?php else: ?>	
                                                                        <?php if($subscription->gemini_pro_credits != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Gemini Pro Model')); ?> <?php echo e(number_format($subscription->gemini_pro_credits)); ?></span> <span class="plan-feature-text"><?php echo e(__('words')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.image_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->dalle_image_engine != 'none'): ?>
                                                                            <?php if($subscription->dalle_images == -1): ?>
                                                                                <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('Dalle images')); ?></span></li>
                                                                            <?php else: ?>
                                                                                <?php if($subscription->dalle_images != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(number_format($subscription->dalle_images)); ?></span> <span class="plan-feature-text"><?php echo e(__('Dalle images')); ?></span></li> <?php endif; ?>
                                                                            <?php endif; ?>
                                                                        <?php endif; ?>																
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.image_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->sd_image_engine != 'none'): ?>
                                                                            <?php if($subscription->sd_images == -1): ?>
                                                                                <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('SD images')); ?></span></li>
                                                                            <?php else: ?>
                                                                                <?php if($subscription->sd_images != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(number_format($subscription->sd_images)); ?></span> <span class="plan-feature-text"><?php echo e(__('SD images')); ?></span></li> <?php endif; ?>
                                                                            <?php endif; ?>
                                                                        <?php endif; ?>																	
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.whisper_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->minutes == -1): ?>
                                                                            <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('minutes')); ?></span></li>
                                                                        <?php else: ?>
                                                                            <?php if($subscription->minutes != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(number_format($subscription->minutes)); ?></span> <span class="plan-feature-text"><?php echo e(__('minutes')); ?></span></li> <?php endif; ?>
                                                                        <?php endif; ?>																	
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.voiceover_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->characters == -1): ?>
                                                                            <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('characters')); ?></span></li>
                                                                        <?php else: ?>
                                                                            <?php if($subscription->characters != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(number_format($subscription->characters)); ?></span> <span class="plan-feature-text"><?php echo e(__('characters')); ?></span></li> <?php endif; ?>
                                                                        <?php endif; ?>																	
                                                                    <?php endif; ?>
                                                                        <?php if($subscription->team_members != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(number_format($subscription->team_members)); ?></span> <span class="plan-feature-text"><?php echo e(__('team members')); ?></span></li> <?php endif; ?>
                                                                    
                                                                    <?php if(config('settings.writer_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->writer_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI Writer Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.wizard_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->wizard_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI Article Wizard Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.smart_editor_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->smart_editor_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('Smart Editor Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.rewriter_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->rewriter_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI ReWriter Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.chat_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->chat_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI Chats Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.image_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->image_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI Images Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.voiceover_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->voiceover_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI Voiceover Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.video_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->video_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI Video Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.voice_clone_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->voice_clone_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('Voice Clone Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.sound_studio_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->sound_studio_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('Sound Studio Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.whisper_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->transcribe_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI Speech to Text Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.plagiarism_checker_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->plagiarism_checker_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI Plagiarism Checker Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.vision_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->vision_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI Vision Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.ai_detector_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->ai_detector_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI Detector Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.chat_file_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->chat_file_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI File Chat Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.chat_web_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->chat_web_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI Web Chat Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.code_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->code_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI Code Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if($subscription->team_members): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('Team Members Option')); ?></span></li> <?php endif; ?>
                                                                    <?php $__currentLoopData = (explode(',', $subscription->plan_features)); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php if($feature): ?>
                                                                            <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <?php echo e($feature); ?></li>
                                                                        <?php endif; ?>																
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>															
                                                                </ul>																
                                                            </div>					
                                                        </div>	
                                                    </div>							
                                                </div>										
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
                                        </div>	
                                    
                                    <?php else: ?>
                                        <div class="row text-center">
                                            <div class="col-sm-12 mt-6 mb-6">
                                                <h6 class="fs-12 font-weight-bold text-center"><?php echo e(__('No Subscriptions plans were set yet')); ?></h6>
                                            </div>
                                        </div>
                                    <?php endif; ?>					
                                </div>	
                            <?php endif; ?>	
                            
                            <?php if($yearly): ?>	
                                <div class="tab-pane <?php if(($yearly && $prepaid) && ($yearly && !$prepaid) && ($yearly && !$monthly)): ?> active <?php else: ?> '' <?php endif; ?>" id="yearly_plans">
    
                                    <?php if($yearly_subscriptions->count()): ?>		
    
                                        <div class="row justify-content-md-center">
    
                                            <?php $__currentLoopData = $yearly_subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>																			
                                                <div class="col-lg-4 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="200" data-aos-once="true" data-aos-duration="400">
                                                    <div class="pt-2 ml-2 mr-2 h-100 prices-responsive">
                                                        <div class="card p-5 mb-4 pl-6 pr-6 h-100 price-card <?php if($subscription->featured): ?> price-card-border <?php endif; ?>">
                                                            <?php if($subscription->featured): ?>
                                                                <span class="plan-featured"><?php echo e(__('Most Popular')); ?></span>
                                                            <?php endif; ?>
                                                            <div class="plan">			
                                                                <div class="plan-title"><?php echo e($subscription->plan_name); ?></div>																						
                                                                <p class="plan-cost mb-5">
                                                                    <?php if($subscription->free): ?>
                                                                        <?php echo e(__('Free')); ?>

                                                                    <?php else: ?>
                                                                        <?php echo config('payment.default_system_currency_symbol'); ?><?php if(config('payment.decimal_points') == 'allow'): ?><?php echo e(number_format((float)$subscription->price, 2)); ?> <?php else: ?><?php echo e(number_format($subscription->price)); ?> <?php endif; ?><span class="fs-12 text-muted"><span class="mr-1">/</span> <?php echo e(__('per year')); ?></span>
                                                                    <?php endif; ?>    
                                                                </p>                                                                            
                                                                <div class="text-center action-button mt-2 mb-5">
                                                                    <a href="<?php echo e(route('register')); ?>" class="btn btn-primary-pricing"><?php echo e(__('Subscribe Now')); ?></a>                                               														
                                                                </div>
                                                                <p class="fs-12 mb-3 text-muted"><?php echo e(__('Included Features')); ?></p>																	
                                                                <ul class="fs-12 pl-3">	
                                                                    <?php if($subscription->gpt_4_turbo_credits == -1): ?>
                                                                        <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('GPT 4T Model')); ?> <?php echo e(__('words')); ?></span></li>
                                                                    <?php else: ?>	
                                                                        <?php if($subscription->gpt_4_turbo_credits != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('GPT 4T')); ?> <?php echo e(number_format($subscription->gpt_4_turbo_credits)); ?></span> <span class="plan-feature-text"><?php echo e(__('words')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if($subscription->gpt_4_credits == -1): ?>
                                                                        <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('GPT 4 Model')); ?> <?php echo e(__('words')); ?></span></li>
                                                                    <?php else: ?>	
                                                                        <?php if($subscription->gpt_4_credits != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('GPT 4')); ?> <?php echo e(number_format($subscription->gpt_4_credits)); ?></span> <span class="plan-feature-text"><?php echo e(__('words')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if($subscription->gpt_4o_credits == -1): ?>
                                                                        <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('GPT 4o Model')); ?> <?php echo e(__('words')); ?></span></li>
                                                                    <?php else: ?>	
                                                                        <?php if($subscription->gpt_4o_credits != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('GPT 4o')); ?> <?php echo e(number_format($subscription->gpt_4o_credits)); ?></span> <span class="plan-feature-text"><?php echo e(__('words')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if($subscription->gpt_4o_mini_credits == -1): ?>
                                                                        <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('GPT 4o  miniModel')); ?> <?php echo e(__('words')); ?></span></li>
                                                                    <?php else: ?>	
                                                                        <?php if($subscription->gpt_4o_mini_credits != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('GPT 4o mini')); ?> <?php echo e(number_format($subscription->gpt_4o_mini_credits)); ?></span> <span class="plan-feature-text"><?php echo e(__('words')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if($subscription->gpt_3_turbo_credits == -1): ?>
                                                                        <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('GPT 3.5T Model')); ?> <?php echo e(__('words')); ?></span></li>
                                                                    <?php else: ?>	
                                                                        <?php if($subscription->gpt_3_turbo_credits != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('GPT 3.5T')); ?> <?php echo e(number_format($subscription->gpt_3_turbo_credits)); ?></span> <span class="plan-feature-text"><?php echo e(__('words')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if($subscription->fine_tune_credits == -1): ?>
                                                                        <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('Fine Tune Model')); ?> <?php echo e(__('words')); ?></span></li>
                                                                    <?php else: ?>	
                                                                        <?php if($subscription->fine_tune_credits != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Fine Tune Model')); ?> <?php echo e(number_format($subscription->fine_tune_credits)); ?></span> <span class="plan-feature-text"><?php echo e(__('words')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if($subscription->claude_3_opus_credits == -1): ?>
                                                                        <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('Claude 3 Opus Model')); ?> <?php echo e(__('words')); ?></span></li>
                                                                    <?php else: ?>	
                                                                        <?php if($subscription->claude_3_opus_credits != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Claude 3 Opus Model')); ?> <?php echo e(number_format($subscription->claude_3_opus_credits)); ?></span> <span class="plan-feature-text"><?php echo e(__('words')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if($subscription->claude_3_sonnet_credits == -1): ?>
                                                                        <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('Claude 3.5 Sonnet Model')); ?> <?php echo e(__('words')); ?></span></li>
                                                                    <?php else: ?>	
                                                                        <?php if($subscription->claude_3_sonnet_credits != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Claude 3.5 Sonnet Model')); ?> <?php echo e(number_format($subscription->claude_3_sonnet_credits)); ?></span> <span class="plan-feature-text"><?php echo e(__('words')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if($subscription->claude_3_haiku_credits == -1): ?>
                                                                        <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('Claude 3 Haiku Model')); ?> <?php echo e(__('words')); ?></span></li>
                                                                    <?php else: ?>	
                                                                        <?php if($subscription->claude_3_haiku_credits != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Claude 3 Haiku Model')); ?> <?php echo e(number_format($subscription->claude_3_haiku_credits)); ?></span> <span class="plan-feature-text"><?php echo e(__('words')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if($subscription->gemini_pro_credits == -1): ?>
                                                                        <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('Gemini Pro Model')); ?> <?php echo e(__('words')); ?></span></li>
                                                                    <?php else: ?>	
                                                                        <?php if($subscription->gemini_pro_credits != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Gemini Pro Model')); ?> <?php echo e(number_format($subscription->gemini_pro_credits)); ?></span> <span class="plan-feature-text"><?php echo e(__('words')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.image_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->dalle_image_engine != 'none'): ?>
                                                                            <?php if($subscription->dalle_images == -1): ?>
                                                                                <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('Dalle images')); ?></span></li>
                                                                            <?php else: ?>
                                                                                <?php if($subscription->dalle_images != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(number_format($subscription->dalle_images)); ?></span> <span class="plan-feature-text"><?php echo e(__('Dalle images')); ?></span></li> <?php endif; ?>
                                                                            <?php endif; ?>
                                                                        <?php endif; ?>																
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.image_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->sd_image_engine != 'none'): ?>
                                                                            <?php if($subscription->sd_images == -1): ?>
                                                                                <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('SD images')); ?></span></li>
                                                                            <?php else: ?>
                                                                                <?php if($subscription->sd_images != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(number_format($subscription->sd_images)); ?></span> <span class="plan-feature-text"><?php echo e(__('SD images')); ?></span></li> <?php endif; ?>
                                                                            <?php endif; ?>
                                                                        <?php endif; ?>																	
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.whisper_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->minutes == -1): ?>
                                                                            <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('minutes')); ?></span></li>
                                                                        <?php else: ?>
                                                                            <?php if($subscription->minutes != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(number_format($subscription->minutes)); ?></span> <span class="plan-feature-text"><?php echo e(__('minutes')); ?></span></li> <?php endif; ?>
                                                                        <?php endif; ?>																	
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.voiceover_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->characters == -1): ?>
                                                                            <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('characters')); ?></span></li>
                                                                        <?php else: ?>
                                                                            <?php if($subscription->characters != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(number_format($subscription->characters)); ?></span> <span class="plan-feature-text"><?php echo e(__('characters')); ?></span></li> <?php endif; ?>
                                                                        <?php endif; ?>																	
                                                                    <?php endif; ?>
                                                                        <?php if($subscription->team_members != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(number_format($subscription->team_members)); ?></span> <span class="plan-feature-text"><?php echo e(__('team members')); ?></span></li> <?php endif; ?>
                                                                    
                                                                    <?php if(config('settings.writer_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->writer_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI Writer Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.wizard_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->wizard_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI Article Wizard Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.smart_editor_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->smart_editor_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('Smart Editor Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.rewriter_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->rewriter_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI ReWriter Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.chat_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->chat_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI Chats Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.image_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->image_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI Images Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.voiceover_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->voiceover_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI Voiceover Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.video_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->video_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI Video Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.voice_clone_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->voice_clone_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('Voice Clone Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.sound_studio_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->sound_studio_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('Sound Studio Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.whisper_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->transcribe_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI Speech to Text Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.plagiarism_checker_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->plagiarism_checker_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI Plagiarism Checker Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.vision_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->vision_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI Vision Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.ai_detector_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->ai_detector_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI Detector Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.chat_file_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->chat_file_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI File Chat Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.chat_web_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->chat_web_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI Web Chat Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.code_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->code_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI Code Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if($subscription->team_members): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('Team Members Option')); ?></span></li> <?php endif; ?>
                                                                    <?php $__currentLoopData = (explode(',', $subscription->plan_features)); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php if($feature): ?>
                                                                            <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <?php echo e($feature); ?></li>
                                                                        <?php endif; ?>																
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>															
                                                                </ul>																
                                                            </div>					
                                                        </div>	
                                                    </div>							
                                                </div>											
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
                                        </div>	
                                    
                                    <?php else: ?>
                                        <div class="row text-center">
                                            <div class="col-sm-12 mt-6 mb-6">
                                                <h6 class="fs-12 font-weight-bold text-center"><?php echo e(__('No Subscriptions plans were set yet')); ?></h6>
                                            </div>
                                        </div>
                                    <?php endif; ?>					
                                </div>
                            <?php endif; ?>	
                            
                            <?php if($lifetime): ?>
                                <div class="tab-pane <?php if((!$monthly && $lifetime) && (!$yearly && $lifetime)): ?> active <?php else: ?> '' <?php endif; ?>" id="lifetime">

                                    <?php if($lifetime_subscriptions->count()): ?>                                                    
                                        
                                        <div class="row justify-content-md-center">
                                        
                                            <?php $__currentLoopData = $lifetime_subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>																			
                                                <div class="col-lg-4 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="200" data-aos-once="true" data-aos-duration="400">
                                                    <div class="pt-2 ml-2 mr-2 h-100 prices-responsive">
                                                        <div class="card p-5 mb-4 pl-6 pr-6 h-100 price-card <?php if($subscription->featured): ?> price-card-border <?php endif; ?>">
                                                            <?php if($subscription->featured): ?>
                                                                <span class="plan-featured"><?php echo e(__('Most Popular')); ?></span>
                                                            <?php endif; ?>
                                                            <div class="plan">			
                                                                <div class="plan-title"><?php echo e($subscription->plan_name); ?></div>
                                                                <p class="plan-cost mb-5">
                                                                    <?php if($subscription->free): ?>
                                                                        <?php echo e(__('Free')); ?>

                                                                    <?php else: ?>
                                                                        <?php echo config('payment.default_system_currency_symbol'); ?><?php if(config('payment.decimal_points') == 'allow'): ?><?php echo e(number_format((float)$subscription->price, 2)); ?> <?php else: ?><?php echo e(number_format($subscription->price)); ?> <?php endif; ?><span class="fs-12 text-muted"><span class="mr-1">/</span> <?php echo e(__('for lifetime')); ?></span>
                                                                    <?php endif; ?>	
                                                                </p>																				
                                                                <div class="text-center action-button mt-2 mb-5">
                                                                    <a href="<?php echo e(route('register')); ?>" class="btn btn-primary-pricing"><?php echo e(__('Subscribe Now')); ?></a>                                               														
                                                                </div>
                                                                <p class="fs-12 mb-3 text-muted"><?php echo e(__('Included Features')); ?></p>																	
                                                                <ul class="fs-12 pl-3">	
                                                                    <?php if($subscription->gpt_4_turbo_credits == -1): ?>
                                                                        <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('GPT 4T Model')); ?> <?php echo e(__('words')); ?></span></li>
                                                                    <?php else: ?>	
                                                                        <?php if($subscription->gpt_4_turbo_credits != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('GPT 4T')); ?> <?php echo e(number_format($subscription->gpt_4_turbo_credits)); ?></span> <span class="plan-feature-text"><?php echo e(__('words')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if($subscription->gpt_4_credits == -1): ?>
                                                                        <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('GPT 4 Model')); ?> <?php echo e(__('words')); ?></span></li>
                                                                    <?php else: ?>	
                                                                        <?php if($subscription->gpt_4_credits != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('GPT 4')); ?> <?php echo e(number_format($subscription->gpt_4_credits)); ?></span> <span class="plan-feature-text"><?php echo e(__('words')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if($subscription->gpt_4o_credits == -1): ?>
                                                                        <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('GPT 4o Model')); ?> <?php echo e(__('words')); ?></span></li>
                                                                    <?php else: ?>	
                                                                        <?php if($subscription->gpt_4o_credits != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('GPT 4o')); ?> <?php echo e(number_format($subscription->gpt_4o_credits)); ?></span> <span class="plan-feature-text"><?php echo e(__('words')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if($subscription->gpt_4o_mini_credits == -1): ?>
                                                                        <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('GPT 4o  miniModel')); ?> <?php echo e(__('words')); ?></span></li>
                                                                    <?php else: ?>	
                                                                        <?php if($subscription->gpt_4o_mini_credits != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('GPT 4o mini')); ?> <?php echo e(number_format($subscription->gpt_4o_mini_credits)); ?></span> <span class="plan-feature-text"><?php echo e(__('words')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if($subscription->gpt_3_turbo_credits == -1): ?>
                                                                        <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('GPT 3.5T Model')); ?> <?php echo e(__('words')); ?></span></li>
                                                                    <?php else: ?>	
                                                                        <?php if($subscription->gpt_3_turbo_credits != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('GPT 3.5T')); ?> <?php echo e(number_format($subscription->gpt_3_turbo_credits)); ?></span> <span class="plan-feature-text"><?php echo e(__('words')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if($subscription->fine_tune_credits == -1): ?>
                                                                        <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('Fine Tune Model')); ?> <?php echo e(__('words')); ?></span></li>
                                                                    <?php else: ?>	
                                                                        <?php if($subscription->fine_tune_credits != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Fine Tune Model')); ?> <?php echo e(number_format($subscription->fine_tune_credits)); ?></span> <span class="plan-feature-text"><?php echo e(__('words')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if($subscription->claude_3_opus_credits == -1): ?>
                                                                        <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('Claude 3 Opus Model')); ?> <?php echo e(__('words')); ?></span></li>
                                                                    <?php else: ?>	
                                                                        <?php if($subscription->claude_3_opus_credits != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Claude 3 Opus Model')); ?> <?php echo e(number_format($subscription->claude_3_opus_credits)); ?></span> <span class="plan-feature-text"><?php echo e(__('words')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if($subscription->claude_3_sonnet_credits == -1): ?>
                                                                        <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('Claude 3.5 Sonnet Model')); ?> <?php echo e(__('words')); ?></span></li>
                                                                    <?php else: ?>	
                                                                        <?php if($subscription->claude_3_sonnet_credits != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Claude 3.5 Sonnet Model')); ?> <?php echo e(number_format($subscription->claude_3_sonnet_credits)); ?></span> <span class="plan-feature-text"><?php echo e(__('words')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if($subscription->claude_3_haiku_credits == -1): ?>
                                                                        <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('Claude 3 Haiku Model')); ?> <?php echo e(__('words')); ?></span></li>
                                                                    <?php else: ?>	
                                                                        <?php if($subscription->claude_3_haiku_credits != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Claude 3 Haiku Model')); ?> <?php echo e(number_format($subscription->claude_3_haiku_credits)); ?></span> <span class="plan-feature-text"><?php echo e(__('words')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if($subscription->gemini_pro_credits == -1): ?>
                                                                        <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('Gemini Pro Model')); ?> <?php echo e(__('words')); ?></span></li>
                                                                    <?php else: ?>	
                                                                        <?php if($subscription->gemini_pro_credits != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Gemini Pro Model')); ?> <?php echo e(number_format($subscription->gemini_pro_credits)); ?></span> <span class="plan-feature-text"><?php echo e(__('words')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.image_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->dalle_image_engine != 'none'): ?>
                                                                            <?php if($subscription->dalle_images == -1): ?>
                                                                                <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('Dalle images')); ?></span></li>
                                                                            <?php else: ?>
                                                                                <?php if($subscription->dalle_images != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(number_format($subscription->dalle_images)); ?></span> <span class="plan-feature-text"><?php echo e(__('Dalle images')); ?></span></li> <?php endif; ?>
                                                                            <?php endif; ?>
                                                                        <?php endif; ?>																
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.image_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->sd_image_engine != 'none'): ?>
                                                                            <?php if($subscription->sd_images == -1): ?>
                                                                                <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('SD images')); ?></span></li>
                                                                            <?php else: ?>
                                                                                <?php if($subscription->sd_images != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(number_format($subscription->sd_images)); ?></span> <span class="plan-feature-text"><?php echo e(__('SD images')); ?></span></li> <?php endif; ?>
                                                                            <?php endif; ?>
                                                                        <?php endif; ?>																	
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.whisper_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->minutes == -1): ?>
                                                                            <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('minutes')); ?></span></li>
                                                                        <?php else: ?>
                                                                            <?php if($subscription->minutes != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(number_format($subscription->minutes)); ?></span> <span class="plan-feature-text"><?php echo e(__('minutes')); ?></span></li> <?php endif; ?>
                                                                        <?php endif; ?>																	
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.voiceover_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->characters == -1): ?>
                                                                            <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(__('Unlimited')); ?></span> <span class="plan-feature-text"><?php echo e(__('characters')); ?></span></li>
                                                                        <?php else: ?>
                                                                            <?php if($subscription->characters != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(number_format($subscription->characters)); ?></span> <span class="plan-feature-text"><?php echo e(__('characters')); ?></span></li> <?php endif; ?>
                                                                        <?php endif; ?>																	
                                                                    <?php endif; ?>
                                                                        <?php if($subscription->team_members != 0): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="font-weight-bold"><?php echo e(number_format($subscription->team_members)); ?></span> <span class="plan-feature-text"><?php echo e(__('team members')); ?></span></li> <?php endif; ?>
                                                                    
                                                                    <?php if(config('settings.writer_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->writer_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI Writer Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.wizard_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->wizard_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI Article Wizard Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.smart_editor_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->smart_editor_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('Smart Editor Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.rewriter_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->rewriter_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI ReWriter Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.chat_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->chat_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI Chats Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.image_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->image_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI Images Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.voiceover_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->voiceover_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI Voiceover Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.video_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->video_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI Video Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.voice_clone_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->voice_clone_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('Voice Clone Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.sound_studio_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->sound_studio_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('Sound Studio Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.whisper_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->transcribe_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI Speech to Text Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.plagiarism_checker_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->plagiarism_checker_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI Plagiarism Checker Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.vision_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->vision_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI Vision Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.ai_detector_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->ai_detector_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI Detector Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.chat_file_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->chat_file_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI File Chat Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.chat_web_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->chat_web_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI Web Chat Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if(config('settings.code_feature_user') == 'allow'): ?>
                                                                        <?php if($subscription->code_feature): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('AI Code Feature')); ?></span></li> <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if($subscription->team_members): ?> <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <span class="plan-feature-text"><?php echo e(__('Team Members Option')); ?></span></li> <?php endif; ?>
                                                                    <?php $__currentLoopData = (explode(',', $subscription->plan_features)); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php if($feature): ?>
                                                                            <li class="fs-13 mb-3"><i class="fa-solid fa-check fs-14 mr-2 text-success"></i> <?php echo e($feature); ?></li>
                                                                        <?php endif; ?>																
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>															
                                                                </ul>																
                                                            </div>					
                                                        </div>	
                                                    </div>							
                                                </div>											
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>					

                                        </div>

                                    <?php else: ?>
                                        <div class="row text-center">
                                            <div class="col-sm-12 mt-6 mb-6">
                                                <h6 class="fs-12 font-weight-bold text-center"><?php echo e(__('No lifetime plans were set yet')); ?></h6>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                </div>	
                            <?php endif; ?>	
                        </div>
                    </div>
                
                <?php else: ?>
                    <div class="row text-center">
                        <div class="col-sm-12 mt-6 mb-6">
                            <h6 class="fs-12 font-weight-bold text-center"><?php echo e(__('No Subscriptions or Prepaid plans were set yet')); ?></h6>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="text-center">
                    <p class="mb-0 mt-2"><i class="fa-solid fa-shield-check text-success mr-2"></i><span class="text-muted fs-12"><?php echo e(__('PCI DSS Compliant')); ?></span></p>
                </div>
    
            </div>
        </div>
    
    </div>

</section>
  <?php /**PATH /home/videmak/public_html/resources/views/default/frontend/pricing/section.blade.php ENDPATH**/ ?>