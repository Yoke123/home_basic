<?php
namespace app\controllers;

use yii\di\Container;
use yii\web\Controller;

class ConstructController extends Controller
{

    public function actionIndex()
    {
        $this->layout = false;
        echo "<pre>";
        $this->actionCallbackdi5();
        return $this->render('index');
    }

    //构造方法注入①
    public function actionConstructdi()
    {
        $container = new Container();
        $container->set('userFinder', 'app\components\UserFinder');
        $aaa = $container->get('userFinder');
        var_dump($aaa);
    }

    //构造方法注入②
    public function actionConstructdi2()
    {
        $container = new Container();
        $container->set('yii\db\Connection', [
            'class'    => 'yii\db\Connection',
            'dsn'      => 'mysql:host=127.0.0.1;dbname=ar15',
            'username' => 'root',
            'password' => 'root',
            'charset'  => 'utf8',
        ]);
        $container->set('userFinder', 'app\components\UserFinder');
        $aaa = $container->get('userFinder');
        var_dump($aaa);
    }

    //属性注入例子
    public function actionSetterdi3()
    {
        $container = new Container();
        $container->set('db', [
            'class'    => 'yii\db\Connection',
            'dsn'      => 'mysql:host=127.0.0.1;dbname=ar15',
            'username' => 'root',
            'password' => 'root',
            'charset'  => 'utf8',
        ]);
        $aaa = $container->get('db');
        var_dump($aaa);
    }

    //Setter注入例子
    public function actionSetterdi4()
    {
        $container = new Container();
        $aaa       = $container->get('app\components\Foo', [], [
            'bar' => $container->get('app\components\Bar'),
        ]);
        var_dump($aaa);
    }

    //PHP 回调注入
    public function actionCallbackdi5()
    {
        $container = new Container();
        $container->set('Foo', function ($container, $params, $config) {
            echo "<pre>";
            print_r($params);
            print_r($config);
            $obj      = new \app\components\Foo();
            $obj->Bar = $container->get('app\components\Bar');
            return $obj;
        });
        $aaa = $container->get('Foo', ['param1' => 1], ['config1' => 1]);
        var_dump($aaa);
    }
}
