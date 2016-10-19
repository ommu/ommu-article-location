<?php
/**
 * Support Mails (support-mails)
 * @var $this ContactController
 * @var $model SupportMails
 * @var $form CActiveForm
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2012 Ommu Platform (ommu.co)
 * @link https://github.com/oMMu/Ommu-Support
 * @contact (+62)856-299-4114
 *
 */
 
	$this->breadcrumbs=array(
		'Support Mails'=>array('manage'),
		'Create',
	);
	
	$cs = Yii::app()->getClientScript();
	$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/quWxohwWmBHkjCBoLLP19vZDw6qV8pnAIJAS7Ma_pCc.js', CClientScript::POS_END);
	$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/plugin/Sy5Krcgs1i8v0M3MS84pTUkt1s8Cc1Nzk1JT9HIz8wA.js', CClientScript::POS_END);
?>

<div class="vc_row wpb_row vc_row-fluid vc_custom_1457273842053 vc_row-has-fill">
	<div class="bg-overlay bg-overlay-light"></div>
	<div class="inner">
		<div class="wpb_column vc_column_container vc_col-sm-12">
			<div class="vc_column-inner ">
				<div class="wpb_wrapper">
					<div class="vntd-special-heading special-heading-align-center heading-separator" style="margin-bottom:35px;">
						<h1 class="header  font-primary uppercase font-size-30 font-primary font-weight-default" >Keep In Touch <span class="colored">With Us</span></h1>
						<p class="subtitle light " >Drop us a Message!</p>
					</div>
					<div class="vc_row wpb_row vc_inner vc_row-fluid">
						<div class="wpb_column vc_column_container vc_col-sm-5">
							<div class="vc_column-inner ">
								<div class="wpb_wrapper">
									<div class="vntd-contact-block contact-block-vertical">
										<h3><?php echo $office->office_name != '' ? $office->office_name : OmmuSettings::getInfo('site_title');?></h3>
										<?php if($office->office_phone != '') {?>
										<a class="box box light hover" href="tel:123456789">
											<!-- Icon -->
											<div class="icon">
												<i class="fa fa-mobile"></i>
											</div>
											<!-- Texts -->
											<div class="texts">
												<!-- Arrow -->
												<span class="arrow"></span>
												<!-- Header -->
												<h3>Phone</h3>
												<!-- Detail -->
												<p><?php echo $office->office_phone;?></p>
											</div>
											<div class="button"></div>
											<!-- End Texts -->
										</a>
										<?php }
										if($office->office_email != '') {?>
										<a class="box box light hover" href="mailto:hello@mysite.com">
											<!-- Icon -->
											<div class="icon">
												<i class="fa fa-envelope"></i>
											</div>
											<!-- Texts -->
											<div class="texts">
												<!-- Arrow -->
												<span class="arrow"></span>
												<!-- Header -->
												<h3>E-Mail</h3>
												<!-- Detail -->
												<p><?php echo $office->office_email;?></p>
											</div>
											<div class="button"></div>
											<!-- End Texts -->
										</a>
										<?php }?>
										<a class="box box light hover" href="">
											<!-- Icon -->
											<div class="icon">
												<i class="fa fa-map-marker"></i>
											</div>
											<!-- Texts -->
											<div class="texts">
												<!-- Arrow -->
												<span class="arrow"></span>
												<!-- Header -->
												<h3>Address</h3>
												<!-- Detail -->
												<p><?php echo $office->office_place.'.<br/>'.$office->office_village.', '.$office->office_district.',<br/>'.$office->view_meta->city.', '.$office->view_meta->province.', '.$office->view_meta->country.',<br/>'.$office->office_zipcode?></p>
											</div>
											<div class="button"></div>
											<!-- End Texts -->
										</a>
									</div>
									<?php /*
									<div class="wpb_text_column wpb_content_element  vc_custom_1457273785716 ">
										<div class="wpb_wrapper">
											<h3>Our Social Networks</h3>
											<p>Find us in the most popular social websites.</p>
										</div>
									</div>
									<div class="vntd-social-icons vntd-social-icons-square vc_custom_1457273675541"><a href="#" class="social facebook" target="_blank"><i class="fa fa-facebook"></i></a><a href="#" class="social twitter" target="_blank"><i class="fa fa-twitter"></i></a><a href="#" class="social tumblr" target="_blank"><i class="fa fa-tumblr"></i></a><a href="#" class="social instagram" target="_blank"><i class="fa fa-instagram"></i></a></div>
									*/?>
								</div>
							</div>
						</div>
						<div class="wpb_column vc_column_container vc_col-sm-7">
							<div class="vc_column-inner ">
								<div class="wpb_wrapper">
									<div class="vntd-contact-form contact-form- contact font-primary">
										<div role="form" class="wpcf7" id="wpcf7-f496-p487-o1" lang="en-US" dir="ltr">
											<div class="screen-reader-response"></div>
											<?php if(!isset($_GET['email'])) {
												$form=$this->beginWidget('application.components.system.OActiveForm', array(
													'id'=>'support-contacts-form',
													'enableAjaxValidation'=>true,
													'htmlOptions' => array(
														'class' => 'form',
														'enctype' => 'multipart/form-data',
													),
												)); ?>
												<p><span class="wpcf7-form-control-wrap your-name">
													<?php echo $form->textField($model,'displayname',array('maxlength'=>32, 'class'=>'wpcf7-form-control wpcf7-text wpcf7-validates-as-required', 'placeholder'=>$model->getAttributeLabel('displayname'))); ?>
													<?php echo $form->error($model,'displayname'); ?>
												</span></p>
												<p><span class="wpcf7-form-control-wrap your-email">
													<?php echo $form->textField($model,'email',array('maxlength'=>32, 'class'=>'wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email', 'placeholder'=>$model->getAttributeLabel('email'))); ?>
													<?php echo $form->error($model,'email'); ?>
												</span></p>
												<p><span class="wpcf7-form-control-wrap your-subject">
													<?php echo $form->textField($model,'subject',array('maxlength'=>64, 'class'=>'wpcf7-form-control wpcf7-text', 'placeholder'=>$model->getAttributeLabel('subject'))); ?>
													<?php echo $form->error($model,'subject'); ?>
												</span></p>
												<p><span class="wpcf7-form-control-wrap your-message">
													<?php echo $form->textArea($model,'message',array('rows'=>10, 'cols'=>40, 'class'=>'wpcf7-form-control wpcf7-textarea', 'placeholder'=>$model->getAttributeLabel('message'))); ?>
													<?php echo $form->error($model,'message'); ?>
												</span></p>
												<p><?php echo CHtml::submitButton(Yii::t('phrase', 'Send Message'), array('class'=>'wpcf7-form-control wpcf7-submit')); ?></p>
												
												<?php $this->endWidget(); 
											} else {?>
												<div class="message success"><?php echo $this->pageDescription;?></div>
											<?php }?>											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>