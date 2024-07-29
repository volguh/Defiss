<?php 
session_start();
include_once("../config/connect.php");
if (isset($_SESSION['id'])) {
  header('Location: index.php');
};  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="../css/login-style.css" />
    <link rel="stylesheet" href="../css/normalize.css" />
    <link rel="stylesheet" href="../css/fonts.css" />
    <script src="../js/password-security.js" defer></script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DEFISS: Вход в аккаунт</title>
  </head>
  <body>
    <section class="login">
      <img src="../img/admin-logo.svg" alt="logo" class="logo" />
      <div class="login__form">
        <h1 class="login__form-title">Вход в админ-панель</h1>
        <form class="login__form-card"  action="../php/php-login.php" method="POST">
          <div class="login__form-fields">
            <div class="login__form-field">
              <h6 class="login__form-subtitle">логин</h6>
              <div class="login__form-textarea email">
                <?php
                  if (isset($_GET['email'])) {
                    $email = $_GET['email'];
                    echo '
                    <input
                      class="login__form-input "
                      type="email"
                      name="email"
                      id="email"
                      value='.$email.'
                      placeholder="Эл. Почта"
                    />';
                  }else {
                    echo '
                    <input
                      class="login__form-input"
                      type="email"
                      name="email"
                      id="email"
                      placeholder="Эл. Почта"
                    />';
                  };
                ?>

              </div>
            </div>
            <div class="login__form-field">
              <h6 class="login__form-subtitle">Пароль</h6>
              <div class="login__form-textarea password">
                <input
                  class="login__form-input"
                  type="password"
                  name="password"
                  id="password"
                  placeholder="Введите пароль"
                />
                <button type="button" id="security-btn" class="login__form-security"><img src="../img/icons/security-on.svg" alt="" class="login__form-security-img"></button>
              </div>
            </div>
          </div>
          <button id="submit" class="login__form-submit submit-off" type="submit">
            Войти
          </button>
          <?php
          if (isset($_GET['err'])) {
            $err = $_GET['err'];
            if ($err === 'password') {
              echo '<div class="login__form-error"><p class="login__form-error--text">Неверный пароль, проверьте написание и введите снова.</p></div> <style>.password {outline: 1px solid red}</style>';
            } elseif ($err == 'login') {
              echo '
                <div class="login__form-error">
                  <p class="login__form-error--text">Неверный логин, проверьте написание и введите снова.</p>
                </div>
                <style>.email {outline: 1px solid red}</style>
              ';
            }
          }
          ?>
          <div class="login__form-error hidden"><p class="login__form-error--text">Неверный пароль, проверьте написание и введите снова.</p></div>
        </form>
      </div>
    </section>

  </body>
</html>
