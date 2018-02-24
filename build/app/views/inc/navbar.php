<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
      <a class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active" id="home-pg">
            <a class="nav-link" href="<?php echo URLROOT; ?>">Домашняя</a>
          </li>
          <li class="nav-item"  id="workers-pg">
            <a class="nav-link" href="<?php echo URLROOT; ?>/pages/workers">Работники</a>
          </li>
          <li class="nav-item" id="positions-pg">
            <a class="nav-link" href="<?php echo URLROOT; ?>/positions/showPositions">Должности</a>
          </li>
        </ul>
        <!-- <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="">About</a>
          </li>
        </ul> -->

      </div>
    </nav>
