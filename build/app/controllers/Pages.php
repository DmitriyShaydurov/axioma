<?php

  class Pages extends Controller
  {
      public function __construct()
      {
      }

      public function index()
      {
          $data = [
          'title' => 'HR Department',
          'description' => 'Создано легко масштабируемое приложение, с использованием современных технологий. Код сайта, MySQL дамп базы данных, подробное описание задания размещены на Git Hub.'
          ];

          $this->view('pages/index', $data);
      }

      public function workers()
      {
          $data = [
          'title' => 'Работники',
          'description' => 'Просмотр работников'
          ];

          $this->view('pages/workers', $data);
      }
      // public function positions()
      // {
      //     $data = [
      //     'title' => 'Должности',
      //     'description' => 'Просмотр и корректировка должностей'
      //     ];
      //
      //     $this->view('pages/positions', $data);
      // }
  }
