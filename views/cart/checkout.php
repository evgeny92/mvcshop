<?php include ROOT . '/views/layouts/header.php'; ?>

   <section>
      <div class="container">
         <div class="row">
            <div class="col-sm-3">
               <div class="left-sidebar">
                  <h2>Каталог</h2>
                  <div class="panel-group category-products">
                     <? foreach ($categories as $categoryItem): ?>
                        <div class="panel panel-default">
                           <div class="panel-heading">
                              <h4 class="panel-title">
                                 <a href="/category/<?=$categoryItem['id']; ?>">
                                    <?=$categoryItem['name']; ?>
                                 </a>
                              </h4>
                           </div>
                        </div>
                     <? endforeach; ?>
                  </div>
               </div>
            </div>

            <div class="col-sm-9 padding-right">
               <div class="features_items">
                  <h2 class="title text-center">Корзина</h2>


                  <? if ($result): ?>

                     <p>Заказ оформлен. Мы Вам перезвоним.</p>

                  <? else: ?>

                     <p>Выбрано товаров: <?=$totalQuantity; ?>, на сумму: <?=$totalPrice; ?>$</p><br/>

                     <div class="col-sm-4">
                        <? if (isset($errors) && is_array($errors)): ?>
                           <ul>
                              <? foreach ($errors as $error): ?>
                                 <li> - <?=$error; ?></li>
                              <? endforeach; ?>
                           </ul>
                        <? endif; ?>

                        <p>Для оформления заказа заполните форму. Наш менеджер свяжется с Вами.</p>

                        <div class="login-form">
                           <form action="#" method="post">

                              <p>Ваша имя</p>
                              <input type="text" name="userName" placeholder="" value="<?=$userName; ?>"/>

                              <p>Номер телефона</p>
                              <input type="text" name="userPhone" placeholder="" value="<?=$userPhone; ?>"/>

                              <p>Комментарий к заказу</p>
                              <input type="text" name="userComment" placeholder="Сообщение" value="<?=$userComment; ?>"/>

                              <br/>
                              <br/>
                              <input type="submit" name="submit" class="btn btn-default" value="Оформить" />
                           </form>
                        </div>
                     </div>

                  <?php endif; ?>

               </div>

            </div>
         </div>
      </div>
   </section>

<?php include ROOT . '/views/layouts/footer.php'; ?>