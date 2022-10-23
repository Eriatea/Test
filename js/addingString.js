'use strict';

document.getElementById("save").onclick = function () {
    let form = document.querySelector('#stackoverform');
    let data = new FormData(form);
    let req = new XMLHttpRequest();
    req.open("POST", "AddingString.php", true);
    req.send(data);
    location.reload();
};
