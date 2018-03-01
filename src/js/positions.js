
const posList     = document.querySelector('.collection');
const delAction   = '/Positions/deletePosition/';
const showAction  = '/Positions/echoPositions/';
const showParams  = '';

function viewPosition(id) {
  let description = document.getElementById('upd-description');
  let posId = document.getElementById('upd-id');
  let name = document.getElementById('upd-pos-name');
  let vars = `${urlRoot}/Positions/echoPosition/${id}`;
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

function addPosition(name, description) {
  // let name =   document.getElementById('pos-name').value;
  // let description =  document.getElementById('description').value;
  let vars = `${urlRoot}/Positions/addPosition/${name}/${description}`;
  ajaxGet(vars);
}

function updatePosition(name, description, id) {
  // let name =  document.getElementById('upd-pos-name').value;
  // let description =  document.getElementById('upd-description').value;
  // let id =  document.getElementById('upd-id').value;
  let vars = `${urlRoot}/positions/updatePosition/${id}/${name}/${description}`;
  ajaxGet(vars);
}

function allFieldsOk(fieldNames) {
  if (checked(fieldNames[0], lettersPattern)) {
    return true;
  }else {
    return false;
  }

}

// perform server check,if passed - run addPosition or updatePosition metod
// if not passed display message
function serverCheck(add) {
  let name;
  let description;
  let id;

  if (add) {
    name =   document.getElementById('pos-name').value;
    description =  document.getElementById('description').value;
  }else {
    name =  document.getElementById('upd-pos-name').value;
    description =  document.getElementById('upd-description').value;
    id =  document.getElementById('upd-id').value;
  }

  let vars = `${urlRoot}/Positions/checkPosition/${name}`;
  let hr = new XMLHttpRequest();
  hr.open('GET', vars, true);
  hr.onreadystatechange = function () {
          if (hr.readyState == 4 && hr.status ==  200) {
            let response = hr.responseText;
            if (response == 'ok') {
              if (add) {
                addPosition(name, description);
              } else {
                updatePosition(name, description, id);
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

// add Modal Event Listener
document.getElementById('pos-name').addEventListener('keyup', function (e) {
  checkOk('add-btn', 'add-info', addWrFieldNames);
});

// edit Modal Event Listener
document.getElementById('upd-pos-name').addEventListener('keyup', function (e) {
  checkOk('save-pos', 'upd-info', updWrFieldNames);
});
