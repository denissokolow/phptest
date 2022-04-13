<?php
include 'funcstat.php';
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Статьи расходов</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table table-success table-striped">
                    <thead>
                        <tr>
                            <th scope="col"><small>№</small></th>
                            <th scope="col"><small>Контрагент</small></th>
                            <th scope="col"><small>Условие 1</small></th>
                            <th scope="col"><small>Адрес</small></th>
                            <th scope="col"><small>Условие 2</small></th>
                            <th scope="col"><small>Назначение платежа</small></th>
                            <th scope="col"><small>Условие 3</small></th>
                            <th scope="col"><small>Приход валюта</small></th>
                            <th scope="col"><small>Статья расходов</small></th>
                            <th scope="col"><small></small></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($result as $res) { ?>
                            <tr>
                                <td><small><?php echo $res->num; ?></small></td>
                                <td><small><?php echo $res->part; ?></small></td>
                                <td><small><?php echo $res->var_one; ?></small></td>
                                <td><small><?php echo $res->adress; ?></small></td>
                                <td><small><?php echo $res->var_two; ?></small></td>
                                <td><small><?php echo $res->appoint; ?></small></td>
                                <td><small><?php echo $res->var_three; ?></small></td>
                                <td><small><?php echo $res->in_curr; ?></small></td>
                                <td><small><?php echo $res->artic; ?></small></td>
                                <td>
                                    <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?php echo $res->number; ?>"><small><i class="fa fa-trash"></i></small></a>

                            </tr>
                            <!-- Modal delete-->
                            <div class="modal fade" id="delete<?php echo $res->number; ?>" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Удалить расходный ордер №<?php echo $res->number; ?>?</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="?number=<?php echo $res->number; ?>" method="post">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                                <button type="submit" class="btn btn-danger" name="delete">Удалить</button>
                                            </form>
                                        </div>
                                    </div>
                                <?php } ?>
                    </tbody>
                </table>
                <table class="table table-success table-striped">
                    <thead>
                        <tr>
                            <td>...</td>
                            <td>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                    <option selected>Контрагент</option>
                                    <?php
                                    foreach ($respay as $res) { ?>
                                        <option value="1"><?php echo $res->partner; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                    <option selected>Условие 1</option>
                                    <option value="1">И</option>
                                    <option value="2">ИЛИ</option>
                                    <option value="3">И НЕ</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                    <option selected>Адрес</option>
                                    <?php
                                    foreach ($respay as $res) { ?>
                                        <option value="1"><?php echo $res->project; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                    <option selected>Условие 2</option>
                                    <option value="1">И СОДЕРЖИТ</option>
                                    <option value="2">И НЕ СОДЕРЖИТ</option>
                                </select>
                            </td>
                            <td>
                                <input class="form-control form-control-sm" type="text" placeholder="Назначение платежа">
                            </td>
                            <td>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                    <option selected>Условие 3</option>
                                    <option value="1">И СОДЕРЖИТ</option>
                                    <option value="2">И НЕ СОДЕРЖИТ</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                    <option selected>Приход валюта</option>
                                    <?php
                                    foreach ($respay as $res) { ?>
                                        <option value="1"><?php echo $res->in_currency; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                    <option selected>Статья расходов</option>
                                    <option value="1">Аренда</option>
                                    <option value="2">Оплата за товар</option>
                                    <option value="3">Оплата услуг</option>
                                    <?php
                                    foreach ($respay as $res) { ?>
                                        <option value="4"><?php echo $res->article; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td>...</td>
                        </tr>
                    </thead>
                </table>
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#create"><small>Сохранить фильтр</small></button>
                <button type="button" class="btn btn-secondary"><small>Применить фильтр</small></button>
            </div>
        </div>
    </div>
    <!-- Modal add-->
    <div class="modal fade" id="create" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавить расходный ордер</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <small>Тип документа</small>
                            <input type="text" class="form-control" name="type">
                        </div>
                        <div class="form-group">
                            <small>№</small>
                            <input type="text" class="form-control" name="number">
                        </div>
                        <div class="form-group">
                            <small>Время</small>
                            <input type="text" class="form-control" name="time">
                        </div>
                        <div class="form-group">
                            <small>Организация</small>
                            <input type="text" class="form-control" name="organization">
                        </div>
                        <div class="form-group">
                            <small>Контрагент</small>
                            <input type="text" class="form-control" name="partner">
                        </div>
                        <div class="form-group">
                            <small>Приход валюта</small>
                            <input type="text" class="form-control" name="in_currency">
                        </div>
                        <div class="form-group">
                            <small>Расход валюта</small>
                            <input type="text" class="form-control" name="out_currency">
                        </div>
                        <div class="form-group">
                            <small>Назначение платежа</small>
                            <input type="text" class="form-control" name="appointment">
                        </div>
                        <div class="form-group">
                            <small>Статья расходов</small>
                            <input type="text" class="form-control" name="article">
                        </div>
                        <div class="form-group">
                            <small>Адрес</small>
                            <input type="text" class="form-control" name="project">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-primary" name="add">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal add-->

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>