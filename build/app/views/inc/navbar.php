<?php $s=explode(' ', SITENAME, 2);
$siteN='<span  class="text-danger font-weight-bold">'.$s[0].'</span> '.$s[1];
?>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
      <a class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo $siteN ; ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse"id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item" id="home-pg">
            <a class="nav-link" href="<?php echo URLROOT; ?>">Домашняя</a>
          </li>
          <li class="nav-item"  id="workers-pg">
            <a class="nav-link" href="<?php echo URLROOT; ?>/Workers/showWorkers">Работники</a>
          </li>
          <li class="nav-item" id="positions-pg">
            <a class="nav-link" href="<?php echo URLROOT; ?>/Positions/showPositions">Должности</a>
          </li>
        </ul>
        <!-- <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="">About</a>
          </li>
        </ul> -->

      </div>
    </nav>
