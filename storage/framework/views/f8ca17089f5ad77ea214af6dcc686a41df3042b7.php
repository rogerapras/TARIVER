<div class="la-inner-pages wt-haslayout">
<?php echo Form::open(['url' => '', 'class' =>'wt-formtheme wt-userform', 'id' =>'project_settings_form', '@submit.prevent'=>'submitProjectSettings']); ?>

    <div class="wt-location wt-tabsinfo">
        <div class="wt-tabscontenttitle">
            <h2><?php echo e(trans('lang.completed_projects')); ?></h2>
        </div>
        <div class="wt-settingscontent">
            <div class="wt-settingscontent la-settingsradio">
                <div class="wt-description"><p><?php echo e(trans('lang.completed_project_note')); ?></p></div>
                <switch_button v-model="enable_completed_projects"><?php echo e(trans('lang.show_hide_job')); ?></switch_button>
                <input type="hidden" :value="enable_completed_projects" name="enable_completed_projects">
            </div>

        </div>
    </div>
    <div class="wt-updatall la-updateall-holder">
        <i class="ti-announcement"></i>
        <span><?php echo e(trans('lang.save_changes_note')); ?></span>
        <?php echo Form::submit(trans('lang.btn_save'),['class' => 'wt-btn']); ?>

    </div>
<?php echo Form::close(); ?>

</div>
