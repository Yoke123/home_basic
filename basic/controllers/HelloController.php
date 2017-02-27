<?php
namespace app\controllers;

use app\models\Customer;
//use app\models\Order;
use Yii;
use yii\web\Controller;

class HelloController extends Controller
{
    public $layout = "common";
    public function actionIndex()
    {
        $request  = Yii::$app->request;
        $response = Yii::$app->response;
        // echo $request->get('id', 'null');
        // if ($request->isGet) {
        //     echo "this is get method";
        //     echo $request->userIP;
        // }

        // $response->statusCode = '202';
        // $response->headers->add('pragma', 'no-cache');
        //$response->headers->set('pragma', 'max-age=5');
        //$response->headers->remove('pragma');

        //跳转
        //$response->headers->add('location', 'http://www.baidu.com');
        // $this->redirect('http://www.baidu.com', 302);

        //文件下载
        //$response->headers->add('content-disposition', 'attachment; filename="a.txt"');
        //$response->sendFile('./robots.txt');

        // $session = Yii::$app->session;
        // $session->open();
        // if ($session->isActive) {
        //     echo "session is active.";
        // }

        // $session->set('user', 'Yoke');
        // echo $session->get('user');
        // $session->remove('user');

        // $session['user'] = '李四';
        // unset($session['user']);
        //

        // $cookies      = $response->cookies;
        // $cookies_data = ['name' => 'user', 'value' => 'Yo'];
        // $cookies->add(new Cookie($cookies_data));
        // $cookies->remove('user');
        // echo $cookies->getValue('user');
        //$data = 'Hello God<scritp>alert(2);</script>';

        //db Test
        //$sql = 'select * from test where id = 1';
        //占位符 :id
        //'select * from test where id = :id'
        //Test::findBySql($sql, [':id' = > 1])->all();
        //$data_db = Test::findBySql($sql)->all();
        //id = 1
        //$data_db = Test::find()->where(['id' => 1])->all();
        //id > 0
        //$data_db = Test::find()->where(['>', 'id', 0])->all();
        //1 <= id <= 3
        //$data_db = Test::find()->where(['between', 'id', 1, 3])->all();
        //title like "%title1%"
        //$data_db = Test::find()->where(['like', 'title', 'title1'])->all();

        //查询结果转化成数组 降低内存使用
        //$data_db = Test::find()->where(['like', 'title', 'title'])->asArray()->all();

        //批量查询 循环一次取两条数据
        // foreach (Test::find()->batch(2) as $tests) {

        //     echo "<pre>";
        //     var_dump($tests);
        // }

        // 删除数据
        //$results = Test::find()->where(['id' => 1])->all();
        //$results[0]->delete();

        //删除 id>0 的所有数据
        //Test::deleteAll('id>:id', [':id' => 0]);

        //增加数据
        // $test        = new Test();
        // $test->id    = 6;
        // $test->title = "title6";
        // $test->validate(); //启用rules验证
        // if ($test->hasErrors()) {
        //     echo "data is error!";
        //     exit;
        // }
        // $test->save();

        // 修改数据
        // $test        = Test::find()->where(['id' => 5])->one();
        // $test->title = 'title7';
        // $test->save();

        //根据顾客查询他的订单信息 1对多
        //$customer = Customer::find()->where(['name' => 'zhangsan'])->one();
        //$order    = $customer->getOrders();

        //根据订单查询顾客的信息    1对1
        //$order    = Order::find()->where(['id' => 2])->one();
        //$customer = $order->getCustomer();

        //关联查询结果缓存 会缓存 如果想要重新读取数据库 unset释放
        // $customer = Customer::find()->where(['name' => 'zhangsan'])->one();
        // $order    = $customer->getOrders();//seleter * from order where customer_id = ...
        // unset($customer->getOrders());
        // $order2    = $customer->getOrders();

        //关联查询的多次查询 优化

        //查询101次
        // $customers = Customer::find()->all();
        // foreach ($customers as $customer) {
        //     $orders = $customer->getOrders();
        // }

        //查询2次
        //seleter * from customer
        //seleter * from order where customer_id in()
        $customers = Customer::find()->with('order')->all();
        foreach ($customers as $customer) {
            $orders = $customer->getOrders();
        }
        echo "<pre>";
        var_dump($customer);exit;
        return $this->render('about', ['data' => $data]);
    }
}
