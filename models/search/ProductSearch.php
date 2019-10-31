<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Product;

/**
 * ProductSearch represents the model behind the search form of `app\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'price', 'isMain', 'isNew', 'isDiscount', 'newPrice', 'promo', 'category_id'], 'integer'],
            [['name', 'imagea', 'imageb', 'imagec', 'company', 'gradus', 'country', 'articul', 'content', 'contenta', 'contentb', 'contentc', 'contentd', 'metaName', 'metaDesc', 'metaKey'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Product::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'price' => $this->price,
            'isMain' => $this->isMain,
            'isNew' => $this->isNew,
            'isDiscount' => $this->isDiscount,
            'newPrice' => $this->newPrice,
            'promo' => $this->promo,
            'category_id' => $this->category_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'imagea', $this->imagea])
            ->andFilterWhere(['like', 'imageb', $this->imageb])
            ->andFilterWhere(['like', 'imagec', $this->imagec])
            ->andFilterWhere(['like', 'company', $this->company])
            ->andFilterWhere(['like', 'gradus', $this->gradus])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'articul', $this->articul])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'contenta', $this->contenta])
            ->andFilterWhere(['like', 'contentb', $this->contentb])
            ->andFilterWhere(['like', 'contentc', $this->contentc])
            ->andFilterWhere(['like', 'contentd', $this->contentd])
            ->andFilterWhere(['like', 'metaName', $this->metaName])
            ->andFilterWhere(['like', 'metaDesc', $this->metaDesc])
            ->andFilterWhere(['like', 'metaKey', $this->metaKey]);
        $query->where('isDeleted=0');
        $query->orderBy('id DESC');

        return $dataProvider;
    }
}
