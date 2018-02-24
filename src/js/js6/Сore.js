export class Core{
  constructor (urlRoot, pageName) {
    this.pageName = pageName;
    this.urlRoot = urlRoot;
    this.posList = document.querySelector('.collection');
    this.activePage();
  //  this.showPositions=

  }

  // make current navbar link active
  activePage () {

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
      default:             items[0].classList.add('active');
    }

  }

  // make ajax request to server and show positions
  ajaxGet(vars) {
    let sp=  this.showPositions();
    let hr = new XMLHttpRequest();
    hr.open('GET', vars, true);
    hr.onreadystatechange = function () {
          if (hr.readyState == 4 && hr.status ==  200) {
            //this.showPositions();
            sp;
          }
        };

    hr.send(vars);
  }

  delPosition(id) {

    let vars = `${this.urlRoot}/positions/deletePosition/${id}`;

    this.ajaxGet(vars);
  }

  showPositions() {

    let vars = `${this.urlRoot}/positions/echoPositions/`;
    let hr = new XMLHttpRequest();
    let posList=this.posList;

    hr.open('GET', vars, true);
    hr.onreadystatechange = function () {
          if (hr.readyState == 4 && hr.status ==  200) {
            let response = hr.responseText;
            //this.posList.innerHTML = response;
            posList.innerHTML = response;
          }
        };

    hr.send(vars);
  }

}
