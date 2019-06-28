# Latest Update
Yii2 Latest Update widget
```
composer require ziya/latest-update
```
```
<?php
    echo UpdateWidget::widget([
        'title' => "<h3>New Updates</h3>",
        'message' => "<div>You have new updates</div>",
        'url' => Url::to(['order/index']),
        'update_url' => Url::to(['order/updates'])
    ]);
?>
```
