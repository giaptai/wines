document.getElementById('email_id').addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();
        searched();
    }
});

document.getElementById('phone_id').addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();
        searched();
    }
});

function QueryAll(page) {
    var email = document.getElementById('email_id').value;
    var phone = document.getElementById('phone_id').value;
    var query;
    if (email != '' && phone != '') {
        query = 'email=' + email + '&phone=' + phone + '&page=' + page;
    } else if (email == '' && phone != '') {
        query = 'phone=' + phone + '&page=' + page;
    } else if (email != '' && phone == '') {
        query = 'email=' + email + '&page=' + page;
    } else {
        query = 'page=' + page;
    }
    return query;
}

function phantrang(page) {
    query = QueryAll(page);
    console.log(query);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            document.getElementById('quanlytaikhoan').innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", '/admin/paginate-account?' + query, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
}

function searched() {
    query = QueryAll(1);
    console.log(query);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            document.getElementById('quanlytaikhoan').innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", '/admin/search-accounts?' + query, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
}