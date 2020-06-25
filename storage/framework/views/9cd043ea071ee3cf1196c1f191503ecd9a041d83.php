<?php $__env->startPush('sliderStyle'); ?>
    <link href="<?php echo e(asset('css/antd.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="pages-listing" id="pages-list">
        <?php if(Session::has('message')): ?>
            <div class="flash_msg">
                <flash_messages :message_class="'success'" :time='5' :message="'<?php echo e(Session::get('message')); ?>'" v-cloak></flash_messages>
            </div>
        <?php elseif(Session::has('error')): ?>
            <div class="flash_msg">
                <flash_messages :message_class="'danger'" :time ='5' :message="'<?php echo e(Session::get('error')); ?>'" v-cloak></flash_messages>
            </div>
        <?php endif; ?>
        <?php if($errors->any()): ?>
            <ul class="wt-jobalerts">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flash_msg">
                        <flash_messages :message_class="'danger'" :time='10' :message="'<?php echo e($error); ?>'" v-cloak></flash_messages>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        <?php endif; ?>
        <section class="wt-haslayout wt-dbsectionspace">
            <edit-new-page 
                :seo_desc="'<?php echo e($seo_desc); ?>'"
                :has_child="'<?php echo e(json_encode($has_child)); ?>'"
                :selected_parent="'<?php echo e($parent_selected_id); ?>'" 
                :parent_pages="'<?php echo e(json_encode($parent_page)); ?>'"
                :page_id="'<?php echo e($page['id']); ?>'" 
                :page="'<?php echo e(json_encode($page)); ?>'" 
                :app_styles = "'<?php echo e(json_encode($app_style_list)); ?>'"
                :sections_list="'<?php echo e(json_encode($sections)); ?>'"
                :access_type="'<?php echo e($access_type); ?>'"
                :slider_styles="'<?php echo e(json_encode($slider_style_list)); ?>'"
                >
            </edit-new-page>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>