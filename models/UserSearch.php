<?php

/*
 * This file is part of the markavespiritu project.
 *
 * (c) markavespiritu project <http://github.com/markavespiritu/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace markavespiritu\user\models;

use markavespiritu\user\Finder;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * UserSearch represents the model behind the search form about User.
 */
class UserSearch extends Model
{
    /** @var integer */
    public $id;

    /** @var string */
    public $username;

    /** @var string */
    public $email;

    /** @var int */
    public $created_at;

    /** @var int */
    public $last_login_at;

    /** @var string */
    public $registration_ip;

    /** @var Finder */
    protected $finder;

    public $fullName;

    public $employeeId;

    public $position;

    /**
     * @param Finder $finder
     * @param array  $config
     */
    public function __construct(Finder $finder, $config = [])
    {
        $this->finder = $finder;
        parent::__construct($config);
    }

    /** @inheritdoc */
    public function rules()
    {
        return [
            'fieldsSafe' => [['id', 'username', 'email', 'registration_ip', 'created_at', 'last_login_at'], 'safe'],
            'createdDefault' => ['created_at', 'default', 'value' => null],
            'lastloginDefault' => ['last_login_at', 'default', 'value' => null],
        ];
    }

    /** @inheritdoc */
    public function attributeLabels()
    {
        return [
            'id'              => Yii::t('user', '#'),
            'username'        => Yii::t('user', 'Username'),
            'email'           => Yii::t('user', 'Email'),
            'created_at'      => Yii::t('user', 'Registration time'),
            'last_login_at'   => Yii::t('user', 'Last login'),
            'registration_ip' => Yii::t('user', 'Registration ip'),
            'fullName'      => Yii::t('user', 'Full Name'),
            'employeeId'      => Yii::t('user', 'Employee ID'),
            'position'      => Yii::t('user', 'Position'),
        ];
    }

    /**
     * @param $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = $this->finder->getUserQuery();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['created_at' => SORT_DESC]],
        ]);

        $query->joinWith('userinfo');
        if(isset($additionalParams['and'])){
            foreach($additionalParams['and'] as $additionalParams):
                $query->andWhere($additionalParams);
            endforeach;
        }
        if(isset($additionalParams['or'])){
            foreach($additionalParams['or'] as $additionalParams):
                $query->orWhere($additionalParams);
            endforeach;
        }

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $modelClass = $query->modelClass;
        $table_name = $modelClass::tableName();

        if ($this->created_at !== null) {
            $date = strtotime($this->created_at);
            $query->andFilterWhere(['between', $table_name . '.created_at', $date, $date + 3600 * 24]);
        }

        $query->andFilterWhere(['like', $table_name . '.username', $this->username])
              ->andFilterWhere(['like', $table_name . '.email', $this->email])
              ->andFilterWhere([$table_name . '.id' => $this->id])
              ->andFilterWhere([$table_name . '.registration_ip' => $this->registration_ip])
              ->andFilterWhere(['like', 'userinfo.emp_no', $this->employeeId])
              ->andFilterWhere(['like', 'userinfo.position', $this->position])
              ->andFilterWhere(['like', 'concat(userinfo.firstname," ",userinfo.middlename," ",userinfo.lastname," ",userinfo.extname)', $this->fullName]);

        return $dataProvider;
    }
}
