<?php
/*
 * Model for worker view
 * Perfoms CRUD operations
 * function names are pretty much self explanatory, so if you see name  getWorkers
 * function does just that : gets gets workers from db)
 */

  class Worker
  {
      private $db;

      public function __construct()
      {
          $this->db = new Database;
      }

      public function getWorkers($sort='ASC', $pos='id')
      {
          $this->db->query(
           'SELECT worker.id,  worker.name,  worker.surname,  worker.salary, position.pos_name
            FROM worker
            INNER JOIN position
            ON position.id=worker.position_id
            ORDER BY '.$pos.' '.$sort
            );

          $results = $this->db->resultSet();

          return $results;
      }

      public function addWorker($name, $surName, $position, $salary=0, $description)
      {
          $this->db->query('INSERT INTO worker (name, surname, position_id, salary, Characteristics)
                            VALUES (:name, :surname, :position_id, :salary, :Characteristics)');
          // Bind values
          $this->db-> bind(':name', $name);
          $this->db-> bind(':surname', $surName);
          $this->db-> bind(':position_id', $position);
          $this->db-> bind(':salary', $salary);
          $this->db-> bind(':Characteristics', $description);

          // Execute
          if ($this->db->execute()) {
              return true;
          } else {
              return false;
          }
      }

      public function deleteWorker($id)
      {
          $this->db->query('DELETE FROM worker WHERE id = :id');
          // Bind values
          $this->db->bind(':id', $id);

          // Execute
          if ($this->db->execute()) {
              return true;
          } else {
              return false;
          }
      }


      public function showWorker($id)
      {
          $this->db->query('SELECT * FROM worker WHERE id= :id');

          // Bind values
          $this->db->bind(':id', $id);

          $results = $this->db->single();

          return $results;
      }

      public function updateWorker($id, $name, $surName, $position, $salary, $description)
      {
          $this->db->query('UPDATE worker SET  name = :name, surname = :surname,
                            position_id=:position, salary=:salary,
                            Characteristics	 = :description WHERE id = :id');
          // Bind values
          $this->db->bind(':id', $id);
          $this->db->bind(':name', $name);
          $this->db->bind(':surname', $surName);
          $this->db->bind(':position', $position);
          $this->db->bind(':salary', $salary);
          $this->db->bind(':description', $description);

          // Execute
          if ($this->db->execute()) {
              return true;
          } else {
              return false;
          }
      }

      public function getPositions()
      {
          $this->db->query('SELECT * FROM position');

          $results = $this->db->resultSet();

          return $results;
      }
  }
