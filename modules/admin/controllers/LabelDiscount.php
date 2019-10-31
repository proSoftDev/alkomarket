<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 07.03.2019
 * Time: 17:08
 */

namespace app\modules\admin\controllers;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class LabelDiscount
{
    public static function statusList()
    {
        return [
            1 => 'Действует',
            0 => 'Не действует',
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