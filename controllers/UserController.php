<?php

class UserController{

   public function actionRegister(){

      $name = '';
      $email = '';
      $password = '';
      $result = false;

      if(isset($_POST['submit'])){
         $name = $_POST['name'];
         $email = $_POST['email'];
         $password = $_POST['password'];

         $errors = false;

         if(!User::checkName($name)){
            $errors[] = 'Имя не должно быть короче 2-х символов';
         }

         if(!User::checkEmail($email)){
            $errors[] = 'Неправильный E-mail';
         }

         if(!User::checkPassword($password)){
            $errors[] = 'Пароль не должен быть короче 6-и символов';
         }

         if(User::checkEmailExist($email)){
            $errors[] = 'Такой E-mail уже существует';
         }

         if($errors == false){
            $result = User::register($name, $email, $password);
         }
      }
      require_once(ROOT . '/views/user/register.php');
      return true;
   }

   public function actionLogin(){

      $email = '';
      $password = '';

      if(isset($_POST['submit'])){
         $email = $_POST['email'];
         $password = $_POST['password'];

         $errors = false;

         if(!User::checkEmail($email)){
            $errors[] = 'Неверный E-mail или пароль';
         }

         if(!User::checkPassword($password)){
            $errors[] = 'Пароль не должен быть короче 6-и символов';
         }

         //check if exist user
         $userId = User::checkUserData($email, $password);

         if($userId == false){
            $errors[] = 'Неверные данные';
         }else{
            //if data correct, then remember the user
            User::auth($userId);

            //redirect user to the cabinet
            header("Location: /cabinet/");
         }
      }
      require_once(ROOT . '/views/user/login.php');
      return true;
   }

   //delete user data
   public function actionLogout(){
      unset($_SESSION['user']);
      header("Location: /");

   }



}