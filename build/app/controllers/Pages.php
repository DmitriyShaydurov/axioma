<?php
/*
 * Cotroller for pages which do not require db access
 * Loads views
 */
  class Pages extends Controller
  {
      public function index()
      {
          $data = [
          'title' => 'HR Department',
          'description' => 'Создано легко масштабируемое приложение, с использованием современных технологий. Код сайта, MySQL дамп базы данных, подробное описание задания размещены на Git Hub.'
          ];

          $this->view('pages/index', $data);
      }
  }
