<!--Header -->
<?php include ROOT . '/views/layouts/header.php' ?>

<section>
   <div class="container">
      <div class="row">
         <div class="col-sm-3">
            <div class="left-sidebar">
               <h2>Каталог</h2>
               <div class="panel-group category-products">
                  <?php foreach($categories as $categoryItem): ?>
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           <h4 class="panel-title">
                              <a href="/category/<?= $categoryItem['id']; ?>">
                                 <?= $categoryItem['name']; ?>
                              </a>
                           </h4>
                        </div>
                     </div>
                  <?php endforeach; ?>
               </div>
            </div>
         </div>

         <div class="col-sm-9 padding-right">
            <div class="product-details"><!--product-details-->
               <div class="row">
                  <div class="col-sm-5">
                     <div class="view-product">
                        <img src="<?=Product::getImage($product['id']);?>" width="200" alt="">
                     </div>
                  </div>
                  <div class="col-sm-7">
                     <div class="product-information"><!--/product-information-->
                        <? if($product['is_new']): ?>
                           <img src="/template/images/product-details/new.jpg" class="newarrival" alt=""/>
                        <? endif; ?>
                        <h2><?= $product['name']; ?></h2>
                        <p>Код товара: <?= $product['code']; ?></p>
                        <span>
                          <span>US $<?= $product['price']; ?></span>
                          <label>Количество:</label>
                          <input type="text" value="3"/>
                          <button type="button" class="btn btn-fefault cart">
                              <i class="fa fa-shopping-cart"></i>
                              В корзину
                          </button>
                        </span>
                        <p><b>Наличие:</b>
                           <? if($product['status'] == 1): ?>
                              На складе
                           <? else: echo 'Нет' ?>
                           <? endif; ?>
                        </p>
                        <p><b>Состояние:</b>
                           <? if($product['is_new'] == 1): ?>
                           Новое
                           <? else: echo 'Старая коллекция' ?>
                           <? endif;?>
                        </p>
                        <p><b>Производитель:</b> <?= $product['brand']; ?></p>
                     </div><!--/product-information-->
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                     <h5>Описание товара</h5>
                     <?= $product['description']; ?>
                  </div>
               </div>
            </div><!--/product-details-->

         </div>
      </div>
   </div>
</section>

<!--Footer -->
<?php include ROOT . '/views/layouts/footer.php' ?>