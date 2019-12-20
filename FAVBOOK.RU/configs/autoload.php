<?php
require_once $_SERVER['DOCUMENT_ROOT']."/favbook.ru/functions/logger.php";
Logger::log_visit();

function navbar(){
    require_once "includes\\navbar.html";
}
function navbar_changedir(){
    require_once "..\includes\\navbar_changedir.html";
}
function default_bootstrap_head(){
    echo '    
    <link rel="stylesheet" href="css\bootstrap.min.css">
    <script src="js\bootstrap.min.js"></script>
    
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    ';
}
function default_head(){
    echo '    
    <link rel="stylesheet" href="css\bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="js\bootstrap.min.js"></script>
    
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    ';
}

function head_changedir(){
    echo '    
    <link rel="stylesheet" href="..\css\bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="..\js\bootstrap.min.js"></script>
    
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    ';
}
function feedback(){
    echo'
    
    <!-- Форма обратной связи в модальном окне -->
    <div class="modal" id="feedbackFormModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Форма обратной связи</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <!-- Форма обратной связи -->
                    <form id="form" method="post" action="handlers\feedback.php" enctype="multipart/form-data" novalidate>
                        <!-- Сообщение пользователя -->
                        <div class="form-group">
                            <label for="message" class="control-label">Сообщение</label>
                            <textarea id="message" name="message" class="form-control"
                                      rows="3" placeholder="Сообщение" minlength="20"
                                      maxlength="500" required="required"></textarea>
                            <div class="invalid-feedback"></div>
                        </div>
                        <!-- Сообщение -->
                        <div class="alert alert-danger form-error d-none">
                            Произошли ошибки! Исправьте их и отправьте форму ещё раз.
                        </div>
                        <!-- Индикация загрузки данных формы на сервер -->
                        <div class="progress mb-2 d-none">
                            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                                 aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0">
                                <span class="sr-only">0%</span>
                            </div>
                        </div>
                        <!-- Кнопка для отправки формы -->
                        <button type="submit" class="btn btn-primary float-right" id="send">Отправить
                            сообщение
                        </button>
                        <span style="color: #6f42c1" id="alert"></span>
                    </form>
            </div>
        </div>
    </div>
</div>
    ';
}

function cabinet_nav(){
    echo'
    <div class="btn-group">
    <a href="cart.php" class="btn btn-info">Корзина</a>
    <a href="cabinet.php" class="btn btn-secondary" role="button">
        Профиль
    </a>
    <a href="history.php" class="btn btn-secondary">История заказов</a>
    <a href="#" class="btn btn-secondary">Настройки</a>
    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#feedbackFormModal">Обратная связь</button>
    <a href="handlers\exit.php" class="btn btn-primary">Выйти</a>';

    if($_SESSION['user'] == '1') {
        echo '
            <a href="admincr.php" class="btn btn-success">Редактировать каталог</a>
            <a style="margin-left: 1px;" href="reports.php" class="btn btn-success">Отчёты</a>
            ';
    }

echo '</div>';

feedback();

}
?>