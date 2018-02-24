
const posList = document.querySelector('.collection');


//ajax call
function ajaxGet(vars) {


  let hr = new XMLHttpRequest();

  hr.open('GET', vars, true);
  hr.onreadystatechange = function () {
        if (hr.readyState == 4 && hr.status ==  200) {
          // let response = hr.responseText;
          showPositions();
          //console.log('response from ajax');
        }
      };

  hr.send(vars);

}

function delPosition(id) {

  let vars = `${urlRoot}/positions/deletePosition/${id}`;

  ajaxGet(vars);
}

function showPositions() {

  let vars = `${urlRoot}/positions/echoPositions/`;
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

function viewPosition(id) {
  let description = document.getElementById('upd-description');
  let posId = document.getElementById('upd-id');
  let name = document.getElementById('upd-pos-name');
  console.log(description);
  let vars = `${urlRoot}/positions/echoPosition/${id}`;
  let hr = new XMLHttpRequest();
  hr.open('GET', vars, true);
  hr.onreadystatechange = function () {
        if (hr.readyState == 4 && hr.status ==  200) {
          let response = JSON.parse(hr.responseText);
          description.value = response.description;
          posId.value = response.id;
          name.value = response.name;
        }
      };

  hr.send(vars);

}

function addPosition() {
  let name =   document.getElementById('pos-name').value;
  let description =  document.getElementById('description').value;
  let vars = `${urlRoot}/positions/addPosition/${name}/${description}`;
  ajaxGet(vars);
}

function updatePosition() {
  let name =  document.getElementById('upd-pos-name').value;
  let description =  document.getElementById('upd-description').value;
  let id =  document.getElementById('upd-id').value;
  let vars = `${urlRoot}/positions/updatePosition/${id}/${name}/${description}`;
  console.log(vars);
  ajaxGet(vars);
}


// import{ Core } from './Core.js';
// let core = new Core(urlRoot, 'workers');

// clearTasks();document.
