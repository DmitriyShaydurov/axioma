
const posList     = document.querySelector('.collection');
const delAction   = '/Positions/deletePosition/';
const showAction  = '/Positions/echoPositions/';
const showParams  = '';

function viewPosition(id) {
  let description = document.getElementById('upd-description');
  let posId = document.getElementById('upd-id');
  let name = document.getElementById('upd-pos-name');
  console.log(description);
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

function addPosition() {
  let name =   document.getElementById('pos-name').value;
  let description =  document.getElementById('description').value;
  let vars = `${urlRoot}/Positions/addPosition/${name}/${description}`;
  ajaxGet(vars);
}

function updatePosition() {
  let name =  document.getElementById('upd-pos-name').value;
  let description =  document.getElementById('upd-description').value;
  let id =  document.getElementById('upd-id').value;
  let vars = `${urlRoot}/positions/updatePosition/${id}/${name}/${description}`;

  ajaxGet(vars);
}
