<?php

namespace rusbeldoor\yii2General\frontend\assets;

/**
 * Class AssetBundle
 * @package rusbeldoor\yii2General\frontend\assets
 */
class AssetBundle extends \yii\web\AssetBundle
{
    public $sourcePath = '@vendor/rusbeldoor/yii2-general/frontend/web';
    public $css = ['css/rusbeldoor-yii2-general-backend.css'];
    public $js = ['js/rusbeldoor-yii2-general-backend.js'];
}
