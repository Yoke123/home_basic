<?php
namespace app\components;

use yii\base\Object;

class Foo extends Object
{
    private $bar;

    public function getBar()
    {
        return $this->_qux;
    }

    public function setbar($bar)
    {
        $this->bar = $bar;
    }
}
