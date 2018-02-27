
const posList     = document.querySelector('.collection');
const delAction   = '/Workers/deleteWorker/';
const showAction  = '/Workers/echoWorkers/';
const tableHeader = document.getElementById('tbl-header').innerHTML;
let showParams  = '';

let sortNameBtn = '';
let sortSnameBtn = '';
let sortPosBtn = '';
let sortSalBtn = '';

function viewPosition(id) {
  let name        =   document.getElementById('upd-name');
  let surName     =   document.getElementById('upd-sur-name');
  let position    =   document.getElementById('upd-pos');
  let salary      =   document.getElementById('upd-slr');
  let description =   document.getElementById('upd-desc');
  let wId         =   document.getElementById('upd-id');

  let vars = `${urlRoot}/Workers/echoWorker/${id}`;
  let hr = new XMLHttpRequest();
  hr.open('GET', vars, true);
  hr.onreadystatechange = function () {
        if (hr.readyState == 4 && hr.status ==  200) {
          // console.log(hr.responseText);
          let response = JSON.parse(hr.responseText);

          name.value        = response.name;
          surName.value     = response.surname;
          position.value    = response.position_id;
          salary.value      = response.salary;
          description.value =  response.Characteristics;
          wId.value         =  response.id;

        }
      };

  hr.send(vars);

}

function addWorker() {

  let name        =   document.getElementById('wrkr-name');
  let surName     =   document.getElementById('wrkr-sur-name');
  let position    =   document.getElementById('wrkr-pos');
  let salary      =   document.getElementById('wrkr-slr');
  let description =   document.getElementById('wrkr-desc');
  let re          =  /^[a-zа-яё\s]+$/iu;

  let vars =
  `${urlRoot}/Workers/addWorker/${name.value}/${surName.value}/
  ${position.value}/${salary.value}/${description.value}`;
  ajaxGet(vars);
}

function updateWorker() {
  let wId         =   document.getElementById('upd-id').value;
  let name        =   document.getElementById('upd-name').value;
  let surName     =   document.getElementById('upd-sur-name').value;
  let position    =   document.getElementById('upd-pos').value;
  let salary      =   document.getElementById('upd-slr').value;
  let description =   document.getElementById('upd-desc').value;

  let vars =
  `${urlRoot}/Workers/updateWorker/${wId}/${name}/${surName}/${position}/${salary}/${description}`;

  ajaxGet(vars);
}

// switch sort buttons
function SortButtonsStatus(btn, btnName) {
  // get innitial status
  let tblHdr = document.getElementById('tbl-header');
  tblHdr.innerHTML = tableHeader;

  // prepare icon & button color
  let carret = '';
  let color = '';

  if (btn == 'DESC') {
    carret = 'fa fa-caret-down';
    color = 'btn-info';

  } else {
    carret = 'fa fa-caret-up';
    color = 'btn-warning';
  }

  // change sort button
  switch (btnName) {
  case 'name':

    let name = document.getElementById('name-btn');
    name.innerHTML =
   `Имя <button class="btn ${color} btn-sm" onclick="sort('name')">
    <i class="${carret}"></i></button>`;
    break;

  case 'sname':
    let surName = document.getElementById('sur-name-btn');
    surName.innerHTML =
    `Фамилия <button class="btn ${color} btn-sm" onclick="sort('sname')">
     <i class="${carret}"></i></button>`;
    break;

  case 'pos':
    let position = document.getElementById('pos-btn');
    position.innerHTML =
    `Должность <button class="btn ${color} btn-sm" onclick="sort('pos')">
    <i class="${carret}"></i></button>`;
    break;

  case 'sal':
    let salary =  document.getElementById('salary-btn');
    salary.innerHTML =
    `З/п <button class="btn ${color} btn-sm" onclick="sort('sal')">
    <i class="${carret}"></i></button>`;}
}

// change btn status from up to down and vice versa
function btnSwitch(btn) {
  switch (btn) {
  case '':
    return 'DESC';
    break;

  case 'DESC':
    return 'ASC';
    break;

  case 'ASC':
    return 'DESC';}
}

// function sortByName() {
//   sortNameBtn = btnSwitch(sortNameBtn);
//   SortButtonsStatus(sortNameBtn, 'name');
//   showParams = `${sortNameBtn}/name`;
//   showPositions();
// }

function sort(param) {

  switch (param) {

  case 'name':
    sortNameBtn = btnSwitch(sortNameBtn);
    SortButtonsStatus(sortNameBtn, param);
    showParams = `${sortNameBtn}/name`;
    break;

  case 'sname':
    sortSnameBtn = btnSwitch(sortSnameBtn);
    SortButtonsStatus(sortSnameBtn, 'sname');
    showParams = `${sortSnameBtn}/surname`;
    break;

  case 'pos':
    sortPosBtn = btnSwitch(sortPosBtn);
    SortButtonsStatus(sortPosBtn, 'pos');
    showParams = `${sortPosBtn}/position.pos_name`;
    break;

  case 'sal':
    sortSalBtn = btnSwitch(sortSalBtn);
    SortButtonsStatus(sortSalBtn, 'sal');
    showParams = `${sortSalBtn}/salary`;
    break;
  }

  showPositions();

}

// function sortBySname() {
//   sortSnameBtn = btnSwitch(sortSnameBtn);
//   SortButtonsStatus(sortSnameBtn, 'sname');
// }
//
// function sortByPos() {
//   sortPosBtn = btnSwitch(sortPosBtn);
//   SortButtonsStatus(sortPosBtn, 'pos');
// }
//
// function sortBySal() {
//   sortSalBtn = btnSwitch(sortSalBtn);
//   SortButtonsStatus(sortSalBtn, 'sal');
// }
//suggest tag input & check it

function checked(id, text) {
  let ok = false;
  let name = document.getElementById(id);
  let re;
  if (!text && name.value == '') {
    if (name.classList.contains('is-invalid')) {
      name.classList.remove('is-invalid');
      name.classList.add('is-valid');
    }

    ok = true;
    return ok;
  }

  if (text) {re = /^[a-zа-яё]+$/iu;} else {re = /^[1-9]{1}[\d]*[,]{0,1}\d{0,2}$/;}

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

function checkOk() {
  let but = document.getElementById('add-btn');
  let inf = document.getElementById('add-info');

  if (checked('wrkr-name', true) &&
      checked('wrkr-sur-name', true) &&
      checked('wrkr-slr', false)) {

    inf.classList.remove('bg-info');
    inf.classList.add('bg-success');
    inf.innerHTML = 'Форма готова к отправке';

    but.classList.remove('d-none');
    return true;
  }else {
    inf.classList.remove('bg-success');
    inf.classList.add('bg-info');
    inf.innerHTML = 'Для добавления работника корректно заполните форму';
    but.classList.add('d-none');
    return false;
  }
}

document.getElementById('wrkr-name').addEventListener('keyup', function (e) {
  let ok = checked('wrkr-name', true);
  checkOk();

});

document.getElementById('wrkr-sur-name').addEventListener('keyup', function (e) {
  checked('wrkr-sur-name', true);
  checkOk();
});

document.getElementById('wrkr-slr').addEventListener('keyup', function (e) {
  checked('wrkr-slr', false);
  checkOk();
});
