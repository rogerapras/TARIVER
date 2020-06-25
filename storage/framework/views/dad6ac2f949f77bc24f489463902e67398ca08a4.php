<div class="wt-settingscontent">
    <?php if(!empty($article_logo)): ?>
        <?php
            $image = '/uploads/settings/general/'.$article_logo;
            $file_name = Helper::formateFileName($article_logo);
        ?>
        <div class="wt-formtheme wt-userform">
            <div v-if="this.article_logo">
                <upload-image
                    :id="'article_logo'"
                    :img_ref="'article_banner_ref'"
                    :url="'<?php echo e(url('admin/upload-temp-image/article_logo')); ?>'"
                    :name="'article_logo'"
                    :drop_text="'<?php echo e(trans('lang.drop_logo')); ?>'"
                    :btn_text="'<?php echo e(trans('lang.select_logo')); ?>'">
                </upload-image>
            </div>
            <div class="wt-uploadingbox" v-else>
                <figure><img src="<?php echo e(asset($image)); ?>" alt="<?php echo e(trans('lang.banner_photo')); ?>"></figure>
                <div class="wt-uploadingbar">
                    <div class="dz-filename"><?php echo e($file_name); ?></div>
                    <em><?php echo e(trans('lang.file_size')); ?><a href="javascript:void(0);" class="lnr lnr-cross" v-on:click.prevent="removeImage('hidden_article_logo')"></a></em>
                </div>
            </div>
            <input type="hidden" name="inner_page[0][article_logo]" id="hidden_article_logo" value="<?php echo e($article_logo); ?>">
        </div>
    <?php else: ?>
        <div class="wt-formtheme wt-userform">
            <upload-image
                :id="'article_logo'"
                :img_ref="'article_banner_ref'"
                :url="'<?php echo e(url('admin/upload-temp-image/article_logo')); ?>'"
                :name="'article_logo'"
                :drop_text="'<?php echo e(trans('lang.drop_logo')); ?>'"
                :btn_text="'<?php echo e(trans('lang.select_logo')); ?>'">
            </upload-image>
            <input type="hidden" name="inner_page[0][article_logo]" id="hidden_article_logo">
        </div>
    <?php endif; ?>
</div>
