<?php

namespace app\models;

use yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class MaterialSearch extends MaterialActual
{
    public $date;
    
    public function rules()
    {
          return [
           [['name', 'articul', 'vendor_articul'], 'string'] ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $dataProvider = MaterialActual::getMaterials($params);
       /*$key = $dataProvider->key;
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'name' => $this->name]);
        $query->andFilterWhere(['like', 'articul', $this->articul])
              ->andFilterWhere(['like', 'vendor_articul', $this->vendor_articul]);
       */
        return $dataProvider;
    }
}