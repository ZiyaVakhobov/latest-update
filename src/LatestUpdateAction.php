<?php

namespace ziya\LatestUpdate;

use backend\widgets\LatestUpdateCache;
use Yii;
use yii\db\ActiveQuery;
use yii\base\Action;
use yii\web\Response;

class LatestUpdateAction extends Action
{
    /**
     * @var ActiveQuery
     */
    public $countQuery;
    /**
     * @var LatestUpdateCache
     */
    public $latestCache;
    /**
     * @var ActiveQuery
     */
    public $latestQuery;

    public function runWithParams($params)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $count = $this->countQuery->count();
        $this->latestCache->cache($this->latestQuery->scalar());
        return $count;
    }
}