<?php

namespace app\models;

use app\models\Customer;
use yii\db\ActiveRecord;

/**
 * order models
 */
class Order extends ActiveRecord
{
    /**
     * 获取顾客信息
     * @return array
     */
    public function getCustomer()
    {
        $customer = $this->hasOne(Customer::className(), ['id' => 'customer_id'])->asArray()->all();
        return $customer;
    }
}
