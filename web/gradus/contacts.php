  <?php require_once('header.php');?>

  <!-- MAIN -->
  <main class="main">
    <!-- ХЛЕБНЫЕ КРОШКИ -->
    <div class="bread-crumbs">
      <div class="container">
        <ul>
          <li><a href="#">Главная</a></li>
          <li class="active"><a href="#">Контакты</a></li>
        </ul>
      </div>
    </div>
    <!-- END ХЛЕБНЫЕ КРОШКИ -->

    <!-- КОНТАКТЫ -->
    <div class="contacts">
      <div class="container">
        <div class="contacts-wrapper">
          <div class="left-side">
            <a href="tel:+7 (812) 343-55-55" class="tel-number">+7 (812) 343-55-55</a>
            <a href="mailto: info@gradus.kz" class="email">info@gradus.kz</a>
            <div class="contacts-form">
              <h4>Свяжитесь с нами</h4>
              <form action="index.html" method="post">
                <input type="text" placeholder="Имя">
                <input class="phone_us" type="tel" placeholder="Телефон">
                <textarea name="name" placeholder="Сообщение"></textarea>
                <div class="form-group">
                  <input type="checkbox" id="html">
                  <label for="html"></label>
                  <p>Даю согласие на обработку <a href="#">персональных данных</a></p>
                </div>
                <a href="#" class="btn-call">Связаться</a>
              </form>
            </div>
          </div>

          <div class="right-side">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d160017.55987631876!2d71.38299536520746!3d51.195595795070865!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x424580c47db54609%3A0x97f9148dddb19228!2z0J3Rg9GALdCh0YPQu9GC0LDQvSAwMjAwMDA!5e0!3m2!1sru!2skz!4v1554183660526!5m2!1sru!2skz" width="100%" height="480" frameborder="0" style="border:0" allowfullscreen></iframe>
            <div class="map-address">
              <ul>
                <li>г. Нур-Султан, ул. Кубинская 75, офис 111</li>
                <li>г. Нур-Султан, 3-й Рыбацкий проезд, д.3</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END КОНТАКТЫ -->

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