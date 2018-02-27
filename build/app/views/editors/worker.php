<?php require APPROOT . '/views/inc/header.php'; ?>
<?php $title='Работники'; require APPROOT . '/views/inc/inner-header.php'; ?>


<!-- Workers -->
  <section  class=" mt-4" id="posts">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card text-dark bg-light d-none d-md-block">
            <div class="card-header">
              <h4>Cписок работников</h4>
              <a href="details.html" class="btn btn-success" data-toggle="modal" data-target="#addModal" >
                <i class="fa fa-users"></i> Добавить
              </a>
            </div>

            <table class="table  table-striped">
              <thead class="thead-inverse">
                <tr id="tbl-header">
                  <th>#</th>
                  <th id="name-btn">Имя <button  class="btn btn-outline-secondary btn-sm"  onclick="sort('name')">
                           <i class="fa fa-sort"></i></button></th>
                  <th id="sur-name-btn">Фамилия <button  class="btn btn-outline-secondary btn-sm"  onclick="sort('sname')">
                           <i class="fa fa-sort"></i></button></th>
                  <th id="pos-btn">Должность <button  class="btn btn-outline-secondary btn-sm"  onclick="sort('pos')">
                           <i class="fa fa-sort"></i></button></th>
                  <th id="salary-btn">З/п <button  class="btn btn-outline-secondary btn-sm"  onclick="sort('sal')">
                           <i class="fa fa-sort"></i></button></th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody class="collection">

              <?php $i=1;
                  $workers=$data['workers'];
                  foreach ($workers as $d) {
                      echo '<tr id="'.$d['id'].'">';
                      echo '<th scope="row">'.$i.'</th>';
                      echo '<td>'.$d['name'].'</td>';
                      echo '<td>'.$d['surname'].'</td>';
                      echo '<td>'.$d['pos_name'].'</td>';
                      echo '<td>'.$d['salary'].'</td>';
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
            <?php require APPROOT . '/views/inc/notice.php'; ?>
        </div>
      </div>
    </div>

  <!-- Add MODAL -->
  <div class="modal fade" id="addModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title"><i class="fa fa-users"></i> Добавить работника</h5>
          <button class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
          <form>
          <div class="row">
            <div class="col-lg-6 form-group">
              <label>Имя</label>
              <input type="text" id="wrkr-name" class="form-control">
              <div class="invalid-feedback">Обязательное поле, допустимы буквы без пробелов.</div>

            </div>
            <div class="col-lg-6 form-group">
              <label >Фамилия</label>
               <input type="text" id="wrkr-sur-name" class="form-control">
               <div class="invalid-feedback">Обязательное поле, допустимы буквы без пробелов.</div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 form-group">
              <label>Должность</label>
              <select id="wrkr-pos" class="form-control">
                <?php
                  $positions = $data['positions'];
                    foreach ($positions as $p) {
                        echo '<option value="'.$p['id'].'">'.$p['pos_name'].'</option>';
                    }
                 ?>
              </select>

            </div>
            <div class="col-lg-6 form-group">
              <label >Зарплата в 	&#8364;</label>
               <input type="text" id="wrkr-slr" class="form-control">
               <div class="invalid-feedback">Введите число в формате XXX,XX</div>
            </div>
          </div>
            <div class="form-group">
              <label >Характеристика</label>
              <textarea  id="wrkr-desc" class="form-control"></textarea>
            </div>
          </form>
        </div>
        <span id='add-info' class="text-center bg-info text-white">Для добавления работника корректно заполните форму</span>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
          <button id= "add-btn" class="btn btn-success d-none" data-dismiss="modal" onclick="addWorker()">Добавить</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit MODAL -->
  <div class="modal fade" id="editModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info text-white">
          <h5 class="modal-title"><i class="fa fa-users"></i> Редактировать работника</h5>
          <button class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
          <form>
          <div class="row">
            <div class="col-lg-6 form-group">
              <label>Имя</label>
              <input type="text" id="upd-name" class="form-control">
            </div>
            <div class="col-lg-6 form-group">
              <label >Фамилия</label>
               <input type="text" id="upd-sur-name" class="form-control">
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 form-group">
              <label>Должность</label>
              <select id="upd-pos" class="form-control">
                <?php
                  $positions = $data['positions'];
                    foreach ($positions as $p) {
                        echo '<option value="'.$p['id'].'">'.$p['pos_name'].'</option>';
                    }
                 ?>
              </select>
            </div>
            <div class="col-lg-6 form-group">
              <label >Зарплата</label>
               <input type="text" id="upd-slr" class="form-control">
            </div>
          </div>
            <div class="form-group">
              <label >Характеристика</label>
              <textarea  id="upd-desc" class="form-control"></textarea>
            </div>
            <input type="text" id="upd-id" class="form-control d-none">
          </form>
        </div>
        <div  class="modal-footer">
          <button class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
          <button class="btn btn-info" data-dismiss="modal" onclick="updateWorker()">Сохранить</button>
        </div>
      </div>
    </div>
  </div>


  </section>
<script>const pageName='workers';</script>
<?php require APPROOT . '/views/inc/footer.php'; ?>
