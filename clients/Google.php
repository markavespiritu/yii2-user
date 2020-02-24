<?php

/*
 * This file is part of the markavespiritu project
 *
 * (c) markavespiritu project <http://github.com/markavespiritu>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace markavespiritu\user\clients;

use yii\authclient\clients\Google as BaseGoogle;

/**
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 */
class Google extends BaseGoogle implements ClientInterface
{
    /**
     * @var string Hosted domain (hd) parameter sent to Google
     */
    public $hostedDomain;

    /**
     * {@inheritdoc}
     */
    public function buildAuthUrl(array $params = [])
    {
        if ($this->hostedDomain) {
            $params['hd'] = $this->hostedDomain;
        }

        return parent::buildAuthUrl($params);
    }
    
    /** @inheritdoc */
    public function getEmail()
    {
        return isset($this->getUserAttributes()['emails'][0]['value'])
            ? $this->getUserAttributes()['emails'][0]['value']
            : null;
    }

    /** @inheritdoc */
    public function getUsername()
    {
        return;
    }
}
