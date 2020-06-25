<?php $__env->startSection('content'); ?>
    <?php
        $breadcrumbs_settings = \App\SiteManagement::getMetaValue('show_breadcrumb');
        $show_breadcrumbs = !empty($breadcrumbs_settings) ? $breadcrumbs_settings : 'true';
        $breadcrumbs = Breadcrumbs::generate('accessDenied');
    ?>
    <?php if(file_exists(resource_path('views/extend/front-end/includes/inner-banner.blade.php'))): ?> 
        <?php echo $__env->make('extend.front-end.includes.inner-banner', 
            ['title' => trans('lang.access_denied'), 'inner_banner' => '', 'show_banner' => 'true' ]
        , \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php else: ?> 
        <?php echo $__env->make('front-end.includes.inner-banner', 
            ['title' =>  trans('lang.access_denied'), 'inner_banner' => '', 'show_banner' => 'true' ]
        , \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>
    <div class="wt-haslayout wt-main-section">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-xs-12 col-sm-12 col-md-10 push-md-1 col-lg-8 push-lg-2">
                    <div class="wt-404errorpage">
                        <div class="wt-404errorcontent">
                            <div class="wt-title">
                                <h3><?php echo e(trans('lang.no_access')); ?></h3>
                            </div>
                            <div class="wt-description">
                            <a class="wt-btn btn-large" href="<?php echo e(url('/')); ?>"><?php echo e(trans('lang.home')); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make(file_exists(resource_path('views/extend/front-end/master.blade.php')) ? 'extend.front-end.master' : 'front-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>