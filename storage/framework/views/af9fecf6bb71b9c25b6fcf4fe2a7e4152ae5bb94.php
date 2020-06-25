<div class="la-inner-pages wt-haslayout">
    <?php echo Form::open(['url' => '', 'class' =>'wt-formtheme wt-userform', 'id' =>'breadcrumb-option', '@submit.prevent'=>'submitBreadcrumbs']); ?>

        <div class="wt-location wt-tabsinfo">
            <div class="wt-tabscontenttitle">
                    <h2><?php echo e(trans('lang.breadcrumbs_option')); ?></h2>
            </div>
            <div class="wt-settingscontent">
                <div class="wt-settingscontent la-settingsradio">
                    <div class="wt-description"><p><?php echo e(trans('lang.breadcrumbs_option_note')); ?></p></div>
                    <switch_button v-model="enable_breadcrumbs"><?php echo e(trans('lang.enable_disable')); ?></switch_button>
                    <input type="hidden" :value="enable_breadcrumbs" name="enable_breadcrumbs">
                </div>

            </div>
        </div>
        <div class="wt-updatall la-updateall-holder">
            <i class="ti-announcement"></i>
            <span><?php echo e(trans('lang.save_changes_note')); ?></span>
            <?php echo Form::submit(trans('lang.btn_save'),['class' => 'wt-btn']); ?>

        </div>
    <?php echo Form::close(); ?>

    <?php echo Form::open(['url' => '', 'class' =>'wt-formtheme wt-userform', 'id' =>'inner-page-form', '@submit.prevent'=>'submitInnerPage']); ?>

        <div class="wt-location wt-tabsinfo">
            <div class="wt-tabscontenttitle">
                <h2><?php echo e(trans('lang.freelancer_listing')); ?></h2>
            </div>
            <div class="wt-settingscontent">
                <div class="wt-description"><p><?php echo e(trans('lang.seo_meta_title')); ?></p></div>
                <div class="wt-formtheme wt-userform">
                    <div class="form-group">
                        <?php echo Form::text('inner_page[0][f_list_meta_title]', e($f_list_meta_title), array('class' => 'form-control')); ?>

                    </div>
                </div>
            </div>
            <div class="wt-settingscontent">
                <div class="wt-description"><p><?php echo e(trans('lang.seo_meta_desc')); ?></p></div>
                <div class="wt-formtheme wt-userform">
                    <div class="form-group">
                        <?php echo Form::textarea('inner_page[0][f_list_meta_desc]', $f_list_meta_desc, array('class' => 'form-control')); ?>

                    </div>
                </div>
            </div>
            
            <div class="wt-settingscontent la-settingsradio">
                <div class="wt-description"><p><?php echo e(trans('lang.add_menu_to_navbar')); ?></p></div>
                <switch_button v-model="add_f_navbar"><?php echo e(trans('lang.add_remove_from_navbar')); ?></switch_button>
                <input type="hidden" :value="add_f_navbar" name="inner_page[0][add_f_navbar]">
            </div>
            <div class="wt-location wt-tabsinfo">
                <div class="wt-tabscontenttitle">
                    <h2><?php echo e(trans('lang.header_style')); ?></h2>
                </div>
                <div class="wt-settingscontent">
                    <div class="amt-section-select amt-profile-settings">
                        <ul class="at-profile-setting__imgs">
                            <li v-for="(style, index) in getInnerHeaderStyles()" :key="index">
                                <input 
                                    type="radio" 
                                    name="inner_page[0][f_header_style]"  
                                    :id="'fimage1'+index"  
                                    :value="style.value" 
                                    :checked="style.value == '<?php echo e($f_selected_header); ?>'"
                                    v-model="fSelectedHeader"
                                >
                                <label :for="'fimage1'+index">
                                    <span>
                                        <img :src='style.img' alt="Image Description">
                                        <span class="at-tick"><span><i class="fas fa-check"></i></span></span>
                                    </span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="wt-settingscontent la-settingsradio" v-if="fSelectedHeader!='style4'">
                <div class="wt-description"><p><?php echo e(trans('lang.show_f_banner')); ?></p></div>
                <switch_button v-model="show_f_banner"><?php echo e(trans('lang.show_hide_banner')); ?></switch_button>
                <input type="hidden" :value="show_f_banner" name="inner_page[0][show_f_banner]">
            </div>
            <?php if(file_exists(resource_path('views/extend/back-end/admin/settings/inner-pages/f_inner_banner.blade.php'))): ?>
                <?php echo $__env->make('extend.back-end.admin.settings.inner-pages.f_inner_banner', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php else: ?>
                <div class="wt-location wt-tabsinfo" v-if="fSelectedHeader!='style4'">
                    <?php echo $__env->make('back-end.admin.settings.inner-pages.f_inner_banner', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="wt-location wt-tabsinfo">
            <div class="wt-tabscontenttitle">
                <h2><?php echo e(trans('lang.header_styling')); ?></h2>
            </div>
            <div class="wt-settingscontent">
                <div class="wt-settingscontent la-settingsradio">
                    <div class="wt-description"><p><?php echo e(trans('lang.header_styling_note')); ?></p></div>
                    <switch_button v-model="freelancer_header_styling"><?php echo e(trans('lang.enable_disable')); ?></switch_button>
                    <input type="hidden" :value="freelancer_header_styling" name="inner_page[0][freelancer_header_styling]">
                </div>
            </div>
            <div class="wt-settingscontent" v-if="freelancer_header_styling && colorSettings">
                <div class="amt-element-title amt-element-titlecontent">
                    <h6><?php echo e(trans('lang.menu_color')); ?></h6>
                    <verte menuPosition="right" model="hex" v-model="freelancerHeaderStyling.textColor"></verte>
                    <input type="hidden" :value="freelancerHeaderStyling.textColor" name="inner_page[0][f_menu_color]">
                </div>
                <div class="amt-element-title amt-element-titlecontent">
                    <h6><?php echo e(trans('lang.hover_color')); ?></h6>
                    <verte menuPosition="right" model="hex" v-model="freelancerHeaderStyling.menuColor"></verte>
                    <input type="hidden" :value="freelancerHeaderStyling.menuColor" name="inner_page[0][f_hover_color]">
                </div>
                <div class="amt-element-title amt-element-titlecontent">
                    <h6><?php echo e(trans('lang.color')); ?></h6>
                    <verte menuPosition="right" model="hex" v-model="freelancerHeaderStyling.HoverColor"></verte>
                    <input type="hidden" :value="freelancerHeaderStyling.HoverColor" name="inner_page[0][f_menu_text_color]">
                </div>
                <?php if(file_exists(resource_path('views/extend/back-end/admin/settings/inner-pages/f_logo.blade.php'))): ?>
                    <?php echo $__env->make('extend.back-end.admin.settings.inner-pages.f_logo', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php else: ?>
                    <div class="wt-location wt-tabsinfo">
                        <?php echo $__env->make('back-end.admin.settings.inner-pages.f_logo', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="wt-location wt-tabsinfo">
            <div class="wt-tabscontenttitle">
                <h2><?php echo e(trans('lang.emp_listing')); ?></h2>
            </div>
            <div class="wt-settingscontent">
                <div class="wt-description"><p><?php echo e(trans('lang.seo_meta_title')); ?></p></div>
                <div class="wt-formtheme wt-userform">
                    <div class="form-group">
                        <?php echo Form::text('inner_page[0][emp_list_meta_title]', $emp_list_meta_title, array('class' => 'form-control')); ?>

                    </div>
                </div>
            </div>
            <div class="wt-settingscontent">
                <div class="wt-description"><p><?php echo e(trans('lang.seo_meta_desc')); ?></p></div>
                <div class="wt-formtheme wt-userform">
                    <div class="form-group">
                        <?php echo Form::textarea('inner_page[0][emp_list_meta_desc]', $emp_list_meta_desc, array('class' => 'form-control')); ?>

                    </div>
                </div>
            </div>
            <div class="wt-settingscontent la-settingsradio">
                <div class="wt-description"><p><?php echo e(trans('lang.add_menu_to_navbar')); ?></p></div>
                <switch_button v-model="add_emp_navbar"><?php echo e(trans('lang.add_remove_from_navbar')); ?></switch_button>
                <input type="hidden" :value="add_emp_navbar" name="inner_page[0][add_emp_navbar]">
            </div>
            <div class="wt-location wt-tabsinfo">
                <div class="wt-tabscontenttitle">
                    <h2><?php echo e(trans('lang.header_style')); ?></h2>
                </div>
                <div class="wt-settingscontent">
                    <div class="amt-section-select amt-profile-settings">
                        <ul class="at-profile-setting__imgs">
                            <li v-for="(style, index) in getInnerHeaderStyles()" :key="index">
                                <input 
                                    type="radio" 
                                    name="inner_page[0][emp_header_style]"  
                                    :id="'eimage1'+index"  
                                    :value="style.value" 
                                    :checked="style.value == '<?php echo e($emp_selected_header); ?>'"
                                    v-model="empSelectedHeader"
                                >
                                <label :for="'eimage1'+index">
                                    <span>
                                        <img :src='style.img' alt="Image Description">
                                        <span class="at-tick"><span><i class="fas fa-check"></i></span></span>
                                    </span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="wt-settingscontent la-settingsradio" v-if="empSelectedHeader != 'style4'">
                <div class="wt-description"><p><?php echo e(trans('lang.show_emp_banner')); ?></p></div>
                <switch_button v-model="show_emp_banner"><?php echo e(trans('lang.show_hide_banner')); ?></switch_button>
                <input type="hidden" :value="show_emp_banner" name="inner_page[0][show_emp_banner]">
            </div>
            <?php if(file_exists(resource_path('views/extend/back-end/admin/settings/inner-pages/e_inner_banner.blade.php'))): ?>
                <?php echo $__env->make('extend.back-end.admin.settings.inner-pages.e_inner_banner', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php else: ?>
                <div class="wt-location wt-tabsinfo" v-if="empSelectedHeader != 'style4'">
                    <?php echo $__env->make('back-end.admin.settings.inner-pages.e_inner_banner', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="wt-location wt-tabsinfo">
            <div class="wt-tabscontenttitle">
                <h2><?php echo e(trans('lang.header_styling')); ?></h2>
            </div>
            <div class="wt-settingscontent">
                <div class="wt-settingscontent la-settingsradio">
                    <div class="wt-description"><p><?php echo e(trans('lang.header_styling_note')); ?></p></div>
                    <switch_button v-model="employer_header_styling"><?php echo e(trans('lang.enable_disable')); ?></switch_button>
                    <input type="hidden" :value="employer_header_styling" name="inner_page[0][employer_header_styling]">
                </div>
            </div>
            <div class="wt-settingscontent" v-if="employer_header_styling && colorSettings">
                <div class="amt-element-title amt-element-titlecontent">
                    <h6><?php echo e(trans('lang.menu_color')); ?></h6>
                    <verte menuPosition="right" model="hex" v-model="employerHeaderStyling.textColor"></verte>
                    <input type="hidden" :value="employerHeaderStyling.textColor" name="inner_page[0][e_menu_color]">
                </div>
                <div class="amt-element-title amt-element-titlecontent">
                    <h6><?php echo e(trans('lang.hover_color')); ?></h6>
                    <verte menuPosition="right" model="hex" v-model="employerHeaderStyling.menuColor"></verte>
                    <input type="hidden" :value="employerHeaderStyling.menuColor" name="inner_page[0][e_hover_color]">
                </div>
                <div class="amt-element-title amt-element-titlecontent">
                    <h6><?php echo e(trans('lang.color')); ?></h6>
                    <verte menuPosition="right" model="hex" v-model="employerHeaderStyling.HoverColor"></verte>
                    <input type="hidden" :value="employerHeaderStyling.HoverColor" name="inner_page[0][e_menu_text_color]">
                </div>
                <?php if(file_exists(resource_path('views/extend/back-end/admin/settings/inner-pages/e_logo.blade.php'))): ?>
                    <?php echo $__env->make('extend.back-end.admin.settings.inner-pages.e_logo', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php else: ?>
                    <div class="wt-location wt-tabsinfo">
                        <?php echo $__env->make('back-end.admin.settings.inner-pages.e_logo', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="wt-location wt-tabsinfo">
            <div class="wt-tabscontenttitle">
                <h2><?php echo e(trans('lang.job_listing')); ?></h2>
            </div>
            <div class="wt-settingscontent">
                <div class="wt-description"><p><?php echo e(trans('lang.seo_meta_title')); ?></p></div>
                <div class="wt-formtheme wt-userform">
                    <div class="form-group">
                        <?php echo Form::text('inner_page[0][job_list_meta_title]', $job_list_meta_title, array('class' => 'form-control')); ?>

                    </div>
                </div>
            </div>
            <div class="wt-settingscontent">
                <div class="wt-description"><p><?php echo e(trans('lang.seo_meta_desc')); ?></p></div>
                <div class="wt-formtheme wt-userform">
                    <div class="form-group">
                        <?php echo Form::textarea('inner_page[0][job_list_meta_desc]', $job_list_meta_desc, array('class' => 'form-control')); ?>

                    </div>
                </div>
            </div>
            <div class="wt-settingscontent la-settingsradio">
                <div class="wt-description"><p><?php echo e(trans('lang.add_menu_to_navbar')); ?></p></div>
                <switch_button v-model="add_job_navbar"><?php echo e(trans('lang.add_remove_from_navbar')); ?></switch_button>
                <input type="hidden" :value="add_job_navbar" name="inner_page[0][add_job_navbar]">
            </div>
            <div class="wt-location wt-tabsinfo">
                <div class="wt-tabscontenttitle">
                    <h2><?php echo e(trans('lang.header_style')); ?></h2>
                </div>
                <div class="wt-settingscontent">
                    <div class="amt-section-select amt-profile-settings">
                        <ul class="at-profile-setting__imgs">
                            <li v-for="(style, index) in getInnerHeaderStyles()" :key="index">
                                <input 
                                    type="radio" 
                                    name="inner_page[0][job_header_style]"  
                                    :id="'jimage1'+index"  
                                    :value="style.value" 
                                    :checked="style.value == '<?php echo e($job_selected_header); ?>'"
                                    v-model="jobSelectedHeader"
                                >
                                <label :for="'jimage1'+index">
                                    <span>
                                        <img :src='style.img' alt="Image Description">
                                        <span class="at-tick"><span><i class="fas fa-check"></i></span></span>
                                    </span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="wt-settingscontent la-settingsradio" v-if="jobSelectedHeader != 'style4'">
                <div class="wt-description"><p><?php echo e(trans('lang.show_job_banner')); ?></p></div>
                <switch_button v-model="show_job_banner"><?php echo e(trans('lang.show_hide_banner')); ?></switch_button>
                <input type="hidden" :value="show_job_banner" name="inner_page[0][show_job_banner]">
            </div>
            <?php if(file_exists(resource_path('views/extend/back-end/admin/settings/inner-pages/job_inner_banner.blade.php'))): ?>
                <?php echo $__env->make('extend.back-end.admin.settings.inner-pages.job_inner_banner', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php else: ?>
                <div class="wt-location wt-tabsinfo" v-if="jobSelectedHeader != 'style4'">
                    <?php echo $__env->make('back-end.admin.settings.inner-pages.job_inner_banner', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            <?php endif; ?>
            <div class="wt-location wt-tabsinfo">
                <div class="wt-tabscontenttitle">
                    <h2><?php echo e(trans('lang.header_styling')); ?></h2>
                </div>
                <div class="wt-settingscontent">
                    <div class="wt-settingscontent la-settingsradio">
                        <div class="wt-description"><p><?php echo e(trans('lang.header_styling_note')); ?></p></div>
                        <switch_button v-model="job_header_styling"><?php echo e(trans('lang.enable_disable')); ?></switch_button>
                        <input type="hidden" :value="job_header_styling" name="inner_page[0][job_header_styling]">
                    </div>
                </div>
                <div class="wt-settingscontent" v-if="job_header_styling && colorSettings">
                    <div class="amt-element-title amt-element-titlecontent">
                        <h6><?php echo e(trans('lang.menu_color')); ?></h6>
                        <verte menuPosition="right" model="hex" v-model="jobHeaderStyling.textColor"></verte>
                        <input type="hidden" :value="jobHeaderStyling.textColor" name="inner_page[0][job_menu_color]">
                    </div>
                    <div class="amt-element-title amt-element-titlecontent">
                        <h6><?php echo e(trans('lang.hover_color')); ?></h6>
                        <verte menuPosition="right" model="hex" v-model="jobHeaderStyling.menuColor"></verte>
                        <input type="hidden" :value="jobHeaderStyling.menuColor" name="inner_page[0][job_hover_color]">
                    </div>
                    <div class="amt-element-title amt-element-titlecontent">
                        <h6><?php echo e(trans('lang.color')); ?></h6>
                        <verte menuPosition="right" model="hex" v-model="jobHeaderStyling.HoverColor"></verte>
                        <input type="hidden" :value="jobHeaderStyling.HoverColor" name="inner_page[0][job_menu_text_color]">
                    </div>
                    <?php if(file_exists(resource_path('views/extend/back-end/admin/settings/inner-pages/job_logo.blade.php'))): ?>
                        <?php echo $__env->make('extend.back-end.admin.settings.inner-pages.job_logo', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php else: ?>
                        <div class="wt-location wt-tabsinfo">
                            <?php echo $__env->make('back-end.admin.settings.inner-pages.job_logo', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="wt-location wt-tabsinfo">
            <div class="wt-tabscontenttitle">
                <h2><?php echo e(trans('lang.service_listing')); ?></h2>
            </div>
            <div class="wt-settingscontent">
                <div class="wt-description"><p><?php echo e(trans('lang.seo_meta_title')); ?></p></div>
                <div class="wt-formtheme wt-userform">
                    <div class="form-group">
                        <?php echo Form::text('inner_page[0][service_list_meta_title]', $service_meta_title, array('class' => 'form-control')); ?>

                    </div>
                </div>
            </div>
            <div class="wt-settingscontent">
                <div class="wt-description"><p><?php echo e(trans('lang.seo_meta_desc')); ?></p></div>
                <div class="wt-formtheme wt-userform">
                    <div class="form-group">
                        <?php echo Form::textarea('inner_page[0][service_list_meta_desc]', $service_meta_desc, array('class' => 'form-control')); ?>

                    </div>
                </div>
            </div>
            <div class="wt-settingscontent la-settingsradio">
                <div class="wt-description"><p><?php echo e(trans('lang.add_menu_to_navbar')); ?></p></div>
                <switch_button v-model="add_service_navbar"><?php echo e(trans('lang.add_remove_from_navbar')); ?></switch_button>
                <input type="hidden" :value="add_service_navbar" name="inner_page[0][add_service_navbar]">
            </div>
            <div class="wt-location wt-tabsinfo">
                <div class="wt-tabscontenttitle">
                    <h2><?php echo e(trans('lang.header_style')); ?></h2>
                </div>
                <div class="wt-settingscontent">
                    <div class="amt-section-select amt-profile-settings">
                        <ul class="at-profile-setting__imgs">
                            <li v-for="(style, index) in getInnerHeaderStyles()" :key="index">
                                <input 
                                    type="radio" 
                                    name="inner_page[0][service_header_style]"  
                                    :id="'simage1'+index"  
                                    :value="style.value" 
                                    :checked="style.value == '<?php echo e($service_selected_header); ?>'"
                                    v-model="serviceSelectedHeader"
                                >
                                <label :for="'simage1'+index">
                                    <span>
                                        <img :src='style.img' alt="Image Description">
                                        <span class="at-tick"><span><i class="fas fa-check"></i></span></span>
                                    </span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="wt-settingscontent la-settingsradio" v-if="serviceSelectedHeader != 'style4'">
                <div class="wt-description"><p><?php echo e(trans('lang.show_service_banner')); ?></p></div>
                <switch_button v-model="show_service_banner"><?php echo e(trans('lang.show_hide_banner')); ?></switch_button>
                <input type="hidden" :value="show_service_banner" name="inner_page[0][show_service_banner]">
            </div>
            <?php if(file_exists(resource_path('views/extend/back-end/admin/settings/inner-pages/service_inner_banner.blade.php'))): ?>
                <?php echo $__env->make('extend.back-end.admin.settings.inner-pages.service_inner_banner', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php else: ?>
                <div class="wt-location wt-tabsinfo" v-if="serviceSelectedHeader != 'style4'">
                    <?php echo $__env->make('back-end.admin.settings.inner-pages.service_inner_banner', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>  
            <?php endif; ?>
            <div class="wt-location wt-tabsinfo">
                <div class="wt-tabscontenttitle">
                    <h2><?php echo e(trans('lang.header_styling')); ?></h2>
                </div>
                <div class="wt-settingscontent">
                    <div class="wt-settingscontent la-settingsradio">
                        <div class="wt-description"><p><?php echo e(trans('lang.header_styling_note')); ?></p></div>
                        <switch_button v-model="service_header_styling"><?php echo e(trans('lang.enable_disable')); ?></switch_button>
                        <input type="hidden" :value="service_header_styling" name="inner_page[0][service_header_styling]">
                    </div>
                </div>
                <div class="wt-settingscontent" v-if="service_header_styling && colorSettings">
                    <div class="amt-element-title amt-element-titlecontent">
                        <h6><?php echo e(trans('lang.menu_color')); ?></h6>
                        <verte menuPosition="right" model="hex" v-model="serviceHeaderStyling.textColor"></verte>
                        <input type="hidden" :value="serviceHeaderStyling.textColor" name="inner_page[0][service_menu_color]">
                    </div>
                    <div class="amt-element-title amt-element-titlecontent">
                        <h6><?php echo e(trans('lang.hover_color')); ?></h6>
                        <verte menuPosition="right" model="hex" v-model="serviceHeaderStyling.menuColor"></verte>
                        <input type="hidden" :value="serviceHeaderStyling.menuColor" name="inner_page[0][service_hover_color]">
                    </div>
                    <div class="amt-element-title amt-element-titlecontent">
                        <h6><?php echo e(trans('lang.color')); ?></h6>
                        <verte menuPosition="right" model="hex" v-model="serviceHeaderStyling.HoverColor"></verte>
                        <input type="hidden" :value="serviceHeaderStyling.HoverColor" name="inner_page[0][service_menu_text_color]">
                    </div>
                    <?php if(file_exists(resource_path('views/extend/back-end/admin/settings/inner-pages/service_logo.blade.php'))): ?>
                        <?php echo $__env->make('extend.back-end.admin.settings.inner-pages.service_logo', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php else: ?>
                        <div class="wt-location wt-tabsinfo">
                            <?php echo $__env->make('back-end.admin.settings.inner-pages.service_logo', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="wt-location wt-tabsinfo">
            <div class="wt-tabscontenttitle">
                <h2><?php echo e(trans('lang.article_listing')); ?></h2>
            </div>
            <div class="wt-settingscontent">
                <div class="wt-description"><p><?php echo e(trans('lang.seo_meta_title')); ?></p></div>
                <div class="wt-formtheme wt-userform">
                    <div class="form-group">
                        <?php echo Form::text('inner_page[0][article_list_meta_title]', $article_meta_title, array('class' => 'form-control')); ?>

                    </div>
                </div>
            </div>
            <div class="wt-settingscontent">
                <div class="wt-description"><p><?php echo e(trans('lang.seo_meta_desc')); ?></p></div>
                <div class="wt-formtheme wt-userform">
                    <div class="form-group">
                        <?php echo Form::textarea('inner_page[0][article_list_meta_desc]', $article_meta_desc, array('class' => 'form-control')); ?>

                    </div>
                </div>
            </div>
            <div class="wt-settingscontent la-settingsradio">
                <div class="wt-description"><p><?php echo e(trans('lang.add_menu_to_navbar')); ?></p></div>
                <switch_button v-model="add_article_navbar"><?php echo e(trans('lang.add_remove_from_navbar')); ?></switch_button>
                <input type="hidden" :value="add_article_navbar" name="inner_page[0][add_article_navbar]">
            </div>
            <div class="wt-location wt-tabsinfo">
                <div class="wt-tabscontenttitle">
                    <h2><?php echo e(trans('lang.header_style')); ?></h2>
                </div>
                <div class="wt-settingscontent">
                    <div class="amt-section-select amt-profile-settings">
                        <ul class="at-profile-setting__imgs">
                            <li v-for="(style, index) in getInnerHeaderStyles()" :key="index">
                                <input 
                                    type="radio" 
                                    name="inner_page[0][article_header_style]"  
                                    :id="'himage1'+index"  
                                    :value="style.value" 
                                    :checked="style.value == '<?php echo e($article_selected_header); ?>'"
                                    v-model="articleSelectedHeader"
                                >
                                <label :for="'himage1'+index">
                                    <span>
                                        <img :src='style.img' alt="Image Description">
                                        <span class="at-tick"><span><i class="fas fa-check"></i></span></span>
                                    </span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="wt-settingscontent la-settingsradio" v-if="articleSelectedHeader !='style4'">
                <div class="wt-description"><p><?php echo e(trans('lang.show_article_banner')); ?></p></div>
                <switch_button v-model="show_article_banner"><?php echo e(trans('lang.show_hide_banner')); ?></switch_button>
                <input type="hidden" :value="show_article_banner" name="inner_page[0][show_article_banner]">
            </div>
            <?php if(file_exists(resource_path('views/extend/back-end/admin/settings/inner-pages/article_inner_banner.blade.php'))): ?>
                <?php echo $__env->make('extend.back-end.admin.settings.inner-pages.article_inner_banner', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php else: ?>
                <div class="wt-location wt-tabsinfo" v-if="articleSelectedHeader !='style4'">
                    <?php echo $__env->make('back-end.admin.settings.inner-pages.article_inner_banner', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            <?php endif; ?>
            <div class="wt-location wt-tabsinfo">
                <div class="wt-tabscontenttitle">
                    <h2><?php echo e(trans('lang.header_styling')); ?></h2>
                </div>
                <div class="wt-settingscontent">
                    <div class="wt-settingscontent la-settingsradio">
                        <div class="wt-description"><p><?php echo e(trans('lang.header_styling_note')); ?></p></div>
                        <switch_button v-model="article_header_styling"><?php echo e(trans('lang.enable_disable')); ?></switch_button>
                        <input type="hidden" :value="article_header_styling" name="inner_page[0][article_header_styling]">
                    </div>
                </div>
                <div class="wt-settingscontent" v-if="article_header_styling && colorSettings">
                    <div class="amt-element-title amt-element-titlecontent">
                        <h6><?php echo e(trans('lang.menu_color')); ?></h6>
                        <verte menuPosition="right" model="hex" v-model="articleHeaderStyling.textColor"></verte>
                        <input type="hidden" :value="articleHeaderStyling.textColor" name="inner_page[0][article_menu_color]">
                    </div>
                    <div class="amt-element-title amt-element-titlecontent">
                        <h6><?php echo e(trans('lang.hover_color')); ?></h6>
                        <verte menuPosition="right" model="hex" v-model="articleHeaderStyling.menuColor"></verte>
                        <input type="hidden" :value="articleHeaderStyling.menuColor" name="inner_page[0][article_hover_color]">
                    </div>
                    <div class="amt-element-title amt-element-titlecontent">
                        <h6><?php echo e(trans('lang.color')); ?></h6>
                        <verte menuPosition="right" model="hex" v-model="articleHeaderStyling.HoverColor"></verte>
                        <input type="hidden" :value="articleHeaderStyling.HoverColor" name="inner_page[0][article_menu_text_color]">
                    </div>
                    <?php if(file_exists(resource_path('views/extend/back-end/admin/settings/inner-pages/article_logo.blade.php'))): ?>
                        <?php echo $__env->make('extend.back-end.admin.settings.inner-pages.article_logo', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php else: ?>
                        <div class="wt-location wt-tabsinfo">
                            <?php echo $__env->make('back-end.admin.settings.inner-pages.article_logo', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                    <?php endif; ?>
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