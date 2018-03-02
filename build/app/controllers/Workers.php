<?php
/*
 * Cotroller for workers view
 * Prepares data CRUD operations
 * Loads views and models
 * function names are pretty much self explanatory, so if you see name deliteWorker
 * function does just that : delites worker)
 */
  class Workers extends Controller
  {
      public function __construct()
      {
          $this->workerModel = $this->model('Worker');
      }

      public function showWorkers()
      {
          // Get workers
          $data = $this->workerModel->getWorkers();
          $pos =  $this->workerModel-> getPositions();
          $data=[
            'workers'    => $data,
            'positions'  => $pos
          ];

          // Load view
          $this->view('editors/worker', $data);
      }

      public function deleteWorker($id)
      {
          $d = $this->workerModel->deleteWorker($id);
      }


      public function addWorker($name, $surName, $position, $salary=0, $description=' ')
      {
          $d = $this->workerModel->addWorker($name, $surName, $position, $salary=0, $description);
      }


      public function updateWorker($id, $name, $surName, $position, $salary=0, $description=' ')
      {
          $d = $this->workerModel->updateWorker($id, $name, $surName, $position, $salary, $description);
      }

      public function echoWorkers($sort='ASC', $pos='id')
      {

          // Get workers
          $data = $this->workerModel->getWorkers($sort, $pos);

          // form view
          $i=1;
          foreach ($data as $d) {
              echo '<tr id="'.$d['id'].'">';
              echo '<th scope="row">'.$i.'</th>';
              echo '<td>'.$d['name'].'</td>';
              echo '<td>'.$d['surname'].'</td>';
              echo '<td>'.$d['pos_name'].'</td>';
              echo '<td>'.$d['salary'].'</td>';
              echo '<td><button  class="btn btn-info" data-toggle="modal" data-target="#editModal" onclick="viewPosition('.$d['id'].')">
                       <i class="fa fa-edit"></i></button></td>';
              echo '<td><button class="btn btn-danger  d-none d-lg-block" onclick="delPosition('.$d['id'].')">
                       <i class="fa fa-user-times"></i></button></td>';
              echo '</tr>';
              $i++;
          }
      }

      public function echoWorker($id)
      {
          // Get positions
          $data = $this->workerModel->showWorker($id);

          // Prepare JSON answer for a View
          echo '{"id":"'.$data['id'].'", "name":"'.$data['name'] . '", "surname":"'.$data['surname'] . '", "position_id":"'.$data['position_id']. '", "salary":"'.$data['salary'] . '", "Characteristics":"'.$data['Characteristics'].'"}';
      }

      public function checkWorker($name, $sname, $salary=0)
      {
          $ok=true;
          $moneyPattern      =  '/^[0-9]{1}[\d]*[.]{0,1}\d{0,2}$/'; // XX.XX
          $lettersOnlyPattern = '/^[a-zа-яё]+$/iu'; //letters no spases

          $fields = array(
          'name'=>preg_match($lettersOnlyPattern, $name, $matches, PREG_OFFSET_CAPTURE),
          'sname'=>preg_match($lettersOnlyPattern, $sname, $matches, PREG_OFFSET_CAPTURE),
          'salary'=>preg_match($moneyPattern, $salary, $matches, PREG_OFFSET_CAPTURE)
           );

          foreach ($fields as $field) {
              if (!$field) {
                  $ok=false;
              }
          }
          if ($ok) {
              echo "ok";
          } else {
              echo "no";
          }
      }
  }
