<?php

/*
 * This file is part of the markavespiritu project.
 *
 * (c) markavespiritu project <http://github.com/markavespiritu>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

/**
 * @var markavespiritu\user\models\User
 */
?>
<?= Yii::t('user', 'Hello') ?>,

<?= Yii::t('user', 'Your account on {0} has a new password', Yii::$app->name) ?>.
<?= Yii::t('user', 'We have generated a password for you') ?>:
<?= $user->password ?>

<?= Yii::t('user', 'If you did not make this request you can ignore this email') ?>.
