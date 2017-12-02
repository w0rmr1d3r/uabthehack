/**
 * Gets an object XMLHTTP for each browser
 * @return {XMLHttpRequest || ActiveXObject}
 */
function getXMLHTTP() {
    return (window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP"));
}

