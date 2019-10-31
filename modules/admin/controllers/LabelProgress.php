<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 12.03.2019
 * Time: 20:29
 */

namespace app\modules\admin\controllers;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class LabelProgress
{
    public static function statusList()
    {
        return [
            0 => 'В процессе',
            1 => 'Выполнен',
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
            case 2:
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