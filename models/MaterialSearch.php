<?php

namespace app\models;

use yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
* Эта модель представляет материал состветствующий критериям поиска
*/
class MaterialSearch extends Material
{   
    public function rules()
    {
          return [
           [['name', 'articul', 'vendor_articul'], 'safe'] 
          ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    { 
      $provider = new ActiveDataProvider([
        'query' => Material::getActualMaterials($params['aDate']),
        'pagination' => [
        'pageSize' => 50
        ],
        'sort' => [
          'attributes' => [
            'name' => [
              'asc'  => ['name' => SORT_ASC],
              'default' => SORT_ASC
            ],
            'articul',
            'vendor_articul',
            'price'
          ]
        ]
      ]);

      if(!($this->load($params) && $this->validate())) {
        return $provider;
      }

      $provider->query->andFilterWhere(['like', 'name', $this->name])
                      ->andFilterWhere(['like', 'articul', $this->articul])
                      ->andFilterWhere(['like', 'vendor_articul', $this->vendor_articul]);

      return $provider;
    }
    
}