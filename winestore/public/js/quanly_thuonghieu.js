function changeUrl(url) {
    const nextURL = '?' + url;
    const nextTitle = 'My new page title';
    const nextState = {
        additionalInformation: 'Updated the URL with JS'
    };
    // window.history.pushState(nextState, nextTitle, nextURL);
    window.history.replaceState(nextState, nextTitle, nextURL);
}

function QueryAll(page) {
    var search = document.getElementById('search_id').value;
    if (search != '') {
        query = 'name=' + search + '&page=' + page;
    } else query = 'page=' + page;
    changeUrl(query);
    return query;
}

function ToastMess(mess) {
    const toastLiveExample = document.getElementById('liveToast');
    document.getElementById('toast-thuonghieu').innerHTML = mess;
    const toast = new bootstrap.Toast(toastLiveExample)
    toast.show()
}
function deleted(ele, page) {
    query = QueryAll(page);
    console.log(query);

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let res = JSON.parse(this.responseText);
            if (res.status == 1) {
                document.getElementById('quanlythuonghieu').innerHTML = JSON.parse(this.responseText).response;
                ToastMess(res.message);
            } else ToastMess(res.message);
        }
    };

    xhttp.open("DELETE", '/admin/brands/' + ele + '?' + query, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
}

function edit(ele, page) {
    var name = document.getElementById('name-brand-modal-' + ele).value;
    var desc = document.getElementById('desc-brand-modal-' + ele).value;
    query = QueryAll(page)
    console.log(query);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let res = JSON.parse(this.responseText);
            if (res.status == 1) {
                document.getElementById('quanlythuonghieu').innerHTML = JSON.parse(this.responseText).response;
                ToastMess(res.message);
            } else ToastMess(res.message);
        }
    };
    xhttp.open("PUT", '/admin/brands/' + ele, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send('namep=' + name + '&desc=' + desc + '&' + query);
}

function add(page) {
    var name = document.getElementById('name-brand-add').value;
    var desc = document.getElementById('desc-brand-add').value;
    query = QueryAll(page)
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let res = JSON.parse(this.responseText);
            if (res.status == 1) {
                document.getElementById('quanlythuonghieu').innerHTML = JSON.parse(this.responseText).response;
                ToastMess(res.message);
            } else ToastMess(res.message);
        }
    };
    xhttp.open("POST", '/admin/add-brand', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send(
        'namep=' + name +
        '&images=' + 'https://chevalier.vn/wp-content/uploads/2021/09/Ruou-Vang-Chateau-Gruaud-Larose.jpg' +
        '&desc=' + desc +
        '&' + query
    );
}

function phantrang(page) {
    query = QueryAll(page)
    console.log(query);

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            document.getElementById('quanlythuonghieu').innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", '/admin/paginate-brand?' + query, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
}

var input = document.getElementById('search_id');
input.addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();
        searched();
    }
});

function searched() {
    query = QueryAll(1)
    // var ss1 = document.getElementById(ele).parentElement.parentElement;
    // console.log(ss1);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            document.getElementById('quanlythuonghieu').innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", '/admin/search-brand?' + query, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
}