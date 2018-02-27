<?php
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


      public function addWorker($name, $surName, $position, $salary=0, $description)
      {
          $d = $this->workerModel->addWorker($name, $surName, $position, $salary, $description);
      }


      public function updateWorker($id, $name, $surName, $position, $salary, $description)
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
              echo '<td><button class="btn btn-danger" onclick="delPosition('.$d['id'].')">
                       <i class="fa fa-user-times"></i></button></td>';
              echo '</tr>';
              $i++;
          }
      }

      public function echoWorker($id)
      {
          // Get positions
          $data = $this->workerModel->showWorker($id);

          echo '{"id":"'.$data['id'].'", "name":"'.$data['name'] . '", "surname":"'.$data['surname'] . '", "position_id":"'.$data['position_id']. '", "salary":"'.$data['salary'] . '", "Characteristics":"'.$data['Characteristics'].'"}';
      }
  }
