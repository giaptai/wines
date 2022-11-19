function QueryAll(page) {
    var search = document.getElementById('search_id').value;
    if (search != '') {
        query = 'name=' + search + '&page=' + page;
    } else query = 'page=' + page;
    changeUrl(query)
    return query;
}
function changeUrl(url) {
    const nextURL = '?' + url;
    const nextTitle = 'My new page title';
    const nextState = {
        additionalInformation: 'Updated the URL with JS'
    };
    // window.history.pushState(nextState, nextTitle, nextURL);
    window.history.replaceState(nextState, nextTitle, nextURL);
}

function ToastMess(mess) {
    const toastLiveExample = document.getElementById('liveToast');
    document.getElementById('toast-quocgia').innerHTML = mess;
    const toast = new bootstrap.Toast(toastLiveExample)
    toast.show()
}

function deleted(ele, page) {
    query = QueryAll(page)
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            let res = JSON.parse(this.responseText);
            if (res.status == 1) {
                document.getElementById('quanlyquocgia').innerHTML = JSON.parse(this.responseText).response;
                ToastMess(res.message);
            } else ToastMess(res.message);
        }
    };

    xhttp.open("DELETE", '/admin/countries/' + ele + '?' + query, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
}

function edit(ele, page) {
    var name = document.getElementById('name-country-modal-' + ele).value;
    var desc = document.getElementById('desc-country-modal-' + ele).value;
    query = QueryAll(page);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            let res = JSON.parse(this.responseText);
            if (res.status == 1) {
                document.getElementById('quanlyquocgia').innerHTML = JSON.parse(this.responseText).response;
                ToastMess(res.message);
            } else ToastMess(res.message);
        }
    };
    xhttp.open("PUT", '/admin/countries/' + ele, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send(
        'namep=' + name + '&desc=' + desc + '&' + query
    );
}

function add(page) {
    var name = document.getElementById('name-country-add').value;
    var desc = document.getElementById('desc-country-add').value;
    query = QueryAll(page);

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            let res = JSON.parse(this.responseText);
            if (res.status == 1) {
                document.getElementById('quanlyquocgia').innerHTML = JSON.parse(this.responseText).response;
                ToastMess(res.message);
            } else ToastMess(res.message);
        }
    };
    xhttp.open("POST", '/admin/add-country', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send(
        'namep=' + name +
        '&desc=' + desc +
        '&' + query
    );
}

function phantrang(page) {
    let query = QueryAll(page);
    console.log(query);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);;
            document.getElementById('quanlyquocgia').innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", '/admin/paginate-country?' + query, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
}

document.getElementById('search_id').addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();
        searched();
    }
});

function searched() {
    query = QueryAll(1);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            document.getElementById('quanlyquocgia').innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", '/admin/search-country?' + query, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
}