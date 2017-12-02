/**
 * Gets an object XMLHTTP for each browser
 * @return {XMLHttpRequest || ActiveXObject}
 */
function getXMLHTTP() {
    return (window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP"));
}


/**
 * Gets the personas for the selected group
 */
 function seeGroup(str) {
    if (str == "") {
        document.getElementById("show-div").innerHTML = "";
        return;
    } else {
        var xmlhttp = getXMLHTTP();

        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("show-div").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","controller/controller_groups.php?q="+str,true);
        xmlhttp.send();
    }
}


/**
 * Gets the personas for the selected group
 */
function seePersonasInGroup(groupid) {
    var xmlhttp = getXMLHTTP();

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var divToModify = document.getElementById('show-div');
            divToModify.innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open('GET', 'controller/controller_personas_in_group.php?group_id=' + groupid);
    xmlhttp.send();
}
