<?php
/**
 * Created by PhpStorm.
 * User: vladymir
 * Date: 05.12.19
 * Time: 8:51
 */
class View {


    public function render($tpl, $data) {
        $pr=ROOT. $tpl;
        include ROOT. $tpl;


    }

}