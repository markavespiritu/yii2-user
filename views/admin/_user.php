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
 * @var yii\widgets\ActiveForm $form
 * @var markavespiritu\user\models\User $user
 */
?>

<h4>User Details</h4>
	<div class="row">
		<div class="col-md-12">
			<?= $form->field($userinfo, 'emp_no')->textInput(['maxlength'=> true]); ?>

			<?= $form->field($userinfo, 'position')->textInput(['maxlength'=> true]); ?>

			<?= $form->field($userinfo, 'firstname')->textInput(['maxlength'=> true]); ?>

			<?= $form->field($userinfo, 'middlename')->textInput(['maxlength'=> true]); ?>

			<?= $form->field($userinfo, 'lastname')->textInput(['maxlength'=> true]); ?>

			<?= $form->field($userinfo, 'extname')->textInput(['maxlength'=> true]); ?>

		</div>
	</div>
<hr>
    <h4>Account Details</h4>

    <div class="row">
    	<div class="col-md-12">
			<?= $form->field($user, 'email')->textInput(['maxlength' => 255]) ?>

			<?= $form->field($user, 'username')->textInput(['maxlength' => 255]) ?>

			<?= $form->field($user, 'password')->passwordInput() ?>
		</div>
	</div>
