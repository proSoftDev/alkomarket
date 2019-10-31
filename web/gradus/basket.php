<?php require_once('header.php');?>

  <!-- MAIN -->
  <main class="main">
    <!-- ХЛЕБНЫЕ КРОШКИ -->
    <div class="bread-crumbs">
      <div class="container">
        <ul>
          <li><a href="#">Главная</a></li>
          <li><a href="#">Каталог</a></li>
          <li class="active"><a href="#">Карточка товара</a></li>
        </ul>
      </div>
    </div>
    <!-- END ХЛЕБНЫЕ КРОШКИ -->


    <!-- GRADUS BASKET -->
    <div class="basket">
      <div class="container">
          <div class="title wow fadeInUp">
              <h3>Корзина</h3>
          </div>

          <div class="basket-table">
              <div class="product-info">
                  <p>Фото</p>
                  <p>Наименование</p>
                  <p>Объем</p>
                  <p>Количество</p>
                  <p>Цена</p>
                  <p></p>
              </div>

              <div class="basket-product-wrapper">
                  <li>
                      <div class="product-img">
                          <img src="images/basket-wwine.png" alt="Chevalier de Pierre Blanc Sec Белое Сухое">
                      </div>
                      <div class="product-title">
                          <p>Chevalier de Pierre Blanc Sec Белое Сухое </p>
                      </div>
                      <div class="product-volume">
                          <p>0,75 л</p>
                      </div>
                      <div class="product-quantity">
                          <div class="number-quantity">
                              <span class="minus">
                                  -
                              </span>
                              <input type="text" value="1">
                              <span class="plus">
                                  +
                              </span>
                          </div>
                      </div>
                      <div class="product-price">
                          <p>19 000 ₸</p>
                      </div>
                      <div class="product-button">
                          <button><img src="images/delet.png"></button>
                      </div>
                  </li>
                  <li>
                      <div class="product-img">
                          <img src="images/basket-rwine.png" alt="Chevalier de Pierre Blanc Sec Белое Сухое">
                      </div>
                      <div class="product-title">
                          <p>Chevalier de Pierre Blanc Sec Белое Сухое </p>
                      </div>
                      <div class="product-volume">
                          <p>0,75 л</p>
                      </div>
                      <div class="product-quantity">
                          <div class="number-quantity">
                              <span class="minus">
                                  -
                              </span>
                              <input type="text" value="1">
                              <span class="plus">
                                  +
                              </span>
                          </div>
                      </div>
                      <div class="product-price">
                          <p>16 500 ₸</p>
                      </div>
                      <div class="product-button">
                          <button><img src="images/delet.png"></button>
                      </div>
                  </li>
              </div>
          </div>
          <div class="basket-contacts-and-paying">
              <form action="#">
                  <div class="left-side">
                      <span>ФИО*</span>
                      <input type="text" placeholder="Фамилия, имя, отчество">
                      <div class="email-tel">
                          <div>
                              <span>E-mail*</span>
                              <input type="email" placeholder="yourmail@mail.ru">
                          </div>
                          <div>
                              <span>Мобильный телефон*</span>
                              <input class="phone_us" type="text" placeholder="+7 (___) ___-__-__">
                          </div>
                      </div>
                      <span>Адрес доставки</span>
                      <input type="text" placeholder="Например: г.Алматы, ул. Московская">
                      <div class="comment">
                          <span>Коментарии</span>
                          <textarea name="comment" id="comment" placeholder="Сообщение"></textarea>
                      </div>
                  </div>

                  <div class="right-side">
                      <div class="pay-price">
                          <div class="products-price">
                              <p>Товары:</p>
                              <p>25 799,00 ₸</p>
                          </div>
                          <div class="products-price">
                              <p>Доставка:</p>
                              <p>0,00 ₸</p>
                          </div>
                          <hr>
                          <div class="total">
                              <p>Итого с доставкой:</p>
                              <p>25 799,00 ₸</p>
                          </div>
                          <div class="total-payment">
                              <div class="next-del">
                                  <a href="#">Продолжить покупки</a>
                                  <a href="#">Очистить корзину</a>
                              </div>
                              <a href="#" class="btn-pay">
                                  Перейти к оплате
                              </a>
                          </div>
                      </div>
                  </div>
              </form>
          </div>
      </div>
    </div>
    <!-- END GRADUS BASKET -->

    <!-- ХИТЫ ПРОДАЖ -->
    <div class="populars-products wow fadeInUp" data-wow-duration="1s">
        <div class="container">
            <div class="title">
                <h4>Популярные товары</h4>
            </div>
            <div id="carouselOne" class="owl-carousel owl-theme">
                <div class="bestseller-item">
                    <img src="images/white-wine.png">
                    <div class="new">
                        new
                    </div>
                    <p>
                        Chevalier de Pierre Blanc
                        Sec Белое Сухое 0.75 л
                    </p>
                    <span>2900 ₸</span>
                    <div class="bestseller__hide-info">
                        <a href="#" class="basket-btn">
                            <img src="images/basket-best.png">
                            <span>в корзину</span>
                        </a>
                        <ul>
                            <li>Производитель: Maison Bouey</li>
                            <li>Крепость: 11,5%</li>
                            <li>Страна: Франция</li>
                        </ul>
                    </div>
                </div>

                <div class="bestseller-item">
                    <img src="images/pink-wine.png">
                    <p>
                        Chevalier de Pierre Blanc
                        Sec Белое Сухое 0.75 л
                    </p>
                    <span>2900 ₸</span>
                    <div class="bestseller__hide-info">
                        <a href="#" class="basket-btn">
                            <img src="images/basket-best.png">
                            <span>в корзину</span>
                        </a>
                        <ul>
                            <li>Производитель: Maison Bouey</li>
                            <li>Крепость: 11,5%</li>
                            <li>Страна: Франция</li>
                        </ul>
                    </div>
                </div>

                <div class="bestseller-item">
                    <img src="images/red-wine.png">
                    <div class="stock">
                        70%
                    </div>
                    <p>
                        Бейкуш Артания Красное
                        Сухое 0.75 л
                    </p>
                    <div class="stock-price">
                        <strike>4900 ₸</strike>
                        <span>2900 ₸</span>
                    </div>
                    <div class="bestseller__hide-info">
                        <a href="#" class="basket-btn">
                            <img src="images/basket-best.png">
                            <span>в корзину</span>
                        </a>
                        <ul>
                            <li>Производитель: Maison Bouey</li>
                            <li>Крепость: 11,5%</li>
                            <li>Страна: Франция</li>
                        </ul>
                    </div>
                </div>

                <div class="bestseller-item">
                    <img src="images/white-wine.png">
                    <p>
                        Chevalier de Pierre Blanc
                        Sec Белое Сухое 0.75 л
                    </p>
                    <span>2900 ₸</span>
                    <div class="bestseller__hide-info">
                        <a href="#" class="basket-btn">
                            <img src="images/basket-best.png">
                            <span>в корзину</span>
                        </a>
                        <ul>
                            <li>Производитель: Maison Bouey</li>
                            <li>Крепость: 11,5%</li>
                            <li>Страна: Франция</li>
                        </ul>
                    </div>
                </div>

                <div class="bestseller-item">
                    <img src="images/pink-wine.png">
                    <p>
                        Chevalier de Pierre Blanc
                        Sec Белое Сухое 0.75 л
                    </p>
                    <span>2900 ₸</span>
                    <div class="bestseller__hide-info">
                        <a href="#" class="basket-btn">
                            <img src="images/basket-best.png">
                            <span>в корзину</span>
                        </a>
                        <ul>
                            <li>Производитель: Maison Bouey</li>
                            <li>Крепость: 11,5%</li>
                            <li>Страна: Франция</li>
                        </ul>
                    </div>
                </div>

                <div class="bestseller-item">
                    <img src="images/red-wine.png">
                    <p>
                        Бейкуш Артания Красное
                        Сухое 0.75 л
                    </p>
                    <span>2900 ₸</span>
                    <div class="bestseller__hide-info">
                        <a href="#" class="basket-btn">
                            <img src="images/basket-best.png">
                            <span>в корзину</span>
                        </a>
                        <ul>
                            <li>Производитель: Maison Bouey</li>
                            <li>Крепость: 11,5%</li>
                            <li>Страна: Франция</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END ХИТЫ ПРОДАЖ -->
  </main>

<?php require_once('footer.php');?>