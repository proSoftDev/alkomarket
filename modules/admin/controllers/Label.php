<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 21.02.2019
 * Time: 22:32
 */

namespace app\modules\admin\controllers;


use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class Label
{
    public static function statusList()
    {
        return [
            0 => 'Закрыто',
            1 => 'Активно',
        ];
    }

    public static function statusLabel($status)
    {
        switch ($status) {
            case 0:
                $class = 'label label-default';
                break;
            case 1:
                $class = 'label label-success';
                break;
            default:
                $class = 'label label-default';
        }

        return Html::tag('span', ArrayHelper::getValue(self::statusList(), $status), [
            'class' => $class,
        ]);
    }


}