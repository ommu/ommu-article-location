<?php
$module = strtolower(Yii::app()->controller->module->id);
$current = strtolower(Yii::app()->controller->id);
$action = strtolower(Yii::app()->controller->action->id);
$currentAction = strtolower(Yii::app()->controller->id.'/'.Yii::app()->controller->action->id);
?>
<?php if($currentAction == 'site/index') { ?>
    <div class="foot-about">
        <h4 class="center">TENTANG CENTRE OF EXELLENCE</h4>
        <div class="container">
            <div class="col-md-6 col-sm-6 col-xs-12">Ut enim ad minim veniam, quis nostrud exercitation Duis</div>
            <div class="col-md-6 col-sm-6 col-xs-12">Ut enim ad minim veniam, quis nostrud exercitation Duis</div>
        </div>
    </div>
<?php } ?>
<div class="footer">
    <div class="container clearfix">
        <div class="col-md-3 col-sm-3 col-xs-6">
            <ul>
                <li><a href="">HOME</a></li>
                <li><a href="">BERITA</a></li>
                <li><a href="">RAGAM BUDAYA</a></li>
                <li><a href="">PAHLAWAN BUDAYA</a></li>
            </ul>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6">
            <ul>
                <li><a href="">AGENDA BUDAYA</a></li>
                <li><a href="">TEMPAT BELAJAR</a></li>
                <li><a href="">BUDAYA VERSI KAMU</a></li>
                <li><a href="">ABOUT COE</a></li>
            </ul>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-6">
            <span class="mt-5 mb-10 block">Kantor Pusat:</span>
            Ut enim ad minim veniam, quis nostrud exercitation Duis aute irure dolor in<br/><br/>
            <span><b>0271-1234567</b></span>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-6 social center">
            <a class="fb mt-25 mb-25 mr-5 ml-5" href=""></a>
            <a class="twitter mt-25 mb-25 mr-5 ml-5" href=""></a>
        </div>
        <div class="clear"></div>
        <div class="col-md-12 col-sm-12 foot-bottom">
            <span class="left">Ut enim ad minim veniam</span>
            <span class="right">&copy;2016</span>
        </div>
    </div>
</div>
