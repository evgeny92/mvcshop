<?php
/*
include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/Product.php';
include_once ROOT . '/components/Pagination.php';
*/

class CatalogController{

   public function actionIndex(){
      //call categories
      $categories = array();
      $categories = Category::getCategoriesList();
      //call products
      $latestProducts = array();
      $latestProducts = Product::getLatestProducts(3);

      require_once(ROOT . '/views/catalog/index.php');
      return true;
   }

   public function actionCategory($categoryId, $page = 1){

      //call categories
      $categories = array();
      $categories = Category::getCategoriesList();
      //call products
      $categoryProducts = array();
      $categoryProducts = Product::getProductsListByCategory($categoryId, $page);

      $total = Product::getTotalProductsInCategory($categoryId);

      //creating object pagination
      $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

      require_once(ROOT . '/views/catalog/category.php');
      return true;
   }
}

