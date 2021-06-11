function deleteUser(e, user_id) {
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {   // XMLHttpRequest.DONE == 4
           if (xmlhttp.status == 200) {
               e.parentNode.parentNode.remove();
           }
           else if (xmlhttp.status == 400) {
              alert('There was an error 400');
           }
           else {
               alert('something else other than 200 was returned');
           }
        }
    };

    var url = "http://localhost/project/filehosting/php/deleteUser.php/" + "?user_id=" + user_id ;

    xmlhttp.open("DELETE", url , true);
    xmlhttp.send();
}