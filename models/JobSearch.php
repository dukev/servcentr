<?php

namespace app\models;

use yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class JobSearch extends Job
{
	public function rules()
	{
		return [
			[['code', 'name', 'unit', 'cost'],'safe']
		];
	}

	public function scenarios()
	{
		return Model::scenarios();
	}

  public function search($params)
  {
	  $provider = new ActiveDataProvider ([
	    'query' => Job::getActualJobs($params['aDate']),
	    'pagination' => [
	      'pageSize' => 50,
	    ],
	    'sort' => [
	      'attributes' => [
	      	'code' => [
	      		'asc' => ['code' => SORT_ASC],
	      		'default' => SORT_ASC],
	      	'name',
	      	'unit',
	      	'cost',
	      	'price'
	      ]
	    ]
	  ]);

	  if(!($this->load($params) && $this->validate())) {
        return $provider;
    }

     $provider->query->andFilterWhere(['like', 'code', $this->code])
     								 ->andFilterWhere(['like', 'name', $this->name])
                     ->andFilterWhere(['like', 'unit', $this->unit])
                     ->andFilterWhere(['like', 'cost', $this->cost]);
    return $provider;
  }
}