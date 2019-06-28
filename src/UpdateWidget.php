<?php

namespace ziya\LatestUpdate;


use yii\base\Widget;
use yii\web\View;

class UpdateWidget extends Widget
{
    public $icon;
    public $title;
    public $message;
    public $url;
    public $target = '_self';
    public $update_url;
    public $updateInterval = 5000;

    public $element = 'body';
    public $position;
    public $type = "info";
    public $allow_dismiss = true;
    public $newest_on_top = false;
    public $showProgressbar = false;
    public $placement = [
        'from' => "top",
        'align' => "right"
    ];
    public $offset = 20;
    public $spacing = 10;
    public $z_index = 1031;
    public $delay = 5000;
    public $timer = 100000;
    public $url_target = '_blank';
    public $mouse_over;
    public $animate = [
        'enter' => 'animated fadeInDown',
        'exit' => 'animated fadeOutUp'
    ];
    public $icon_type = 'class';
    public $template = '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">
        <button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>
        <span data-notify="icon"></span> 
        <span data-notify="title">{1}</span> 
        <span data-notify="message">{2}</span>
        <div class="progress" data-notify="progressbar">
        <div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
        </div>
        <a href="{3}" target="{4}" data-notify="url"></a>
    </div>';

    protected $_content;
    protected $_settings;


    public function init()
    {
        parent::init();
        $view = $this->getView();
        UpdateAssets::register($view);
    }

    public function run()
    {
        $this->prepareOptions();
        $this->getView()->registerJs(" 
            setInterval(function() {
                $.get(\"$this->update_url\", function(count, status){
                if (count > 0) {
                    $.notify({$this->_content},$this->_settings);
                }               
            });
            }, {$this->updateInterval});
               
                   
        ", View::POS_END);
    }

    protected function prepareOptions(): void
    {
        $this->_content = json_encode([
            'icon' => $this->icon,
            'title' => $this->title,
            'message' => $this->message,
            'url' => $this->url,
            'target' => $this->target,
        ]);

        $this->_settings = json_encode([
            'element' => $this->element,
            'position' => $this->position,
            'type' => $this->type,
            'allow_dismiss' => $this->allow_dismiss,
            'newest_on_top' => $this->newest_on_top,
            'showProgressbar' => $this->showProgressbar,
            'placement' => $this->placement,
            'offset' => $this->offset,
            'spacing' => $this->spacing,
            'z_index' => $this->z_index,
            'delay' => $this->delay,
            'timer' => $this->timer,
            'url_target' => $this->url_target,
            'mouse_over' => $this->mouse_over,
            'animate' => $this->animate,
            'icon_type' => $this->icon_type,
            'template' => $this->template,
        ]);

    }
}