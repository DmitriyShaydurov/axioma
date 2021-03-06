
const posList     = document.querySelector('.collection');// get tbody
const delAction   = '/Workers/deleteWorker/';//controller&model call for delete action
const showAction  = '/Workers/echoWorkers/';//controller&model call for show action
const tableHeader = document.getElementById('tbl-header').innerHTML;// get tr

//initialize params for show method
let showParams  = '';

//initialize varibles for sort buttons
let sortNameBtn  = '';
let sortSnameBtn = '';
let sortPosBtn   = '';
let sortSalBtn   = '';

// Make Ajax call to server to get current workers list
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

//Prepare & send call of addWorker controller method
function addWorker(name, surName, position, salary, description) {

  let vars =
  `${urlRoot}/Workers/addWorker/${name}/${surName}/
  ${position}/${salary}/${description}`;
  ajaxGet(vars);
}

//Prepare & send call of updateWorker controller method
function updateWorker(wId, name, surName, position, salary, description) {

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

//Prepare parameters for getWorkers model method & send them to server
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
    showParams = `${sortSalBtn}/salary`;}

  showPositions();

}

//Validate if all fields set OK
function allFieldsOk(fieldNames) {

  if (checked(fieldNames[0], lettersOnlyPattern) &&
      checked(fieldNames[1], lettersOnlyPattern) &&
      checked(fieldNames[2], moneyPattern)) {
    return true;
  }else {
    return false;
  }
}

// perform server check,if passed - run addWorker or updateworker metod
// if not passed display message
function serverCheck(add) {
  let name;
  let wId;
  let surName;
  let position;
  let salary;
  let description;

  if (add) {
    name        =   document.getElementById('wrkr-name').value;
    surName     =   document.getElementById('wrkr-sur-name').value;
    position    =   document.getElementById('wrkr-pos').value;
    salary      =   document.getElementById('wrkr-slr').value;
    description =   document.getElementById('wrkr-desc').value;
  }else {
    wId         =   document.getElementById('upd-id').value;
    name        =   document.getElementById('upd-name').value;
    surName     =   document.getElementById('upd-sur-name').value;
    position    =   document.getElementById('upd-pos').value;
    salary      =   document.getElementById('upd-slr').value;
    description =   document.getElementById('upd-desc').value;
  }

  let vars = `${urlRoot}/Workers/checkWorker/${name}/${surName}/${salary}`;
  let hr = new XMLHttpRequest();
  hr.open('GET', vars, true);
  hr.onreadystatechange = function () {
          if (hr.readyState == 4 && hr.status ==  200) {
            let response = hr.responseText;
            if (response == 'ok') {
              if (add) {
                addWorker(name, surName, position, salary, description);
              } else {
                updateWorker(wId, name, surName, position, salary, description);
              }
            } else {
              //dispay warning message
              let btn = document.getElementById('server-err');
              if (btn.classList.contains('d-none')) {
                btn.classList.remove('d-none');
              }
            }
          }
        };

  hr.send(vars);

}

// set 'add Modal' EventListeners
document.getElementById('wrkr-name').addEventListener('keyup', function (e) {
  checkOk('add-btn', 'add-info', addFieldNames);
});

document.getElementById('wrkr-sur-name').addEventListener('keyup', function (e) {
  checkOk('add-btn', 'add-info', addFieldNames);
});

document.getElementById('wrkr-slr').addEventListener('keyup', function (e) {
  checkOk('add-btn', 'add-info', addFieldNames);
});

// set 'edit Modal' EventListeners
document.getElementById('upd-name').addEventListener('keyup', function (e) {
  checkOk('upd-btn', 'upd-info', updFieldNames);
});

document.getElementById('upd-sur-name').addEventListener('keyup', function (e) {
  checkOk('upd-btn', 'upd-info', updFieldNames);
});

document.getElementById('upd-slr').addEventListener('keyup', function (e) {
  checkOk('upd-btn', 'upd-info', updFieldNames);
});
