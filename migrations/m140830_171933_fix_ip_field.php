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
class m140830_171933_fix_ip_field extends Migration
{
    public function up()
    {
        $this->alterColumn('{{%user}}', 'registration_ip', $this->bigInteger());
    }

    public function down()
    {
        $this->alterColumn('{{%user}}', 'registration_ip', $this->integer());
    }
}
