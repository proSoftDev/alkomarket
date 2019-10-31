<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 28.02.2019
 * Time: 14:22
 */

namespace app\modules\admin\controllers;



use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class LabelNew
{
    public static function statusList()
    {
        return [
            1 => 'Новые',
            0 => 'Старые',
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
        }

        return Html::tag('span', ArrayHelper::getValue(self::statusList(), $status), [
            'class' => $class,
        ]);
    }
}