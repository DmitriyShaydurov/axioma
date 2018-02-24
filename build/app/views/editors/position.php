<?php require APPROOT . '/views/inc/header.php'; ?>
<?php $title='Должности'; require APPROOT . '/views/inc/inner-header.php'; ?>


<!-- Positions -->
  <section  class="d-none d-md-block mt-4" id="posts">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card text-dark bg-light">
            <div class="card-header">
              <h4>Cписок должностей</h4>
              <a href="details.html" class="btn btn-success" data-toggle="modal" data-target="#addModal" >
                <i class="fa fa-users"></i> Добавить
              </a>
            </div>

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
                      // echo '<td><a href="details.html" class="btn btn-danger" id="'.$d['id'] .'">
                      echo '<td><button class="btn btn-danger" onclick="delPosition('.$d['id'].')">
                           <i class="fa fa-user-times"></i></button></td>';
                      echo '</tr>';
                      $i++;
                  } ?>
                  </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

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
            </div>

            <div class="form-group">
              <label >Описание должности</label>
              <textarea  id="description" class="form-control"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
          <input type="submit" value= "Добавить" class="btn btn-success" data-dismiss="modal" onclick="addPosition()">
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
        <div class="modal-footer">
          <button class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
          <button id="save-pos" class="btn btn-primary" data-dismiss="modal" onclick="updatePosition()">Сохранить</button>
        </div>
      </div>
    </div>
  </div>

  </section>
<script>const pageName='positions';</script>
<?php require APPROOT . '/views/inc/footer.php'; ?>
