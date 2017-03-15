<?php

class SiteController{

   public function actionIndex(){
      //call categories
      $categories = array();
      $categories = Category::getCategoriesList();
      //call products
      $latestProducts = array();
      $latestProducts = Product::getLatestProducts(3);
      //call products list for slider
      $sliderProducts = Product::getRecommendedProducts();

      require_once(ROOT . '/views/site/index.php');
      return true;
   }

   public function actionContact(){

      $userEmail = '';
      $userText = '';
      $result = false;

      if(isset($_POST['submit'])){
         $userEmail = $_POST['userEmail'];
         $userText = $_POST['userText'];

         $errors = false;

         if(!User::checkEmail($userEmail)){
            $errors[] = 'Неверный E-mail';
         }

         if($errors == false){
            $adminEmail = 'tonitsoi_evgenii@mail.ru';
            $message = "Текст: {$userText}. От {$userEmail}";
            $subject = 'Тема письма';
            $result = mail($adminEmail, $subject, $message);
            $result = true;
         }
      }
      require_once(ROOT . '/views/site/contact.php');
      return true;
   }


}