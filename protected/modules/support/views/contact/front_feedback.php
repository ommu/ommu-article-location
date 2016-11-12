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
?>

<!-- Contact -->
<section id="contact" class="relative contact">
    <!-- Inner -->
    <div class="inner t-center clearfix animated" data-animation="fadeIn" data-animation-delay="800">
        <!-- Header -->
        <h1 class="header header-style-2 dark oswald strip uppercase t-center">
            Keep in touch with us
        </h1>
        <!-- Header Text -->
        <p class="light t-center">
            Drop Us a Message
        </p>
        <!-- Form -->
        <div class="fullwidth clearfix">
            <!-- Contact Form -->
            <div class="contact_form type-2 white-form">
                <!-- Form -->
                <form id="contact_form" name="cform" class="clearfix form normal antialiased" method="post" action="php/mail.php">
                    <!-- 50% inputs -->
                    <div class="fullwidth clearfix">
                        <!-- Left Item -->
                        <div class="f-left">
                            <!-- Name -->
                            <input type="text" name="name" id="name" required placeholder="Name">
                        </div>
                        <!-- Right Item -->
                        <div class="f-right">
                            <!-- Email -->
                            <input type="email" name="email" id="email" required placeholder="E-Mail">
                        </div>
                    </div>
                    <!-- End 50% inputs -->
                    <!-- Subject -->
                    <input type="text" name="subject" id="subject" required placeholder="Subject">
                    <!-- Message -->
                    <textarea name="message" id="message" required placeholder="Message"></textarea>
                    <!-- Verify Math / You can delete blockers for Math Verify -->
                    <!-- <input type="text" name="verify" id="verify" required placeholder=""> -->
                    <!-- Send Button -->
                    <button type="submit" id="submit" name="submit">Send</button>
                    <!-- Error Message -->
                    <div class="error_message">
                        <p class="t-left no-margin">
                            <!-- Error Message Icon -->
                            <i class="fa fa-warning"></i>
                            Validation error occured. Please enter the fields and submit it again.
                        </p>
                    </div>
                    <!-- Submit Message -->
                    <div class="submit_message">
                        <p class="t-left no-margin">
                            <!-- Error Message Icon -->
                            <i class="fa fa-check"></i>
                            Thank You ! Your email has been delivered.
                        </p>
                    </div>
                </form>
                <!-- End Form -->
            </div>
            <!-- End Form Div -->
        </div>
        <!-- End Contact Form -->
    </div>
    <!-- End Inner -->
</section>
<!-- End Contact Section -->








