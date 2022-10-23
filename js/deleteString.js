'use strict';

function deleteString() {

    let table = document.getElementById("myTable");
    table.onclick = e => {
        let td = e.target;
        let tr = td.parentElement;
        let data = tr.getAttribute('data-info');
        let dataArray = data.split('  ');

        let objData = {
            'manufacturer': dataArray[0],
            'name': dataArray[1],
            'price': dataArray[2],
            'quantity': dataArray[3]
        };

        if (data === null) {
            alert('Нельзя удалить!');
            return false;
        }
        let req = new XMLHttpRequest();
        req.open("POST", "DeleteString.php", true);
        req.send(JSON.stringify(objData));
        location.reload();
        alert('Успешно удалено!');
    };
}
;
