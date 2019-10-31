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
class LabelPopular
{
    public static function statusList()
    {
        return [
            0 => 'Нет',
            1 => 'Да',
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