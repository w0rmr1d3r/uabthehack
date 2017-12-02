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
function seeGroup(id) {
    var xmlhttp = getXMLHTTP();

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var divToModify = document.getElementById('show-div');
            divToModify.innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open('GET', '../controller/controller_personas_in_group.php?group_id=' + id);
    xmlhttp.send();
}
