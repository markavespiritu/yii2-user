<?php

/*
 * This file is part of the markavespiritu project.
 *
 * (c) markavespiritu project <http://github.com/markavespiritu/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace markavespiritu\user\events;

use markavespiritu\user\models\User;
use markavespiritu\user\models\Account;
use yii\base\Event;

/**
 * @property User    $model
 * @property Account $account
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 */
class ConnectEvent extends Event
{
    /**
     * @var User
     */
    private $_user;

    /**
     * @var Account
     */
    private $_account;

    /**
     * @return Account
     */
    public function getAccount()
    {
        return $this->_account;
    }

    /**
     * @param Account $account
     */
    public function setAccount(Account $account)
    {
        $this->_account = $account;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->_user;
    }

    /**
     * @param User $form
     */
    public function setUser(User $user)
    {
        $this->_user = $user;
    }
}
