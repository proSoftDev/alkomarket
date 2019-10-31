<?php

namespace app\commands;

use Yii;
use app\models\Catalog;
use app\models\Category;
use app\models\Product;
use yii\console\ExitCode;
use yii\console\Controller;

/**
 * Test controller
 */
class SyncController extends Controller
{

	
    public function actionImages()
    {
        $pathSyncImages = \Yii::$app->basePath . '/sync/images';
        $pathUploads = \Yii::$app->basePath . '/web/uploads';

        if (is_dir($pathSyncImages)) {
            $files = preg_grep('/^([^.])/', scandir($pathSyncImages));;

            if (count($files)) {
                foreach ($files as $file) {
                    $ext = pathinfo($file, PATHINFO_EXTENSION);
                    $name = substr($file, 0, strlen($file) - strlen($ext) - 1);

                    $countProducts = Product::find()->where(['articul' => $name])->count();

                    if (count($countProducts)) {
                        $filename = md5(time() . $name) . '.' . $ext;

                        if (copy("{$pathSyncImages}/{$name}.{$ext}", "{$pathUploads}/{$filename}")) {
                            Product::updateAll(['imagea' => $filename, 'imageb' => $filename], ['=', 'articul', $name]);

                            unlink("{$pathSyncImages}/{$file}");
                        }
                    }
                }
            }
        }

        return ExitCode::OK;
    }

	/*
    public function actionProducts()
    {
        $pathSyncXML = \Yii::$app->basePath . '/sync/products.xml';

        if (file_exists($pathSyncXML)) {
            $products = simplexml_load_file($pathSyncXML);

            if (count($products)) {
                foreach ($products as $attr) {
                    $price = (int)str_replace(' ', '', $attr->price);
                    $isDiscount = isset($attr->discount) && $attr->discount > 0;
                    $newPrice = 0;

                    if ($isDiscount) {
                        $newPrice = $price - ($price * ((int)$attr->discount / 100));
                    }

                    $attributes = [
                        'name' => $attr->name,
                        'volume' => "{$attr->size} л",
                        'price' => $price,
                        'company' => $attr->manufacturer,
                        'gradus' => "{$attr->percent}%",
                        'articul' => $attr->code,
                        'isDiscount' => (int)$isDiscount,
                        'newPrice' => $newPrice,
                        'promo' => $isDiscount ? $attr->discount : null,
                    ];

                    if ( ! $product = Product::find()->where(['articul' => $attr->code])->one()) {
                        $product = new Product();


                        $categoryName = (@$attr->category1) ? $attr->category1 : $attr->category;

                        $category = Category::find()->where(['name' => trim($categoryName)])->one();

                        $attributes = array_merge($attributes, [
                            'country' => (isset($attr->country) && $attr->country) ? ucwords(mb_strtolower($attr->country, 'utf-8')) : null,
                            'category_id' => ($category) ? $category->id : 1,
                        ]);
                    }

                    $product->load($attributes, '');
                    $product->save(false);
                }
            }
        }

        return ExitCode::OK;
    }
	*/
	
	


    public function actionProducts()
    {
        $pathSyncXML = \Yii::$app->basePath . '/sync/products.xml';

        if (file_exists($pathSyncXML)) {
            $xmlStr = file_get_contents($pathSyncXML);
			$xmlObj = simplexml_load_string($xmlStr);
			$products = json_decode(json_encode($xmlObj), true);
			
			if (count($products)) {
				$catalog = array();
				foreach ($products["product"] as $v){
					$catalog[$v["category"]][$v["category1"]][] = array(
						"name" => $v["name"],
						"code" => $v["code"],
						"price" => $v["price"],
						"percent" => $v["percent"],
						"size" => $v["size"],
						"manufacturer" => $v["manufacturer"],
						"countrycode" => $v["countrycode"],
						"new" => $v["new"],
						"discount" => $v["discount"],
					);
				}

				foreach ($catalog as $catalog_name => $category){
					if ( ! $catalog = Catalog::find()->where(['name' => $catalog_name])->one()) {
						$catalog = new Catalog();
						$catalog->name = $catalog_name;
						$catalog->save(false);
					}

					foreach ($category as $category_name => $products){

						if ( ! $catego = Category::find()->where(['name' => $category_name,'catalog_id' => $catalog->id])->one()) {
							$catego = new Category();
						}

						$catego->name = $category_name;
						$catego->image = "";
						$catego->isPopular = 0;
						$catego->metaName = $category_name;
						$catego->metaKey = $category_name;
						$catego->metaDesc = $category_name;
						$catego->catalog_id = $catalog->id;
						$catego->save(false);

						foreach ($products as $product){
							if ( ! $pro = Product::find()->where(['articul' => $product["code"]])->one()) {
								$pro = new Product();
							}

							$pro->name = $product["name"];
							$pro->articul = $product["code"];
							$pro->price = $product["price"];
							$pro->gradus = $product["percent"];
							$pro->volume = $product["size"];
							$pro->company = $product["manufacturer"];
							$pro->country = $product["countrycode"];
							$pro->isNew = $product["new"];
							$pro->isDiscount = $product["discount"];
							$pro->count = 0;
							$pro->number_of_sales = 0;
							$pro->metaName = $product["name"];
							$pro->metaKey = $product["name"];
							$pro->metaDesc = $product["name"];
							$pro->category_id = $catego->id;
							$pro->save(false);
						}
					}
				}
			}
        }

        return ExitCode::OK;
    }

}
