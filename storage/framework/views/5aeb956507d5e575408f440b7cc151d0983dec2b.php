<div class="card-footer p-0">	
    <div class="row text-center pt-4 pb-4">
        <div class="col-sm">
            <h4 class="mb-3 mt-1 font-weight-800 text-primary fs-16"><?php if(auth()->user()->gpt_4_turbo_credits == -1): ?> <?php echo e(__('Unlimited')); ?> <?php else: ?> <?php echo e(App\Services\HelperService::userAvailableGPT4TWords()); ?> <?php endif; ?></h4>
            <h6 class="fs-12"><?php echo e(__('GPT 4 Turbo')); ?> <?php echo e(__('Words')); ?></h6>
        </div>
        <div class="col-sm">
            <h4 class="mb-3 mt-1 font-weight-800 text-primary fs-16"><?php if(auth()->user()->gpt_4_credits == -1): ?> <?php echo e(__('Unlimited')); ?> <?php else: ?> <?php echo e(App\Services\HelperService::userAvailableGPT4Words()); ?> <?php endif; ?></h4>
            <h6 class="fs-12"><?php echo e(__('GPT 4')); ?> <?php echo e(__('Words')); ?></h6>
        </div>
    </div>							
    <div class="row text-center pt-4 pb-4">
        <div class="col-sm">
            <h4 class="mb-3 mt-1 font-weight-800 text-primary fs-16"><?php if(auth()->user()->gpt_4o_credits == -1): ?> <?php echo e(__('Unlimited')); ?> <?php else: ?> <?php echo e(App\Services\HelperService::userAvailableGPT4oWords()); ?> <?php endif; ?></h4>
            <h6 class="fs-12"><?php echo e(__('GPT 4o')); ?> <?php echo e(__('Words')); ?></h6>
        </div>
        <div class="col-sm">
            <h4 class="mb-3 mt-1 font-weight-800 text-primary fs-16"><?php if(auth()->user()->gpt_3_turbo_credits == -1): ?> <?php echo e(__('Unlimited')); ?> <?php else: ?> <?php echo e(App\Services\HelperService::userAvailableWords()); ?> <?php endif; ?></h4>
            <h6 class="fs-12"><?php echo e(__('GPT 3.5 Turbo')); ?> <?php echo e(__('Words')); ?></h6>
        </div>
    </div>
    <div class="row text-center pt-4 pb-4">
        <div class="col-sm">
            <h4 class="mb-3 mt-1 font-weight-800 text-primary fs-16"><?php if(auth()->user()->claude_3_opus_credits == -1): ?> <?php echo e(__('Unlimited')); ?> <?php else: ?> <?php echo e(App\Services\HelperService::userAvailableClaudeOpusWords()); ?> <?php endif; ?></h4>
            <h6 class="fs-12"><?php echo e(__('Claude 3 Opus')); ?> <?php echo e(__('Words')); ?></h6>
        </div>
        <div class="col-sm">
            <h4 class="mb-3 mt-1 font-weight-800 text-primary fs-16"><?php if(auth()->user()->claude_3_sonnet_credits == -1): ?> <?php echo e(__('Unlimited')); ?> <?php else: ?> <?php echo e(App\Services\HelperService::userAvailableClaudeSonnetWords()); ?> <?php endif; ?></h4>
            <h6 class="fs-12"><?php echo e(__('Claude 3.5 Sonnet')); ?> <?php echo e(__('Words')); ?></h6>
        </div>
    </div>
    <div class="row text-center pt-4 pb-4">
        <div class="col-sm">
            <h4 class="mb-3 mt-1 font-weight-800 text-primary fs-16"><?php if(auth()->user()->claude_3_haiku_credits == -1): ?> <?php echo e(__('Unlimited')); ?> <?php else: ?> <?php echo e(App\Services\HelperService::userAvailableClaudeHaikuWords()); ?> <?php endif; ?></h4>
            <h6 class="fs-12"><?php echo e(__('Claude 3 Haiku')); ?> <?php echo e(__('Words')); ?></h6>
        </div>
        <div class="col-sm">
            <h4 class="mb-3 mt-1 font-weight-800 text-primary fs-16"><?php if(auth()->user()->gemini_pro_credits == -1): ?> <?php echo e(__('Unlimited')); ?> <?php else: ?> <?php echo e(App\Services\HelperService::userAvailableGeminiProWords()); ?> <?php endif; ?></h4>
            <h6 class="fs-12"><?php echo e(__('Gemini Pro')); ?> <?php echo e(__('Words')); ?></h6>
        </div>
    </div>
    <div class="row text-center pt-4 pb-4">
        <div class="col-sm">
            <h4 class="mb-3 mt-1 font-weight-800 text-primary fs-16"><?php if(auth()->user()->fine_tune_credits == -1): ?> <?php echo e(__('Unlimited')); ?> <?php else: ?> <?php echo e(App\Services\HelperService::userAvailableFineTuneWords()); ?> <?php endif; ?></h4>
            <h6 class="fs-12"><?php echo e(__('Fine Tune')); ?> <?php echo e(__('Words')); ?></h6>
        </div>
    </div>
    <div class="row text-center pt-4 pb-4">
        <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'user|subscriber|admin')): ?>
            <?php if(config('settings.image_feature_user') == 'allow'): ?>
                <div class="col-sm">
                    <h4 class="mb-3 mt-1 font-weight-800 text-primary fs-16"><?php echo e(App\Services\HelperService::userAvailableDEImages()); ?></h4>
                    <h6 class="fs-12"><?php echo e(__('Dalle Images Left')); ?></h6>
                </div>
                <div class="col-sm">
                    <h4 class="mb-3 mt-1 font-weight-800 text-primary fs-16"><?php echo e(App\Services\HelperService::userAvailableSDImages()); ?></h4>
                    <h6 class="fs-12"><?php echo e(__('SD Images Left')); ?></h6>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <?php if(config('settings.voiceover_feature_user') == 'allow' || config('settings.whisper_feature_user') == 'allow'): ?>
        <div class="row text-center pb-4">
            <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'user|subscriber|admin')): ?>
                <?php if(config('settings.voiceover_feature_user') == 'allow'): ?>
                    <div class="col-sm">
                        <h4 class="mb-3 mt-1 font-weight-800 text-primary fs-16"><?php if(auth()->user()->available_chars == -1): ?> <?php echo e(__('Unlimited')); ?> <?php else: ?> <?php echo e(App\Services\HelperService::userAvailableChars()); ?> <?php endif; ?></h4>
                        <h6 class="fs-12"><?php echo e(__('Characters Left')); ?></h6>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'user|subscriber|admin')): ?>
                <?php if(config('settings.whisper_feature_user') == 'allow'): ?>
                    <div class="col-sm">
                        <h4 class="mb-3 mt-1 font-weight-800 text-primary fs-16"><?php if(auth()->user()->available_minutes == -1): ?> <?php echo e(__('Unlimited')); ?> <?php else: ?> <?php echo e(App\Services\HelperService::userAvailableMinutes()); ?> <?php endif; ?></h4>
                        <h6 class="fs-12"><?php echo e(__('Minutes Left')); ?></h6>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>															
</div><?php /**PATH /home/videmak/public_html/resources/views/default/components/user-credits.blade.php ENDPATH**/ ?>