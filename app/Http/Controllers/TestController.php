<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/11
 * Time: 15:10
 */

namespace App\Http\Controllers;

class TestController{
    public function index(){
        $counter = function () {
            $i = 0;
            return function() use ($i) {
                var_dump($i);die;
                echo ++$i;
            };
        };

        $counter();
    }
}