<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 2015/12/10
 * Time: 10:31
 */

class Test2Action extends Action {

    public function index(){


        $ca =S('test');

        p($ca);
        p(C('DATA_CACHE_PATH'));
        exit;


    }



}