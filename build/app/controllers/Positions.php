<?php
  class Positions extends Controller
  {
      public function __construct()
      {
          $this->positionModel = $this->model('Position');
      }

      public function showPositions()
      {
          // Get positions
          $data = $this->positionModel->getPositions();

          // Load view
          $this->view('editors/position', $data);
          // }
      }

      public function deletePosition($id)
      {
          $d = $this->positionModel->deletePosition($id);
      }

      public function addPosition($name, $description=' ')
      {
          $d = $this->positionModel->addPosition($name, $description);
      }

      public function updatePosition($id, $name, $description=' ')
      {
          $data['id']=          $id;
          $data['name']=        $name;
          $data['description']= $description;

          $d = $this->positionModel->updatePosition($data);
      }

      public function echoPositions()
      {
          // Get positions
          $data = $this->positionModel->getPositions();

          // form view

          $i=1;
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
          }
      }

      public function echoPosition($id)
      {
          // Get positions
          $data = $this->positionModel->showPosition($id);

          echo '{"id":"'.$data['id'].'", "name":"'.$data['pos_name'].'", "description":"'.$data['description'].'"}';
      }

      public function checkPosition($field)
      {
          $r = preg_match('/^[a-zа-яё]+$/iu', 'foobarb', $matches, PREG_OFFSET_CAPTURE);

          if ($r) {
              echo 'ok'; // valid
          } else {
              echo 'no'; // not valid
          }
      }
  }
