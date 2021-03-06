<?php require APPROOT . '/views/inc/header.php'; ?>
<?php $title='Должности'; require APPROOT . '/views/inc/inner-header.php'; ?>


<!-- Positions -->
  <section  class="my-4" id="posts">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card text-dark bg-light d-none d-md-block">
            <div class="card-header">
              <h4>Cписок должностей</h4>
              <a href="details.html" class="btn btn-success" data-toggle="modal" data-target="#addModal" >
                <i class="fa fa-users"></i> Добавить
              </a>

            </div>
            <button id="server-err" onclick="serverErr()" class="btn btn-danger btn-block d-none">Должность не добавлена, обратитесь к администратору сервера.</button>
            <table class="table  table-striped">
              <thead class="thead-inverse">
                <tr>
                  <th>#</th>
                  <th>Должности</th>
                  <th>Описание</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody class="collection">

              <?php $i=1;
                  foreach ($data as $d) {
                      echo '<tr id="'.$d['id'].'">';
                      echo '<th scope="row">'.$i.'</th>';
                      echo '<td>'.$d['pos_name'].'</td>';
                      echo '<td>'.$d['description'].'</td>';
                      echo '<td><button  class="btn btn-info" data-toggle="modal" data-target="#editModal" onclick="viewPosition('.$d['id'].')">
                           <i class="fa fa-edit"></i></button></td>';
                      echo '<td><button class="btn btn-danger" onclick="delPosition('.$d['id'].')">
                           <i class="fa fa-user-times"></i></button></td>';
                      echo '</tr>';
                      $i++;
                  } ?>
                  </tbody>
            </table>
          </div>
            <?php require APPROOT . '/views/inc/notice.php'; ?>
      </div>
     </div>
   </div>
  </section>
  <!-- Add MODAL -->
  <div class="modal fade" id="addModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title"><i class="fa fa-users"></i> Добавить должность</h5>
          <button class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
          <form action="<?php echo URLROOT; ?>/editors/position" method="post">
            <div class="form-group">
              <label>Название должности</label>
              <input type="text" id="pos-name" class="form-control">
              <div class="invalid-feedback">Обязательное поле, допустимы только буквы.</div>
            </div>

            <div class="form-group">
              <label >Описание должности</label>
              <textarea  id="description" class="form-control"></textarea>
            </div>
          </form>
        </div>
          <span id='add-info' class="text-center bg-info text-white">Заполните форму для выполнения операции</span>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
          <input id= "add-btn" type="submit" value= "Добавить" class="btn btn-success d-none" data-dismiss="modal" onclick="serverCheck(true)">
        </div>
      </div>
    </div>
  </div>

  <!-- Edit MODAL -->
  <div class="modal fade" id="editModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info text-white">
          <h5 class="modal-title"><i class="fa fa-edit"></i> Редактировать должность</h5>
          <button class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label >Название должности</label>
              <input type="text" id="upd-pos-name" class="form-control">
              <div class="invalid-feedback">Обязательное поле, допустимы только буквы.</div>
            </div>

            <div class="form-group d-none">
              <input type="text" id="upd-id">
            </div>

            <div class="form-group">
              <label>Описание должности</label>
              <textarea  class="form-control" id="upd-description"></textarea>
            </div>
          </form>
        </div>
        <span id='upd-info' class="text-center bg-info text-white">Заполните форму для выполнения операции</span>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
          <button id="save-pos" class="btn btn-primary d-none" data-dismiss="modal" onclick="serverCheck(false)">Сохранить</button>
        </div>
      </div>
    </div>
  </div>
<script>const pageName='positions';</script>
<?php require APPROOT . '/views/inc/footer.php'; ?>
