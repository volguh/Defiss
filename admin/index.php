<?php 
  include_once('../config/connect.php');
  include_once('../php/php-admin.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>DEFISS: Заявки</title>
  <link rel="shortcut icon" href="img/x-icon/x-icon.svg" type="image/x-icon" />
  <link rel="stylesheet" href="../css/normalize.css" />
  <link rel="stylesheet" href="../css/admin-style.css" />
  <link rel="stylesheet" href="../css/fonts.css" />
  <script src="../js/smooth.js" defer></script>
  <script src="../js/pop-up.js" defer></script>
</head>

<body>
  <header class="header sticky">
    <div class="container">
      <div class="header__content">
        <div class="header__logo">
          <img class="header__logo-img" src="../img/logo-light.svg" alt="logo" />
          <div class="header__logo-text">
            <p class="header__logo-name">DEFISS</p>
            <p class="header__logo-subname">админ</p>
          </div>
        </div>
        <div class="header__nav">
          <ul class="header__nav-links">
            <li>
              <a href="#pending" class="header__nav-link">На рассмотрении</a>
            </li>
            <li>
              <a href="#checked" class="header__nav-link">Рассмотренные</a>
            </li>
          </ul>
          <a href="../php/php-logout.php" class="header__nav--exit">
            <div class="header__nav--exit-img"></div>
          </a>
        </div>
      </div>
    </div>
  </header>
  <section class="pending" id="pending">
    <div class="container">
      <div class="pending__content">
        <h2 class="pending__head">Заявки на рассмотрении</h2>
        <ul class="pending__list">
          <?php
              if (mysqli_num_rows($query_pending) > 0){
                while ($row_pending = mysqli_fetch_assoc($query_pending)) {
                $id = $row_pending['request_id'];
                $name = $row_pending['request_name'];
                $email = $row_pending['request_email'];
                $number = $row_pending['request_number'];
                echo
                '
                  <li class="pending__card">
                    <div class="pending__card-text">
                      <div class="pending__card-name">
                        <p class="pending__card-section--text card-section-name">
                          '.$name.'
                        </p>
                      </div>
                      <div class="pending__card-email">
                        <p class="pending__card-section--text">
                          '.$email.'
                        </p>
                      </div>
                      <div class="pending__card-number">
                        <p class="pending__card-section--text">
                          '.$number.'
                        </p>
                      </div>
                    </div>
                    <a href="../php/php-request-accept.php?request_id='.$id.'" class="pending__card-button">Принять</a>
                  </li>
                ';
                };
              }else {
                echo
                '
                  <p class="pending__empty">Пока что, заявок нет...</p>
                ';
              }
          ?>
        </ul>
      </div>
    </div>
  </section>
  <section class="checked" id="checked">
    <div class="container">
      <div class="checked__content">
        <h2 class="checked__head">Расмотренные заявки</h2>
        <ul class="checked__list">
          <?php
            if (mysqli_num_rows($query_active) > 0){
              while ($row_active = mysqli_fetch_assoc($query_active)) {
                $id = $row_active['request_id'];
                $name = $row_active['request_name'];
                $email = $row_active['request_email'];
                $number = $row_active['request_number'];

                echo '
                <li class="checked__card">
                <p id="checked__id">'.$id.'</p>
                  <button onclick="openPopup('.$id.')" class="checked__card--close-btn id'.$id.'">
                    <div class="checked__card--close-btn-img"></div>
                  </button>
                  <p class="checked__card--name">'.$name.'</p>
                  <div class="checked__card--info">
                    <p class="checked__card--info-text">'.$email.'</p>
                    <p class="checked__card--info-text">'.$number.'</p>
                  </div>
                </li>
                ';
              };
            }
          ?>
        </ul>
      </div>
    </div>
    <div class="popup__blur"></div>
    <div class="popups">
    <?php
      $sql_popup = "SELECT * FROM `requests`";
      $query_popup = mysqli_query($conn, $sql_popup);
      while($row_popup = mysqli_fetch_assoc($query_popup)) {
        $id_popup = $row_popup['request_id'];
        $name_popup = $row_popup['request_name'];
        $email_popup = $row_popup['request_email'];
        $number_popup = $row_popup['request_number'];
        echo '
        <div class="popup closed" id="popup_id'.$id_popup.'">
          <p id="popup__id">'.$id_popup.'</p>
          <button type="button" class="popup--close-btn" onclick="closePopup('.$id_popup.')"  id="btn-id"'.$id_popup.'">
            <div class="checked__card--close-btn-img"></div>
          </button>
          <h3 class="popup__title">Вы уверены?</h3>
          <p class="popup__text">Удалить заявку:</p>
          <div class="checked__card delete">
            <p class="checked__card--name">'.$name_popup.'</p>
            <div class="checked__card--info">
              <p class="checked__card--info-text">'.$email_popup.'</p>
              <p class="checked__card--info-text">'.$number_popup.'</p>
            </div>
          </div>
          <a href="../php/php-request-delete.php?delete_id='.$id_popup.'" class="popup__delete">Удалить</a>
        </div>
        ';
      }
    ?>
    </div>
  </section>
</body>

</html>
