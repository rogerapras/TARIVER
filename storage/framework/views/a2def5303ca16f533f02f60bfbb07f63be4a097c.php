<?php $__env->startSection('content'); ?>
	<div class="wt-haslayout wt-dbsectionspace la-manage-jobs-holder">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 float-right" id="services">
				<div class="preloader-section" v-if="loading" v-cloak>
					<div class="preloader-holder">
						<div class="loader"></div>
					</div>
				</div>
				<div class="wt-dashboardbox wt-dashboardservcies">
					<div class="wt-dashboardboxtitle wt-titlewithsearch">
						<h2><?php echo e(trans('lang.services_listing')); ?></h2>
					</div>
					<div class="wt-dashboardboxcontent wt-categoriescontentholder">
						<?php if($services->count() > 0): ?>
							<table class="wt-tablecategories wt-tableservice">
								<thead>
									<tr>
										<th><?php echo e(trans('lang.service_title')); ?></th>
										<th><?php echo e(trans('lang.service_status')); ?></th>
										<th><?php echo e(trans('lang.in_queue')); ?></th>
										<th><?php echo e(trans('lang.action')); ?></th>
									</tr>
								</thead>
								<tbody>
									<?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php 
											$attachment = Helper::getUnserializeData($service['attachments']); 
											$total_orders = Helper::getServiceCount($service['id'], 'hired');
										?>
										<tr class="del-<?php echo e($service['status']); ?>">
											<td data-th="Service Title">
												<span class="bt-content">
													<div class="wt-service-tabel">
														<?php if(!empty($attachment)): ?>
															<figure class="service-feature-image"><img src="<?php echo e(asset( Helper::getImageWithSize('uploads/services/'.Auth::user()->id, $attachment[0], 'small' ))); ?>" alt="<?php echo e($service['title']); ?>"></figure>
														<?php endif; ?>
														<div class="wt-freelancers-content">
															<div class="dc-title">
																<?php if($service['is_featured'] == 'true'): ?>
																	<span class="wt-featuredtagvtwo">Featured</span>
																<?php endif; ?>
																<h3><?php echo e($service['title']); ?></h3>
																<span><strong><?php echo e(!empty($symbol) ? $symbol['symbol'] : '$'); ?><?php echo e($service['price']); ?></strong> <?php echo e(trans('lang.starting_from')); ?></span>
															</div>
														</div>
													</div>
												</span>
											</td>
											<td data-th="Service Status">
												<span class="bt-content">
													<form class="wt-formtheme wt-formsearch" id="change_job_status">
														<fieldset>
															<div class="form-group">
																<span class="wt-select">
																	<?php echo Form::select('status', $status_list, $service['status'], array('id'=>$service["id"].'-service_status', 'data-placeholder' => trans('lang.select_status'))); ?>

																</span>
																<a href="javascrip:void(0);" class="wt-searchgbtn job_status_popup" @click.prevent='changeStatus(<?php echo e($service['id']); ?>)'><i class="fa fa-check"></i></a>
															</div>
														</fieldset>
													</form>
												</span>
											</td>
											<td data-th="In Queue">
												<span class="bt-content">
													<span>
														<?php if($total_orders > 0): ?>
															<i class="fa fa-spinner fa-spin"></i> 
														<?php endif; ?>
														<?php echo e($total_orders); ?> <?php echo e(trans('lang.in_queue')); ?>

													</span>
												</span>
											</td>
											<td data-th="Action">
												<span class="bt-content">
													<div class="wt-actionbtn">
														<a href="<?php echo e(route('serviceDetail',$service['slug'])); ?>" class="wt-viewinfo">
															<i class="lnr lnr-eye"></i>
														</a>
														<a href="<?php echo e(route('edit_service',$service['id'])); ?>" class="wt-addinfo wt-skillsaddinfo">
															<i class="lnr lnr-pencil"></i>
														</a>
														<?php if($total_orders == 0): ?>
															<delete :title="'<?php echo e(trans("lang.ph_delete_confirm_title")); ?>'" :id="'<?php echo e($service['id']); ?>'" :message="'<?php echo e(trans("lang.ph_badge_delete_message")); ?>'" :url="'<?php echo e(url('freelancer/dashboard/delete-service')); ?>'"></delete>
														<?php endif; ?>
													</div>
												</span>
											</td>
										</tr>	
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tbody>
							</table>
						<?php else: ?>
							<?php if(file_exists(resource_path('views/extend/errors/no-record.blade.php'))): ?> 
								<?php echo $__env->make('extend.errors.no-record', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
							<?php else: ?> 
								<?php echo $__env->make('errors.no-record', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
							<?php endif; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>