<?php

namespace app\models;

use app\models\Order;
use yii\db\ActiveRecord;

/**
 * customer models
 */
class Customer extends ActiveRecord
{
    /**
     * 获取订单信息
     * @return array
     */
    public function getOrders()
    {
        $order = $this->hasMany(Order::className(), ['customer_id' => 'id'])->asArray()->all();
        return $order;
    }
}
