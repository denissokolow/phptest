<?php

include 'func.php';

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
                        foreach ($res_pat as $res) { ?>
                            <tr>
                                <td><small><?php echo $res->id; ?></small></td>
                                <td><small><?php echo $res->part; ?></small></td>
                                <td><small><?php echo $res->var_one; ?></small></td>
                                <td><small><?php echo $res->adress; ?></small></td>
                                <td><small><?php echo $res->var_two; ?></small></td>
                                <td><small><?php echo $res->appoint; ?></small></td>
                                <td><small><?php echo $res->var_three; ?></small></td>
                                <td><small><?php echo $res->in_curr; ?></small></td>
                                <td><small><?php echo $res->artic; ?></small></td>
                                <td>
                                    <a href="" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#use_filter<?php echo $res->id; ?>"><small>Применить</small></a>
                                    <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?php echo $res->id; ?>"><small><i class="fa fa-trash"></i></small></a>
                            </tr>

                            <!-- Modal delete filter-->
                            <div class="modal fade" id="delete<?php echo $res->id; ?>" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Удалить расходный ордер №<?php echo $res->id; ?>?</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="?id=<?php echo $res->id; ?>" method="post">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                                <button type="submit" class="btn btn-danger" name="delete_st">Удалить</button>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- Modal delete filter-->

                            <!-- Modal use filter-->
                            <div class="modal fade" id="use_filter<?php echo $res->id; ?>" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Применить фильтр №<?php echo $res->id; ?>?</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="?id=<?php echo $res->id; ?>" method="post">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                                <button type="submit" class="btn btn-success" name="use_filter">Применить</button>
                                            </form>
                                        </div>
                                    </div>
                                <?php } ?>
                                </div>
                            </div>
                            <!-- Modal use filter-->
                        </tbody>
                </table>
                <form action="" method="post">
                    <table class="table table-success table-striped">
                        <thead>
                            <tr>
                                <td>...</td>
                                <td>
                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="contragent">
                                        <option selected>Контрагент</option>
                                        <?php
                                        foreach ($result_cont as $res) { ?>
                                            <option><?php echo $res->contragent; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="var_one">
                                        <option selected>Условие 1</option>
                                        <option value="AND">И</option>
                                        <option value="OR">ИЛИ</option>
                                        <option value="NOT">И НЕ</option>
                                    </select>
                                </td>
                                <td>
                                <td>
                                    <input class="form-control form-control-sm" type="text" placeholder="Адрес" name="adress">
                                </td>
                                </td>
                                <td>
                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="var_two">
                                        <option selected>Условие 2</option>
                                        <option value="IN">И СОДЕРЖИТ</option>
                                        <option value="NOT IN">И НЕ СОДЕРЖИТ</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="naznachenie">
                                        <option selected>Назначение платежа</option>
                                        <?php
                                        foreach ($result_naz as $res) { ?>
                                            <option><?php echo $res->naznachenie; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="var_three">
                                        <option selected>Условие 3</option>
                                        <option value="IN">И СОДЕРЖИТ</option>
                                        <option value="NOT IN">И НЕ СОДЕРЖИТ</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="valuta">
                                        <option selected>Приход валюта</option>
                                        <?php
                                        foreach ($result_val as $res) { ?>
                                            <option><?php echo $res->valuta; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="statya">
                                        <option selected>Статья расходов</option>
                                        <?php
                                        foreach ($result_sta as $res) { ?>
                                            <option><?php echo $res->statya; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td>...</td>
                            </tr>
                        </thead>
                    </table>
                    <button type="submit" class="btn btn-secondary" name="create_st"><small>Сохранить фильтр</small></button>
                    <button type="submit" class="btn btn-secondary" name="upd_pay"><small>Применить фильтр</small></button>
                    <button type="button" class="btn btn-secondary" onclick="window.location='http://phptestwork/'"><small>Назад</small></button>
                </form>
            </div>


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