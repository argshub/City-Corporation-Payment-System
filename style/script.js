function showWard(str) {
    var xhttp;
    if (str == "") {
        document.getElementById("ward").innerHTML = "";
        return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("ward").innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("GET", "../mod/ward.php?q="+str, true);
    xhttp.send();
    
}

function showMoholla(str) {
    var xhttp;
    if (str == "") {
        document.getElementById("moholla").innerHTML = "";
        return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("moholla").innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("GET", "../mod/moholla.php?q="+str, true);
    xhttp.send();

}

function showRoad(str) {
    var xhttp;
    if (str == "") {
        document.getElementById("road").innerHTML = "";
        return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("road").innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("GET", "../mod/road.php?q="+str, true);
    xhttp.send();

}

function showHolding(str) {
    var xhttp;
    if (str == "") {
        document.getElementById("holding").innerHTML = "";
        return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("holding").innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("GET", "../mod/holding.php?q="+str, true);
    xhttp.send();

}

