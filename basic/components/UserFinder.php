<?php
namespace app\components;

use yii\db\Connection;

class UserFinder
{
    public $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    public function findUser()
    {

    }
}
