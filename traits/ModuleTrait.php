<?php

namespace markavespirtu\user\traits;

use markavespirtu\user\Module;

/**
 * Trait ModuleTrait
 *
 * @property-read Module $module
 * @package markavespirtu\user\traits
 */
trait ModuleTrait
{
    /**
     * @return Module
     */
    public function getModule()
    {
        return \Yii::$app->getModule('user');
    }

    /**
     * @return string
     */
    public static function getDb()
    {
        return \Yii::$app->getModule('user')->getDb();
    }
}
