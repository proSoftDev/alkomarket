<?php require_once('header.php'); ?>

  <!-- MAIN -->
  <main class="main">
    <!-- ХЛЕБНЫЕ КРОШКИ -->
    <div class="bread-crumbs">
      <div class="container">
        <ul>
          <li><a href="#">Главная</a></li>
          <li class="active"><a href="#">Мой кабинет</a></li>
        </ul>
      </div>
    </div>
    <!-- END ХЛЕБНЫЕ КРОШКИ -->

    <!-- MY ACCOUNT -->
    <div class="my-account">
      <div class="container">
        <div class="title">
          <h3>Мой кабинет</h3>
        </div>
        <div class="my-account-wrapper">
          <!-- ACCOUNT TABS -->
          <div class="account-left-side">
            <ul class="tabs">
          		<li class="tab-link current" data-tab="tab-1">Мои заказы</li>
          		<li id="favorites" class="tab-link" data-tab="tab-2">Избранное</li>
          		<li class="tab-link" data-tab="tab-3">Мои данные</li>
          		<li class="tab-link" data-tab="tab-4">Программные лояльности</li>
          	</ul>
          </div>
          <!-- END ACCOUNT TABS -->

          <!-- ACCOUNT CONTENT -->
          <div class="account-right-side">
            <div id="tab-1" class="tab-content current wow fadeInRight" data-wow-duration="1.5s">
              <div class="orders-table">
                <ul>
                  <li>
                    <span>Заказ</span>
                    <span>Дата</span>
                    <span>Адресат</span>
                    <span>Сумма заказа</span>
                    <span>Статус заказа</span>
                  </li>
                  <li>
                    <span>123</span>
                    <span>15.11.2018</span>
                    <span>Иван Анатольевич</span>
                    <span>25 000 тг</span>
                    <span>Выполнен</span>
                  </li>
                  <li>
                    <span>123</span>
                    <span>15.11.2018</span>
                    <span>Иван Анатольевич</span>
                    <span>25 000 тг</span>
                    <span>Выполнен</span>
                  </li>
                  <li>
                    <span>123</span>
                    <span>15.11.2018</span>
                    <span>Иван Анатольевич</span>
                    <span>25 000 тг</span>
                    <span>Выполнен</span>
                  </li>
                  <li>
                    <span>123</span>
                    <span>15.11.2018</span>
                    <span>Иван Анатольевич</span>
                    <span>25 000 тг</span>
                    <span>Выполнен</span>
                  </li>
                </ul>
              </div>
          	</div>
          	<div id="tab-2" class="tab-content wow fadeInRight">
              <div class="favorite-wrapper">
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
              </div>
          	</div>
          	<div id="tab-3" class="tab-content wow fadeInRight">
              <form action="index.html" method="post">
                <div class="input-item">
                  <p>Ваш логин: <span>sergkabanov</span></p>
                  <input type="text" placeholder="sergkabanov">
                </div>
                <div class="input-item">
                  <p>Пол: </p>
                  <ul>
                   <li><input type="radio" name="muhRadio" value=""/><label for="muhRadio1">Мужской</label></li>
                   <li><input type="radio" name="muhRadio" value=""/><label for="muhRadio2">Женский</label></li>
                 </ul>
                </div>
                <div class="input-item">
                  <p>Дата рождения: <span>14.05.1985г.</span></p>
                  <input type="date">
                </div>
                <div class="input-item">
                  <p>Контактный телефон: <span>+7 (987) 654-32-21</span></p>
                  <input type="tel" placeholder="+7 (987) 654-32-21" class="phone_us">
                </div>
                <div class="input-item">
                  <p>Адрес: <span>г. Москва, ул. Московская, д. 1</span></p>
                  <input type="text" placeholder="г. Москва, ул. Московская, д. 1">
                </div>
                <div class="input-item">
                  <p>Индекс: <span>123456</span></p>
                  <input type="text" placeholder="123456" class="index">
                </div>
                <div class="input-item">
                  <p>Ваш пароль: <span>56631535</span></p>
                  <input type="password" placeholder="56631535">
                </div>
                <div class="save-del-buttons">
                  <button type="button" name="button" class="save-btn">Сохранить</button>
                  <button type="button" name="button">Удалить аккаунт</button>
                </div>
              </form>
          	</div>
          	<div id="tab-4" class="tab-content wow fadeInRight">
              <a href="/" class="logo">
                  GRADUS.KZ
              </a>
              <h4>Программа лояльности</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>
              <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
          	</div>
          </div>
          <!-- END ACCOUNT CONTENT -->
        </div>
      </div>
    </div>

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

  <?php require_once('footer.php'); ?>    