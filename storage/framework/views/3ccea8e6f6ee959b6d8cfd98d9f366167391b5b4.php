<?php echo Form::open(['url' => '', 'class' =>'wt-formtheme wt-userform', 'id' =>'general-home-setting-form', '@submit.prevent'=>'submitGeneralHomeSettings']); ?>

    <div class="wt-location wt-tabsinfo">
        <div class="wt-tabscontenttitle">
            <h2><?php echo e(trans('lang.homepage')); ?></h2>
        </div>
        <div class="wt-settingscontent">
            <div class="wt-formtheme wt-userform">
                <div class="form-group">
                    <span class="wt-select">
                        <select class="form-control" name="home">
                            <?php $__currentLoopData = $homepage_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $selected = $value->id == $selected_homepage ? 'selected' : '' ?>
                                <option value="<?php echo e($value->id); ?>" <?php echo e($selected); ?>> <?php echo e($value->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="wt-updatall la-updateall-holder">
        <i class="ti-announcement"></i>
        <span><?php echo e(trans('lang.save_changes_note')); ?></span>
        <?php echo Form::submit(trans('lang.btn_save'),['class' => 'wt-btn']); ?>

    </div>
<?php echo Form::close(); ?>

