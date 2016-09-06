<?php
$module = strtolower(Yii::app()->controller->module->id);
$current = strtolower(Yii::app()->controller->id);
$action = strtolower(Yii::app()->controller->action->id);
$currentAction = strtolower(Yii::app()->controller->id.'/'.Yii::app()->controller->action->id);
?>
<?php if($action == 'index') { ?>
    <div class="foot-about">
        <h4 class="center">TENTANG CENTRE OF EXELLENCE</h4>
        <div class="container">
            <div class="col-md-6 col-sm-6 col-xs-12">Ut enim ad minim veniam, quis nostrud exercitation Duis</div>
            <div class="col-md-6 col-sm-6 col-xs-12">Ut enim ad minim veniam, quis nostrud exercitation Duis</div>
        </div>
    </div>
<?php } ?>
<?php $this->widget('_HookLocation'); ?>
<div class="footer <?php echo $current; ?>">
    <div class="container clearfix">
        <div class="col-md-10 col-sm-10 col-xs-6">
            <ul>
                <li><a href="">HOME</a> - <a href="">BERITA I</a> - <a href="">BERITA II</a> - <a href="">BERITA III</a></li>
            </ul>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-6 social center">
            <a class="fb mt-10 mb-10 mr-5 ml-5" href=""></a>
            <a class="twitter mt-10 mb-10 mr-5 ml-5" href=""></a>
        </div>
        <div class="clear"></div>
        <div class="col-md-12 col-sm-12 foot-bottom">
            <span class="left">Ut enim ad minim veniam</span>
            <span class="right">&copy;2016</span>
        </div>
    </div>
</div>
