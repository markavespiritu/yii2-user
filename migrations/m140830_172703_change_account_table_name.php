<?php

/*
 * This file is part of the markavespirtu project.
 *
 * (c) markavespirtu project <http://github.com/markavespirtu/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use markavespirtu\user\migrations\Migration;

/**
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 */
class m140830_172703_change_account_table_name extends Migration
{
    public function up()
    {
        $this->renameTable('{{%account}}', '{{%social_account}}');
    }

    public function down()
    {
        $this->renameTable('{{%social_account}}', '{{%account}}');
    }
}
