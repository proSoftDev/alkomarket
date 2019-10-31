<?php

namespace app\components;

use Yii;
use yii\base\Component;

class Sync extends Component
{

    /**
     * @param int $order_id
     */
    public function orderExport($order_id)
    {
        $order = \app\models\Orders::find()->where(['id' => $order_id])->one();

        $address = ($order->address) ? $order->address : 'Нет';
        $comment = ($order->comment) ? $order->comment : 'Нет';

        $xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
        $xml .= "<order>\n";
        $xml .= "    <id>{$order->id}</id>\n";
        $xml .= "    <name>{$order->fio}</name>\n";
        $xml .= "    <email>{$order->email}</email>\n";
        $xml .= "    <phone>{$order->telephone}</phone>\n";
        $xml .= "    <address>{$address}</address>\n";
        $xml .= "    <date>" . date('Y-m-d H:i:s', strtotime($order->order_date)) . "</date>\n";
        $xml .= "    <comment>{$comment}</comment>\n";
        $xml .= "    <items>\n";

        foreach ($order->products as $product) {
            $xml .= "        <item>\n";
            $xml .= "            <articul>{$product->product->articul}</articul>\n";
            $xml .= "            <count>{$product->count}</count>\n";
            $xml .= "        </item>\n";
        }

        $xml .= "    </items>\n";
        $xml .= "</order>";

        file_put_contents(Yii::$app->basePath . "/sync/orders/order_{$order_id}.xml", $xml);
    }

}
