<?php require APPROOT . '/views/inc/header.php'; ?>
<!-- HOME SECTION -->
 <header id="home-section">
   <div class="dark-overlay">
     <div class="home-inner">
       <div class="container">
         <div class="row">
           <div class="col-lg-8 d-none d-lg-block">
             <h1 class="display-4">Программа <strong><?php echo $data['title']; ?></strong> cоздана для <strong>AXIOMA</strong></h1>
             <div class="d-flex flex-row">
               <div class="p-4 align-self-start">
                 <i class="fa fa-check"></i>
               </div>
               <div class="p-4 align-self-end">
                 Проложение использует паттерн MVC  — схему разделения данных, пользовательского интерфейса и управляющей логики.
               </div>
             </div>

             <div class="d-flex flex-row">
               <div class="p-4 align-self-start">
                 <i class="fa fa-check"></i>
               </div>
               <div class="p-4 align-self-end">
                 При создании использовались современные Front-end технологии: GULP, SASS, ECMAScript 6, Babel, Bootstrap 4.0.
               </div>
             </div>

             <div class="d-flex flex-row">
               <div class="p-4 align-self-start">
                 <i class="fa fa-check"></i>
               </div>
               <div class="p-4 align-self-end">
                 Доступ к базе данных осуществляется с помощью PDO, что обеспечивает единые методы для работы с различными БД.
               </div>
             </div>
           </div>
           <div class="col-lg-4">
             <div class="card bg-primary text-center card-form">
                 <img class="card-img-top  d-none d-lg-block" src="<?php echo URLROOT; ?>/img/meeting.jpg" alt="meeting">
                 <div class="card-body">
                     <h4 class="card-title">HRD Dashboard</h4>
                      <p class="d-block d-lg-none py-2"><i class="fa fa-users"></i></p>
                      <a href="<?php echo URLROOT; ?>/positions/showPositions" class="btn btn-outline-light btn-block d-none d-lg-block">Редактировать должности</a>
                      <a href="<?php echo URLROOT; ?>/Workers/showWorkers" class="btn btn-outline-light btn-block mt-4  d-none d-lg-block">Редактировать работников</a>
                      <a href="<?php echo URLROOT; ?>/positions/showPositions" class="btn btn-outline-light btn-block d-block d-lg-none ">Должности</a>
                      <a href="<?php echo URLROOT; ?>/Workers/showWorkers" class="btn btn-outline-light btn-block mt-4  d-block d-lg-none ">Работники</a>
                 </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </header>

 <!-- photo-section -->
  <section id="photo-section">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <div class="py-5">
            <h2 class="display-4">Фотографии</h2>
            <p class="lead">
              Фотографии взяты с сайта pixels.com. Имиджи распространяются по лицензии CC0 которая предполагает бесплатное
              использование для любых целей. Особая благодарность  <a href="https://www.pexels.com/photo/people-coffee-meeting-team-7096/"> Eric Bailey,</a>  <a href="https://www.pexels.com/photo/adult-book-business-cactus-297755/">rawpixel.com</a></p>
            <a href="https://www.pexels.com/photo-license/" class="btn btn-outline-secondary">Узнать больше</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- EXPLORE SECTION -->
  <section id="explore-section" class="bg-light text-muted py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="<?php echo URLROOT; ?>/img/explore-section1.jpg" alt="" class="img-fluid mb-3 rounded-circle">
        </div>
        <div class="col-md-6">
          <h3>Должности & Работники</h3>
          <p>Сайт состоит из двух основых разделов: должности и работники.</p>
          <div class="d-flex flex-row">
            <div class="p-4 align-self-start">
              <i class="fa fa-check"></i>
            </div>
            <div class="p-4 align-self-end">
              Раздел <b>должности</b> обеспечивает просмотр должностей, позволяет редактировать и удалять должности, а также добавлять новые.
            </div>
          </div>

          <div class="d-flex flex-row">
            <div class="p-4 align-self-start">
              <i class="fa fa-check"></i>
            </div>
            <div class="p-4 align-self-end">
                Раздел <b>работники</b> обеспечивает просмотр, редактирование, удаление и добавление работников. Pеализована возможность  сортировки работников по любому полю.
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CREATE HEAD -->
  <section id="create-head-section" class="bg-primary">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <div class="py-5">
            <h2 class="display-4">Итог</h2>
            <p class="lead">Создано легко масштабируемое приложение, с использованием современных технологий. Код сайта, MySQL дамп базы данных, подробное описание задания размещены на Git Hub.</p>
            <a href="https://github.com/DmitriyShaydurov/axioma" class="btn btn-outline-light">Cмотреть на Git Hub</a>
          </div>
        </div>
      </div>
    </div>
  </section>
<script>const pageName='home';</script>
<?php $title=''; require APPROOT . '/views/inc/footer.php'; ?>
