<?php
/**
 * Управление заказами в админпанели
 */

class AdminOrderController extends AdminBase{

   public function actionIndex(){

      self::checkAdmin();

      //получаем списко закзаов
      $ordersList = Order::getOrdersList();

      require_once(ROOT . '/views/admin_order/index.php');
      return true;
   }

   public function actionUpdate($id){

      self::checkAdmin();

      //данные о конкретном заказе
      $order = Order::getOrderById($id);

      if(isset($_POST['submit'])){
         //проверка формы
         $userName = $_POST['userName'];
         $userPhone = $_POST['userPhone'];
         $userComment = $_POST['userComment'];
         $date = $_POST['date'];
         $status = $_POST['status'];

         //сохраняем данные
         Order::updateOrderById($id, $userName, $userPhone, $userComment, $date, $status);

         header("Location: /admin/order/view/$id");
      }
      require_once(ROOT . '/views/admin_order/update.php');
      return true;
   }

   //ПРосмотр заказов
   public function actionView($id){

      self::checkAdmin();

      //данные о заказе
      $order = Order::getOrderById($id);
      //массив с иденти-ми и кол-вом тваров
      $productsQuantity = json_decode($order['products'], true);
      //массив с идент. товаров
      $productsIds = array_keys($productsQuantity);
      //список товаров в заказе
      $products = Product::getProductsByIds($productsIds);

      require_once(ROOT . '/views/admin_order/view.php');
      return true;
   }

   public function actionDelete($id){

      self::checkAdmin();

      if(isset($_POST['submit'])){

         Order::deleteOrderById($id);

         header("Location: /admin/order");
      }
      require_once(ROOT . '/views/admin_order/delete.php');
      return true;
   }
}