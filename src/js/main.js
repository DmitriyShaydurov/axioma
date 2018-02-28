// prepare regExps for validation
const lettersPattern = /^[a-zа-яё\s]+$/iu; //letters only
const moneyPattern      =  /^[1-9]{1}[\d]*[.]{0,1}\d{0,2}$/; // XX.XX
const lettersOnlyPattern = /^[a-zа-яё]+$/iu; //letters no spases

// make current navbar link active
function activePage() {

  const items = document.querySelectorAll('ul.navbar-nav li.nav-item');

  //remove active state
  items.forEach(function (item, index) {
    item.classList.remove('active');
  });

  // add active state for current page
  switch (pageName) {
    case 'workers':       items[1].classList.add('active');
      break;
    case 'positions':     items[2].classList.add('active');
      break;
    case 'home':          items[0].classList.add('active');
  }
}

// Make AJAX call to controller and show results
function ajaxGet(vars) {

  let hr = new XMLHttpRequest();
  hr.open('GET', vars, true);
  hr.onreadystatechange = function () {
        if (hr.readyState == 4 && hr.status ==  200) {
          showPositions();
        }
      };

  hr.send(vars);
  console.log('from ajaxGet' + vars);
}

function delPosition(id) {
  let vars = urlRoot + delAction + id;
  ajaxGet(vars);
}

function showPositions() {

  let vars = urlRoot + showAction + showParams;
  let hr = new XMLHttpRequest();

  hr.open('GET', vars, true);
  hr.onreadystatechange = function () {
        if (hr.readyState == 4 && hr.status ==  200) {
          let response = hr.responseText;
          posList.innerHTML = response;
        }
      };

  hr.send(vars);
}

// hide or show specifyed button and show information lines
function checkOk(button, infLine, funct) {
  let but = document.getElementById(button);
  let inf = document.getElementById(infLine);
  let ok;

  switch (funct) {

  case 'add':
    ok = allAddFieldsOk();
    break;
  case 'edit':
    ok = allEditFieldsOk();}

  if (ok) {

    inf.classList.remove('bg-info');
    inf.classList.add('bg-success');
    inf.innerHTML = 'Форма готова к отправке';

    but.classList.remove('d-none');
    return true;
  }else {
    inf.classList.remove('bg-success');
    inf.classList.add('bg-info');
    inf.innerHTML = 'Заполните форму для выполнения операции';
    but.classList.add('d-none');
    return false;
  }
}

function checked(id, pattern) {
  let ok = false;
  let name = document.getElementById(id);
  let re = pattern; //assign RegExp

  if (re == moneyPattern && name.value == '') {
    if (name.classList.contains('is-invalid')) {
      name.classList.remove('is-invalid');
      name.classList.add('is-valid');
    }

    ok = true;
    return ok;
  }

  //if (text) {re = /^[a-zа-яё]+$/iu;} else {re = /^[1-9]{1}[\d]*[,]{0,1}\d{0,2}$/;}

     // '/^[a-zа-яё\s]+$/iu' c пробелами



  if (!re.test(name.value)) {
    if (!name.classList.contains('is-invalid')) {
      name.classList.add('is-invalid');
      ok = false;
    }
  }else {
    ok = true;
    if (name.classList.contains('is-invalid')) {
      name.classList.remove('is-invalid');
    }

    if (!name.classList.contains('is-valid')) {
      name.classList.add('is-valid');
    }
  }

  return ok;
}



activePage();
