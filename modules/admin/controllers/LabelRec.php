<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 28.03.2019
 * Time: 11:58
 */

namespace app\modules\admin\controllers;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
class LabelRec
{
    public static function statusList()
    {
        return [
            0 => 'Не рекомендовано',
            1 => 'Рекомендовано',
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