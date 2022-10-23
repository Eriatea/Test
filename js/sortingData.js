'use strict';

function sortTable(n) {
    let table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("myTable");
    switching = true; //переключение
    dir = "asc"; //Направление сортировки по возрастанию
    /*Петля, которая будет продолжаться до тех пор, пока
     никакого переключения не было сделано:*/
    while (switching) {
        switching = false; //начните с того, что скажите: никакого переключения не происходит:
        rows = table.rows;

        for (i = 1; i < (rows.length - 1); i++) { //Цикл через все строки таблицы (без заголовков)
            shouldSwitch = false; //начните с того, что не должно быть никакого переключения:

            x = rows[i].getElementsByTagName("TD")[n]; //получение элемента из текущей строки
            y = rows[i + 1].getElementsByTagName("TD")[n]; //получение элемента из следующей строки

            if (typeof (x) !== 'undefined' && typeof (y) !== 'undefined') {
                var a = x.innerHTML.toLowerCase();
                var b = y.innerHTML.toLowerCase();

                var trimmedStringOfNumbersA = a.toString().replace(/\D/g, ''); // Берем только цифры в виде строки
                var trimmedStringOfNumbersB = b.toString().replace(/\D/g, ''); // Берем только цифры в виде строки
                var trimmedNumberA = Number(trimmedStringOfNumbersA); // Берем только цифры в виде числа
                var trimmedNumberB = Number(trimmedStringOfNumbersB); // Берем только цифры в виде числа

                var trimmedStringA = a.toString().replace(/[^a-zA-ZА-Яа-яЁё]/gi, '').replace(/\s+/gi, ', '); // Берем только буквы в виде строки
                var trimmedStringB = b.toString().replace(/[^a-zA-ZА-Яа-яЁё]/gi, '').replace(/\s+/gi, ', '); // Берем только буквы в виде строки
            }

            if (dir === "asc") { //Направление сортировки по возрастанию      

                if (trimmedStringA > trimmedStringB) {
                    shouldSwitch = true;
                    break;
                }

                if (trimmedStringA === trimmedStringB) { //Сравнение строк           
                    if (trimmedNumberA > trimmedNumberB) { //Сравнение чисел в случае, если буквенные значения равные
                        shouldSwitch = true;
                        break;
                    }
                }
            } else if (dir === "desc") { //Направление сортировки по убыванию

                if (trimmedStringA < trimmedStringB) {
                    shouldSwitch = true;
                    break;
                }

                if (trimmedStringA === trimmedStringB) { //Сравнение строк          
                    if (trimmedNumberA < trimmedNumberB) { //Сравнение чисел в случае, если буквенные значения равные
                        shouldSwitch = true;
                        break;
                    }
                }
            }
        }

        if (shouldSwitch) {
            /*Если переключатель был отмечен, сделайте переключатель
             и отметьте, что переключение было сделано:*/
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            //Каждый раз, когда выполняется переключение, увеличьте это число на 1:
            switchcount++;
        } else {
            /*Если переключение не было сделано и направление "asc",
             установите направление на "desc"и снова запустите цикл while.*/
            if (switchcount === 0 && dir === "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}