<!-- Features With Mobile Section -->
<section id="contact" class="relative contact white-layout">
	<div class="grayscale-bg absolute background42 light-bg parallax9"></div>
	<!-- Inner -->
	<div class="inner t-center clearfix no-black-white animated" data-animation="fadeIn" data-animation-delay="800">
		<!-- Header -->
		<h1 class="header header-style-1 strip dark t-center ">
			Keep In Touch <span class="colored"> With Us</span>
		</h1>
		<!-- Header Text -->
		<p class="light t-center">
			Drop us an Email
		</p>
		<!-- Address and Form -->
		<div class="fullwidth clearfix">
			<!-- Address -->
			<div class="address f-left t-left">
				<!-- Address Header -->
				<div class="address_head">
					<!-- Header -->
					<h3>
						<?php echo $office->office_name != '' ? $office->office_name : OmmuSettings::getInfo('site_title');?>
					</h3>
				</div>
				<!-- End Address Header -->
				<!-- Address Box -->
				<a href="#map" class="box light hover scroll">
					<!-- Icon -->
					<div class="icon">
						<!-- Icon SRC -->
						<i class="fa fa-map-marker colored"></i>
					</div>
					<!-- Details -->
					<div class="details">
						<?php
							$office_place = $office->office_place != '' && $office->office_place != '-' ? $office->office_place : '';
							$office_village = $office->office_village != '' && $office->office_village != '-' ? ', '.$office->office_village : '';
							$office_district = $office->office_district != '' && $office->office_district != '-' ? ', '.$office->office_district : '';
							$city = $office->view_meta->city != '' && $office->view_meta->city != '-' ? ', '.$office->view_meta->city : '';
							$province = $office->view_meta->province != '' && $office->view_meta->province != '-' ? ', '.$office->view_meta->province : '';
							$country = $office->view_meta->country != '' && $office->view_meta->country != '-' ? ', '.$office->view_meta->country : '';
							$office_zipcode = $office->office_zipcode != '' && $office->office_zipcode != '-' ? ', '.$office->office_zipcode : '';
						?>
						<h4>
							Address;
						</h4>
						<p><?php echo $office_place.$office_village.$office_district.$city.$province.$country.$office_zipcode?></p>
					</div>
					<!-- Right Secret Button -->
					<div class="button">
						<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/plus.png" alt="Crexis Plus">
					</div>
				</a>
				<!-- End Box -->
				<!-- Address Box -->
				<?php if($office->office_phone != '') {?>
				<a href="tel:<?php echo $office->office_phone;?>" class="box light hover">
					<!-- Icon -->
					<div class="icon">
						<!-- Icon SRC -->
						<i class="fa fa-phone colored"></i>
					</div>
					<!-- Details -->
					<div class="details">
						<h4>
							Phone
						</h4>
						<p>
							<?php echo $office->office_phone;?>
						</p>
					</div>
					<!-- Right Secret Button -->
					<div class="button">
						<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/plus.png" alt="Crexis Plus">
					</div>
				</a>
				<!-- End Box -->
				<?php }
				if($office->office_email != '') {?>
				<!-- Address Box -->
				<a href="mailto:<?php echo $office->office_email;?>" class="box light hover">
					<!-- Icon -->
					<div class="icon">
						<!-- Icon SRC -->
						<i class="fa fa-envelope colored"></i>
					</div>
					<!-- Details -->
					<div class="details">
						<h4>
							E-Mail;
						</h4>
						<p>
							<?php echo $office->office_email;?>
						</p>
					</div>
					<!-- Right Secret Button -->
					<div class="button">
						<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/plus.png" alt="Crexis Plus">
					</div>
				</a>
				<!-- End Box -->
				<?php }?>
				<!-- Address Box -->
				<a class="box light">
					<!-- Details -->
					<div class="address-note">
						<h4>
							Get In Touch
						</h4>
						<p>
							Contrary to popular belief, Lorem Ipsum.
						</p>
					</div>
				</a>
				<!-- End Box -->
				<!-- Address Box -->
				<div class="socials">
					<!-- Social Button -->
					<a href="#" class="facebook">
					<i class="fa fa-facebook"></i>
					</a>
					<!-- Social Button -->
					<a href="#" class="twitter">
					<i class="fa fa-twitter"></i>
					</a>
					<!-- Social Button -->
					<a href="#" class="pinterest">
					<i class="fa fa-pinterest"></i>
					</a>
					<!-- Social Button -->
					<a href="#" class="linkedin">
					<i class="fa fa-linkedin"></i>
					</a>
				</div>
				<!-- End Box -->
			</div>
			<!-- End Address -->
			<!-- Contact Form -->
			<div class="contact_form f-right">
				<!-- Form -->
				<?php $form=$this->beginWidget('application.components.system.OActiveForm', array(
					'id'=>'contact_form',
					'enableAjaxValidation'=>true,
					'htmlOptions' => array(
						'class' => 'clearfix form dark_form',
						'enctype' => 'multipart/form-data',
					),
				));
				if(!isset($_GET['email'])) {?>
					<!-- Name -->
					<?php echo $form->textField($model,'displayname',array('maxlength'=>32, 'id'=>'name',  'class'=>'', 'placeholder'=>$office->getAttributeLabel('displayname'))); ?>
					<?php echo $form->error($model,'displayname'); ?>
					<!-- Email -->
					<?php echo $form->textField($model,'email',array('maxlength'=>32, 'id'=>'email',  'class'=>'', 'placeholder'=>$office->getAttributeLabel('email'))); ?>
					<?php echo $form->error($model,'email'); ?>
					<!-- Subject -->
					<?php echo $form->dropDownList($model,'subject',array('Kritik','Saran','Pertanyaan','Budaya Versi Kamu','Lainnya'), array('maxlength'=>64, 'id'=>'subject',  'class'=>'', 'placeholder'=>$office->getAttributeLabel('subject'))); ?>
					<?php echo $form->error($model,'subject'); ?>
					<!-- Message -->
					<?php echo $form->textArea($model,'message',array('rows'=>10, 'cols'=>40, 'id'=>'message',  'class'=>'', 'placeholder'=>$office->getAttributeLabel('message'))); ?>
						<?php echo $form->error($model,'message'); ?>
					<!-- Send Button -->
					<?php echo CHtml::submitButton(Yii::t('phrase', 'Send Message'), array('class'=>'colored-bg', 'id'=>'submit')); ?>
					<!-- End Send Button -->
					
					<?php 
				} else {?>
					<!-- Submit Message -->
					<div class="submit_message">
						<!-- Error Message Icon -->
						<i class="fa fa-check"></i>
						<?php echo $this->pageTitle;?>
						<br/>
						<span><?php echo $this->pageDescription;?></span>
					</div>
					
				<?php }
				$this->endWidget();?>
				<!-- End Form -->
			</div>
			<!-- End Contact Form -->
		</div>
		<!-- End Contact, Address Area -->
	</div>
	<!-- End Inner -->
</section>
<!-- End Contact Section -->