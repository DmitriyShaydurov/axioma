
const posList     = document.querySelector('.collection');// get tbody
const delAction   = '/Positions/deletePosition/';//controller&model call for delete action
const showAction  = '/Positions/echoPositions/';//controller&model call for show action
const showParams  = '';

// prepare url for echoPosition action qnd make a call to server
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

// prepare url for addPosition controller method and make a call to server
function addPosition(name, description) {

  let vars = `${urlRoot}/Positions/addPosition/${name}/${description}`;
  ajaxGet(vars);
}

// prepare url for updatePosition controller method and make a call to server
function updatePosition(name, description, id) {

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

// perform server check,if passed - run addPosition or updatePosition method
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
