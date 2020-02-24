<?php

/*
 * This file is part of the markavespirtu project.
 *
 * (c) markavespirtu project <http://github.com/markavespirtu/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace markavespirtu\user\models\query;

use markavespirtu\user\models\Account;
use yii\authclient\ClientInterface;
use yii\db\ActiveQuery;

/**
 * @method Account|null one($db = null)
 * @method Account[]    all($db = null)
 *
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 */
class AccountQuery extends ActiveQuery
{
    /**
     * Finds an account by code.
     * @param  string       $code
     * @return AccountQuery
     */
    public function byCode($code)
    {
        return $this->andWhere(['code' => md5($code)]);
    }

    /**
     * Finds an account by id.
     * @param  integer      $id
     * @return AccountQuery
     */
    public function byId($id)
    {
        return $this->andWhere(['id' => $id]);
    }

    /**
     * Finds an account by user_id.
     * @param  integer      $userId
     * @return AccountQuery
     */
    public function byUser($userId)
    {
        return $this->andWhere(['user_id' => $userId]);
    }

    /**
     * Finds an account by client.
     * @param  ClientInterface $client
     * @return AccountQuery
     */
    public function byClient(ClientInterface $client)
    {
        return $this->andWhere([
            'provider'  => $client->getId(),
            'client_id' => $client->getUserAttributes()['id'],
        ]);
    }
}
