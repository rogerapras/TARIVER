<div class="wt-location wt-tabsinfo">
    <div class="wt-tabscontenttitle">
        <h2><?php echo e(trans('lang.payment_mode')); ?></h2>
    </div>
    <div class="wt-settingscontent">
        <div class="wt-settingscontent la-settingsradio">
            <div class="wt-description"><p><?php echo e(trans('lang.payment_mode_note')); ?></p></div>
            <switch_button v-model="payment_mode"><?php echo e('Online Payment/Offline Payment'); ?></switch_button>
            <input type="hidden" :value="payment_mode" name="payment[0][payment_mode]">
        </div>
    </div>
</div>

