<?php
namespace app\controllers;

use LinkORB\Component\Etcd\Client;

class EtcdController
{
    public function actionIndex($server)
    {
        //test
        $client = new Client($server);
        $client->set('/foo', 'fooValue');
        // Set the ttl
        $client->set('/foo', 'fooValue', 10);
        // get key value
        echo $client->get('/foo');

        // Update value with key
        $client->update('/foo', 'newFooValue');

        // Delete key
        $client->rm('/foo');

        // Create a directory
        $client->mkdir('/fooDir');
        // Remove dir
        $client->rmdir('/fooDir');
    }
}
