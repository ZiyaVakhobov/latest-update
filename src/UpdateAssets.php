<?php

namespace ziya\LatestUpdate;

use yii\web\YiiAsset;

class UpdateAssets extends YiiAsset
{
    public $sourcePath = '@vendor/ziya/latest-update/src/assets';
    public $js = [
        'notify.js'
    ];
}