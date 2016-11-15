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
				<?php $form=$this->beginWidget('application.components.system.OActiveForm', array(
					'id'=>'contact_form',
					'enableAjaxValidation'=>true,
					'htmlOptions' => array(
						'class' => 'clearfix form normal antialiased',
						'enctype' => 'multipart/form-data',
					),
				));
				 if(!Yii::app()->user->isGuest && $user != null) {
					$model->user_id = $user->user_id;
					$model->email = $user->email;
					$model->displayname = $user->displayname;
				} else
					$model->user_id = 0;
				echo $form->hiddenField($model,'user_id'); 
				
				if(!isset($_GET['email'])) {?>
                    <!-- 50% inputs -->
                    <div class="fullwidth clearfix">
                        <!-- Left Item -->
                        <div class="f-left">
							<!-- Name -->
							<?php echo $form->textField($model,'displayname',array('maxlength'=>32, 'id'=>'name',  'class'=>'', 'placeholder'=>$office->getAttributeLabel('displayname'))); ?>
							<?php echo $form->error($model,'displayname'); ?>
                        </div>
                        <!-- Right Item -->
                        <div class="f-right">
							<!-- Email -->
							<?php echo $form->textField($model,'email',array('maxlength'=>32, 'id'=>'email',  'class'=>'', 'placeholder'=>$office->getAttributeLabel('email'))); ?>
							<?php echo $form->error($model,'email'); ?>
                        </div>
                    </div>
                    <!-- End 50% inputs -->
					<!-- Subject -->
					<?php echo $form->dropDownList($model,'subject',array('Kritik','Saran','Pertanyaan','Budaya Versi Kamu','Lainnya'), array('maxlength'=>64, 'id'=>'subject',  'class'=>'', 'placeholder'=>$office->getAttributeLabel('subject'))); ?>
					<?php echo $form->error($model,'subject'); ?>
					<!-- Message -->
					<?php echo $form->textArea($model,'message',array('rows'=>10, 'cols'=>40, 'id'=>'message',  'class'=>'', 'placeholder'=>$office->getAttributeLabel('message'))); ?>
					<?php echo $form->error($model,'message'); ?>
                    <!-- Verify Math / You can delete blockers for Math Verify -->
                    <!-- <input type="text" name="verify" id="verify" required placeholder=""> -->
					<!-- Send Button -->
					<?php echo CHtml::submitButton(Yii::t('phrase', 'Send Message'), array('id'=>'submit')); ?>
					<!-- End Send Button -->
					
					<?php 
				} else {?>
                    <!-- Submit Message -->
                    <div class="submit_message">
                        <p class="t-left no-margin">
                            <!-- Error Message Icon -->
                            <i class="fa fa-check"></i>
							<?php echo $this->pageTitle;?>
							<br/>
							<span><?php echo $this->pageDescription;?></span>
                        </p>
                    </div>
					
				<?php }
				$this->endWidget();?>
                <!-- End Form -->
            </div>
            <!-- End Form Div -->
        </div>
        <!-- End Contact Form -->
    </div>
    <!-- End Inner -->
</section>
<!-- End Contact Section -->