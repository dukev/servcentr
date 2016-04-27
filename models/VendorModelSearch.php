<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class VendorModelSearch extends VendorModel
{

  public function rules()
	{
		return [
			[['type', 'vendor', 'name'], 'safe']
		];
	}
  
  public function scenarios()
  {
    return Model::scenarios();
  }
  
  public function search($params)
  {
  	$provider = new ActiveDataProvider ([
  			'query' => VendorModel::getAllModels(),
  			'pagination' => [
  				'pageSize' => 50,
  			],
  			'sort' => [ 
  				'attributes' => [
  					'type' => [
              'asc' => ['type' => SORT_ASC],
              'default' => SORT_ASC],
            'vendor',
  					'name'
  					]
  			 ]
  		]);

    if(!($this->load($params) && $this->validate())) {        
      return $provider;
    }

    $provider->query->andFilterWhere(['like', 'e.name', $this->type])
     									->andFilterWhere(['like', 'm.name', $this->name])
                      ->andFilterWhere(['like', 'v.name', $this->vendor]);
    return $provider;

  }

}
