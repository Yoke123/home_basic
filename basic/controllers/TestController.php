<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;

/**
 * test controller
 */
class TestController extends Controller
{
    public function actionTest()
    {

        // 获取缓存数据
        $cache = Yii::$app->cache;

        // 往缓存当中写数据
        //$cache->add('key1', "Hello World!");

        // 修改数据
        // $cache->set('key1', "Helloworld1111");

        // 删除数据
        // $cache->delete('key1');

        // 清空数据
        // $cache->flush();

        // 有效期设置
        // $cache->add('key1', "Hellowaaa", 10);
        // $cache->set('key1', "Hellowaaa", 10);

        // 读缓存
        $data = $cache->get('key1');
        var_dump($data);

        // return $this->render('test');

    }
}
