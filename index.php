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
  <title>Платежи</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <table class="table table-success table-striped">
          <thead>
            <tr>
              <th scope="col"><small>Тип документа</small></th>
              <th scope="col"><small>№</small></th>
              <th scope="col"><small>Дата</small></th>
              <th scope="col"><small>Организация</small></th>
              <th scope="col"><small>Контрагент</small></th>
              <th scope="col"><small>Приход валюта</small></th>
              <th scope="col"><small>Расход валюта</small></th>
              <th scope="col"><small>Назначение платежа</small></th>
              <th scope="col"><small>Статья расходов</small></th>
              <th scope="col"><small>Адрес</small></th>
              <th scope="col"><small></small></th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($result as $res) { ?>
              <tr>
                <td><small><?php echo $res->type; ?></small></td>
                <td><small><?php echo $res->id; ?></small></td>
                <td><small><?php echo $res->time; ?></small></td>
                <td><small><?php echo $res->organization; ?></small></td>
                <td><small><?php echo $res->partner; ?></small></td>
                <td><small><?php echo $res->in_currency; ?></small></td>
                <td><small><?php echo $res->out_currency; ?></small></td>
                <td><small><?php echo $res->appointment; ?></small></td>
                <td><small><?php echo $res->article; ?></small></td>
                <td><small><?php echo $res->project; ?></small></td>
                <td>
                  <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?php echo $res->id; ?>"><small><i class="fa fa-trash"></i></small></a>
              </tr>
              <!-- Modal delete-->
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
                        <button type="submit" class="btn btn-danger" name="delete">Удалить</button>
                      </form>
                    </div>
                  </div>
                <?php } ?>
          </tbody>
        </table>
        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#create"><small>Добавить расходный ордер</small></button>
        <button type="button" class="btn btn-secondary" onclick="window.location='http://phptestwork/stat.php'"><small>Добавить статьи расходов</small></button>
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
              <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="type">
                <option selected>Тип документа</option>
                <?php
                foreach ($result_tip as $res) { ?>
                  <option><?php echo $res->tipdoc; ?></option>
                <?php } ?>
              </select>
              <br>
            </div>
            <div class="form-group">
              <label for="inputDate"><small>Дата документа</small></label>
              <input type="date" class="form-control form-control-sm" name="time">
              <br>
            </div>
            <div class="form-group">
              <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="organization">
                <option selected>Организация</option>
                <?php
                foreach ($result_org as $res) { ?>
                  <option><?php echo $res->organization; ?></option>
                <?php } ?>
              </select>
              <br>
            </div>
            <div class="form-group">
              <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="partner">
                <option selected>Контрагент</option>
                <?php
                foreach ($result_cont as $res) { ?>
                  <option><?php echo $res->contragent; ?></option>
                <?php } ?>
              </select>
              <br>
            </div>
            <div class="form-group">
              <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="in_currency">
                <option selected>Приход валюта</option>
                <?php
                foreach ($result_val as $res) { ?>
                  <option><?php echo $res->valuta; ?></option>
                <?php } ?>
              </select>
              <br>
            </div>
            <div class="form-group">
              <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="out_currency">
                <option selected>Расход валюта</option>
                <?php
                foreach ($result_val as $res) { ?>
                  <option><?php echo $res->valuta; ?></option>
                <?php } ?>
              </select>
              <br>
            </div>
            <div class="form-group">
              <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="appointment">
                <option selected>Назначение платежа</option>
                <?php
                foreach ($result_naz as $res) { ?>
                  <option><?php echo $res->naznachenie; ?></option>
                <?php } ?>
              </select>
              <br>
            </div>
            <div class="form-group">
              <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="article">
                <option selected>Статья расходов</option>
                <?php
                foreach ($result_sta as $res) { ?>
                  <option><?php echo $res->statya; ?></option>
                <?php } ?>
              </select>
              <br>
            </div>
            <div class="form-group">
              <input type="text" placeholder="Адрес" class="form-control form-control-sm" name="project">
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