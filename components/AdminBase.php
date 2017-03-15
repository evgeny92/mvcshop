<?php
/**
 * Абстрактный класс содерит общую логику для контр-ов, которые
 * использ. в админ панели
 */

abstract class AdminBase{

   public static function checkAdmin(){

      //провекра авторизации
      $userId = User::checkLogged();

      //инф. о текущем юзере
      $user = User::getUserById($userId);

      //статус юзера
      if($user['role'] == 'admin'){
         return true;
      }

      die('Доступ запрещён');
   }
}