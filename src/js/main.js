

// make current navbar link active
function activePage() {

  const items = document.querySelectorAll('ul.navbar-nav li.nav-item');

  //remove active state
  items.forEach(function (item, index) {
    item.classList.remove('active');
  });

  // add active state for current page
  switch (pageName) {
    case 'workers':      items[1].classList.add('active');
      break;
    case 'positions':    items[2].classList.add('active');
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

  let vars = urlRoot + showAction;
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

activePage();
