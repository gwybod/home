document.addEventListener('keydown', function (event) {
  var esc = event.which == 27,
      nl = event.which == 13,
      el = event.target,
      input = el.nodeName != 'INPUT' && el.nodeName != 'TEXTAREA',
      data = {};

  if (input) {
    if (esc) {
      // restore state
      document.execCommand('undo');
      el.blur();
    } else if (nl) {
      // save
      data[el.getAttribute('data-name')] = el.innerHTML;
      gppost(JSON.stringify(data));
      el.blur();
      event.preventDefault();
    }
  }
}, true);
function writediv(a, s) {
  document.getElementById(a).innerHTML = s;
}
function gppost(payload, target = './back.php', outputdiv = 'output', statusdiv = 'status',  timeout = '5000', clobberOutputDiv = false){
    if (payload === '') { document.getElementById(statusdiv).innerHTML += "No payload"; return;}
    var xhttp = new XMLHttpRequest();
    xhttp.timeout = timeout;
    xhttp.onreadystatechange = function() {
        switch(this.readyState){
            case 1:
                writediv(statusdiv, "Connection opened<br>");
                break;
            case 2:
                writediv(statusdiv, "Command sent<br>");
                break;
            case 3:
                writediv(statusdiv, "Receiving data<br>");
                break;
            case 4:
                switch(this.status){
                    case 0:
                        writediv(statusdiv, "No reply?<br>");
                    case 403:
                        writediv(statusdiv, "Access denied<br>");
                    case 404:
                        writediv(statusdiv, "Target not valid<br>");
                    case 500:
                        writediv(statusdiv, "Server error<br>");
                        break;
                    case 200:
               		document.getElementById(outputdiv).innerHTML = this.responseText;
                }
        }
    };
    xhttp.open('POST', target, true);
    xhttp.setRequestHeader('Content-Type', 'application/json');
    xhttp.send(payload);
}
