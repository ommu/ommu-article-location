<?php
class _HookSlider extends CWidget
{
    public function init() {

    }

    public function run() {
        $this->renderContent();
    }

    protected function renderContent() {
        $this->render('_hook_slider');
    }
}
?>
