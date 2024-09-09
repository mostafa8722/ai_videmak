<!-- JQuery-->
<script src="<?php echo e(URL::asset('plugins/jquery/jquery-3.6.0.min.js')); ?>"></script>

<!-- Bootstrap 5-->
<script src="<?php echo e(URL::asset('plugins/bootstrap-5.0.2/js/bootstrap.bundle.min.js')); ?>"></script>

<!-- Toastr JS -->
<script src="<?php echo e(URL::asset('plugins/toastr/toastr.min.js')); ?>"></script> 

<?php echo $__env->yieldContent('js'); ?>

<!-- Google Analytics -->
<?php if(config('services.google.analytics.enable') == 'on'): ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo e(config('services.google.analytics.id')); ?>"></script>
    <script type="text/javascript">
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '<?php echo e(config('services.google.analytics.id')); ?>');
    </script>
<?php endif; ?>

<!-- Live Chat -->
<?php if(config('settings.live_chat') == 'on'): ?>
    <script type="text/javascript">
        let link = "<?php echo e(config('settings.live_chat_link')); ?>";
        let embed_link = link.replace('https://tawk.to/chat/', 'https://embed.tawk.to/');

        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src=embed_link;
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
<?php endif; ?>

<!-- Custom User JS File -->
<?php if(isset($frontend_settings)): ?>
    <?php if(!is_null($frontend_settings->custom_js_url)): ?> 
        <script src="<?php echo e($frontend_settings->custom_js_url); ?>"></script>
    <?php endif; ?>
<?php endif; ?><?php /**PATH /home/videmak/public_html/resources/views/default/layouts/frontend/footer.blade.php ENDPATH**/ ?>