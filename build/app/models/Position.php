<?php
/*
 * Model for position view
 * Perfoms CRUD operations
 * function names are pretty much self explanatory, so if you see name  getPositions
 * function does just that : gets positions from db)
 */
  class Position
  {
      private $db;

      public function __construct()
      {
          $this->db = new Database;
      }

      public function getPositions()
      {
          $this->db->query('SELECT * FROM position');

          $results = $this->db->resultSet();

          return $results;
      }

      public function addPosition($position, $description=' ')
      {
          $this->db->query('INSERT INTO position (pos_name, description) VALUES(:name, :description)');
          // Bind values
          $this->db->bind(':name', $position);
          $this->db->bind(':description', $description);

          // Execute
          if ($this->db->execute()) {
              return true;
          } else {
              return false;
          }
      }

      public function deletePosition($id)
      {
          $this->db->query('DELETE FROM position WHERE id = :id');
          // Bind values
          $this->db->bind(':id', $id);

          // Execute
          if ($this->db->execute()) {
              return true;
          } else {
              return false;
          }
      }


      public function showPosition($id)
      {
          $this->db->query('SELECT * FROM position WHERE id= :id');

          // Bind values
          $this->db->bind(':id', $id);

          $results = $this->db->single();

          return $results;
      }

      public function updatePosition($data)
      {
          $this->db->query('UPDATE position SET pos_name = :name, description = :description WHERE id = :id');
          // Bind values
          $this->db->bind(':id', $data['id']);
          $this->db->bind(':name', $data['name']);
          $this->db->bind(':description', $data['description']);

          // Execute
          if ($this->db->execute()) {
              return true;
          } else {
              return false;
          }
      }
  }
