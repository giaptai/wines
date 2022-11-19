function changeUrl(url) {
    const nextURL = '?' + url;
    const nextTitle = 'My new page title';
    const nextState = {
        additionalInformation: 'Updated the URL with JS'
    };
    window.history.pushState(nextState, nextTitle, nextURL);
    // window.history.replaceState(nextState, nextTitle, nextURL);
}

function QueryAll(page) {
    var search = document.getElementById('search_id').value;
    if (search != '') {
        str = 'name=' + search + '&page=' + page;
    } else str = 'page=' + page;
    changeUrl(str);
    return str;
}

function ToastMess(mess) {
    const toastLiveExample = document.getElementById('liveToast');
    document.getElementById('toast-theloai').innerHTML = mess;
    const toast = new bootstrap.Toast(toastLiveExample)
    toast.show()
}

function deleted(ele, page) {
    query = QueryAll(page);
    console.log(query);
    // return;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            let res = JSON.parse(this.responseText);
            if (res.status == 1) {
                document.getElementById('quanlytheloai').innerHTML = JSON.parse(this.responseText).response;
                ToastMess(res.message);
            } else ToastMess(res.message);
        }
    };
    xhttp.open("DELETE", '/admin/categories/' + ele + '?' + query, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
}

function edit(ele, page) {
    var name = document.getElementById('name-category-modal-' + ele).value;
    var desc = document.getElementById('desc-category-modal-' + ele).value;
    query = QueryAll(page);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let res = JSON.parse(this.responseText);
            if (res.status == 1) {
                document.getElementById('quanlytheloai').innerHTML = JSON.parse(this.responseText).response;
                ToastMess(res.message);
            } else ToastMess(res.message);
        }
    };
    xhttp.open("PUT", '/admin/categories/' + ele, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send(
        'namep=' + name + '&desc=' + desc + '&' + query
    );
}

function add(page) {
    var name = document.getElementById('name-category-add').value;
    var desc = document.getElementById('desc-category-add').value;
    query = QueryAll(page); console.log(query);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let res = JSON.parse(this.responseText);
            if (res.status == 1) {
                document.getElementById('quanlytheloai').innerHTML = JSON.parse(this.responseText).response;
                ToastMess(res.message);
            } else ToastMess(res.message);
        }
    };
    xhttp.open('POST', '/admin/add-category', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send(
        'namep=' + name +
        '&desc=' + desc +
        '&' + query
    );
}

function phantrang(page) {
    query = QueryAll(page);
    console.log(query);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            document.getElementById('quanlytheloai').innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", '/admin/paginate-category?' + query, true);
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
    query = QueryAll(1);
    console.log(query);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            document.getElementById('quanlytheloai').innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", '/admin/search-category?' + query, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
}