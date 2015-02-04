

function validateForm() {
    var x = document.forms["loginform"]["email"].value;
    if (x == null || x == "") {
        alert("E-mail must be filled out");
        return false;
    }

    var x = document.forms["loginform"]["pwd"].value;
    if (x == null || x == "") {
        alert("Password must be filled out");
        return false;
    }

    var x = document.forms["loginform"]["email"].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert("Not a valid e-mail address");
        return false;
    }

    return true;    
}
