<?php

namespace ziya\LatestUpdate;

class LatestUpdateCache
{
    /**
     * @var string
     */
    private $key;

    /**
     * UpdateCache constructor.
     * @param int $latestId
     * @param string $key
     */
    public function __construct(string $key)
    {
        $this->key = $key;
    }

    public function cache($latestId)
    {
        $latestId = $latestId === false ? 0 : $latestId;
        \Yii::$app->cache->set($this->key, $latestId);
    }

    public function latest()
    {
        return \Yii::$app->cache->get($this->key);
    }
}