
const posList = document.querySelector('.collection');
const delAction = '/Workers/deleteWorker/';
const showAction  = '/Workers/echoWorkers/';

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
          console.log(hr.responseText);
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
  let name        =   document.getElementById('wrkr-name').value;
  let surName     =   document.getElementById('wrkr-sur-name').value;
  let position    =   document.getElementById('wrkr-pos').value;
  let salary      =   document.getElementById('wrkr-slr').value;
  let description =   document.getElementById('wrkr-desc').value;

  let vars = `${urlRoot}/Workers/addWorker/${name}/${surName}/${position}/${salary}/${description}`;
  ajaxGet(vars);
}

function updateWorker() {
  let wId         =   document.getElementById('upd-id').value;
  let name        =   document.getElementById('upd-name').value;
  let surName     =   document.getElementById('upd-sur-name').value;
  let position    =   document.getElementById('upd-pos').value;
  let salary      =   document.getElementById('upd-slr').value;
  let description =   document.getElementById('upd-desc').value;

  let vars = `${urlRoot}/Workers/updateWorker/${wId}/${name}/${surName}/${position}/${salary}/${description}`;
  console.log(vars);
  ajaxGet(vars);
}

// import{ Core } from './Core.js';
// let core = new Core(urlRoot, 'workers');

// clearTasks();document.
