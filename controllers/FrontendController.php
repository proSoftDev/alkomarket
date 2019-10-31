<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 01.04.2019
 * Time: 11:45
 */

namespace app\controllers;


use app\models\Catalog;
use app\models\Category;
use app\models\Contact;
use app\models\DeliveryPrice;
use app\models\Emailforrequest;
use app\models\Feedback;
use app\models\Menu;
use app\models\Product;
use app\models\SignupForm;
use app\models\UserProfile;
use Yii;
use yii\web\Controller;

class FrontendController extends Controller
{

    public function init()
    {
        $menu = Menu::find()->orderBy('sort asc')->limit(4)->all();
        $contact = Contact::find()->one();
        $catalog = Catalog::find()->with('catalogItems')->all();
        $popCategory = Category::find()->where('isPopular=1')->all();
        $email = Emailforrequest::find()->one();
        $bestProduct = Product::find()->where('isMain=1')->all();


        Yii::$app->view->params['menu'] = $menu;
        Yii::$app->view->params['contact'] = $contact;
        Yii::$app->view->params['popCategory'] = $popCategory;
        Yii::$app->view->params['catalog'] = $catalog;
        Yii::$app->view->params['email'] = $email;
        Yii::$app->view->params['bestProduct'] = $bestProduct;

        if(!isset($_SESSION['basket'])){
            session_start();
            $_SESSION['basket'] = array();
        }

        $signup = new SignupForm();
        Yii::$app->view->params['signup'] = $signup;
        $userProfile = new UserProfile();
        Yii::$app->view->params['profile'] = $userProfile;

        $sum = Product::getSum();
        Yii::$app->view->params['sumMoney'] = $sum;

    }

    protected function setMeta($title = null, $keywords = null, $description = null){
        $this->view->title = $title;
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => "$keywords"]);
        $this->view->registerMetaTag(['name' => 'description', 'content' => "$description"]);
    }

    protected function sendRequest($name, $email, $content) {


        $emailSend = Yii::$app->mailer->compose()
            ->setFrom('sdulife.kz@gmail.com')
            ->setTo(Yii::$app->view->params['email']->email)
            ->setSubject('Клиент хочет связаться с вами')

            ->setHtmlBody("<p>Имя: $name</p>
                                 <p>Номер телефона: $email</p>
                                 <p>Сообщение: $content</p>");
        return $emailSend->send();

    }




    protected function sendInformationAboutRegistration($fio, $email, $password) {

        $host = Yii::$app->request->hostInfo;

        $emailSend = Yii::$app->mailer->compose()
            ->setFrom('sdulife.kz@gmail.com')
            ->setTo($email)
            ->setSubject('Регистрация на сайте компании «Gradus»')

            ->setHtmlBody("<p>$fio, вы получили данное письмо, т.к. зарегистрировались на сайте компании «Gradus».</p> </br>
                                 </br>
                                 <p>Ваши данные для авторизации:</p> </br></br>
                                 <p>E-mail: $email</p>
                                 <p>Пароль: $password</p> </br></br>
                                 <p>---</p></br>
                                 <p>С уважением</p></br>
                                 <p>администрация <a href='$host'>GRADUS.KZ</a></p>");

        return $emailSend->send();

    }



    protected function sendInformationAboutNewPassword($email, $password) {

        $host = Yii::$app->request->hostInfo;

        $emailSend = Yii::$app->mailer->compose()
            ->setFrom('sdulife.kz@gmail.com')
            ->setTo($email)
            ->setSubject('Восстановление доступа')

            ->setHtmlBody("<p>Вы получили данное письмо, т.к. на ваш e-mail был полуен запрос на восстановление пароля.</p> </br>
                                 </br>
                                 <p>Ваши данные для авторизации:</p> </br></br>
                                 <p>E-mail: $email</p>
                                 <p>Ваш новый пароль: $password</p> </br></br>
                                 <p>---</p></br>
                                 <p>С уважением</p></br>
                                 <p>администрация <a href='$host'>GRADUS.KZ</a></p>");

        return $emailSend->send();

    }

    protected function sendInformationAboutPayment($fio, $email, $id) {
        $delivery = DeliveryPrice::findOne($_POST['Orders']['address']);
        $host = Yii::$app->request->hostInfo;
        $orderedProduct = "<table>
			<colgroup><col width=\"72\">
			<col>
			<col width=\"100\">
			<col width=\"75\">
			<col width=\"125\"></colgroup>
			<tbody>
			    <tr>
                    <th></th>
                    <th>Наименование</th>
                    <th>Цена за ед.</th>
                    <th>Кол-во</th>
                    <th>Сумма</th>
                    <th>Доставка</th>
                </tr>";

        $allPrice = 0;
        foreach ($_SESSION['basket'] as $v) {
            if ($v->isDiscount) $price = $v->newPrice;
            else $price = $v->price;

            $productPrice = $v->getSumProduct($v->id);
            $image = $v->getImageB();
            $orderedProduct.= "<tr>
                    <td>
                        <img src=\"$host$image\" alt=\"\" class=\"CToWUd\" width='150' height='125'>
                    </td>
                    <td><b> $v->name</b><br>
                    </td>
                    <td align=\"center\">$price тг</td>
                    <td align=\"center\">$v->count</td>
                    <td align=\"center\">$productPrice тг</td>
                    <td align=\"center\">$delivery->price тг</td>
                </tr>";

            $allPrice += $productPrice + $delivery->price;
        }
        $orderedProduct.= " <tr><td colspan=\"2\"></td>
				<td colspan=\"2\">
					Итого товара на сумму:
				</td>
				<td align=\"center\">
					$allPrice тг
				</td>
			</tr>
			</tbody></table>";
        $emailSend = Yii::$app->mailer->compose()
            ->setFrom('sdulife.kz@gmail.com')
            ->setTo($email)
            ->setSubject('Поступил новый заказ №'.$id.' от '.date('d-m-Y h:i', time()))

            ->setHtmlBody("<p>$fio, благодарим Вас за оформление заказа на нашем сайте REMEDIUM.KZ.</p></br>
                                 <p>Ниже, предоставляем Вам информацию о заказах:</p></br></br>
                                 $orderedProduct
                                 </br></br>
                                 <p>---</p></br>
                                 <p>С уважением</p></br>
                                 <p>администрация <a href='$host'>REMEDIUM.KZ</a></p>");

        return $emailSend->send();

    }


}