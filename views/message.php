<?php

/*
 * This file is part of the markavespirtu project.
 *
 * (c) markavespirtu project <http://github.com/markavespirtu>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

/**
 * @var yii\web\View $this
 * @var markavespirtu\user\Module $module
 */

$this->title = $title;
?>

<?= $this->render('/_alert', ['module' => $module]);
