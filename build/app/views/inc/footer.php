  <!-- </div> -->
  <!-- MAIN FOOTER -->
  <footer id="main-footer" class="bg-dark">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <div class="py-2">
            <strong> HR Department</strong> v : <?php echo APPVERSION; ?><br>
            Created by Dmitriy Shaydurov
          </div>
        </div>
      </div>
    </div>
  </footer>
<script>const urlRoot='<?php echo URLROOT;?>';</script>
<script src="<?php echo URLROOT; ?>/js/jquery.min.js"></script>
<script src="<?php echo URLROOT; ?>/js/popper.min.js"></script>
<script src="<?php echo URLROOT; ?>/js/bootstrap.min.js"></script>
<script src="<?php echo URLROOT; ?>/js/main.min.js" ></script>

<?php switch ($title) {
    case 'Должности':
        echo '<script src='.URLROOT.'/js/positions.min.js></script>';
        break;
    case'Работники':
        echo '<script src='.URLROOT.'/js/workers.min.js></script>';
        break;
}?>
</body>
</html>
