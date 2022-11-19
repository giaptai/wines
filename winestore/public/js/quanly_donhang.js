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
    for (let i = 0; i < document.querySelectorAll('.btnradio.btn-check').length; i++) {
        if (document.querySelectorAll('.btnradio.btn-check')[i].checked) {
            statusS = document.querySelectorAll('.btnradio.btn-check')[i].value;
        }
    }
    if (search != '') {
        query = 'status=' + statusS + '&search=' + search + '&page=' + page;
    } else query = 'status=' + statusS + '&page=' + page;
    changeUrl(query);
    return query;
}

function updateOrder(id, action, page) {
    let statusS;
    for (let i = 0; i < document.querySelectorAll('.btnradio.btn-check').length; i++) {
        if (document.querySelectorAll('.btnradio.btn-check')[i].checked) {
            statusS = document.querySelectorAll('.btnradio.btn-check')[i].value;
        }
    }
    console.log(id, action, page, statusS);

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            document.getElementById('quanlydonhang').innerHTML = this.responseText;
            // ele.children[4].children[0].innerHTML = (action == 1 ? 'Đã xác nhận' : 'Đã hủy');
            // ele.children[5].children[0].remove();
            // ele.children[5].children[0].remove();
            const toastLiveExample = document.getElementById('liveToast')
            const toast = new bootstrap.Toast(toastLiveExample)
            toast.show()
        }
    };
    xhttp.open("PUT", '/admin/orders/' + id, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send(
        'action=' + action + '&page=' + page + '&plight=' + statusS
    );
}

// phân trang theo mã đơn hàng
function phantrang(page) {
    // for (let i = 0; i < document.querySelectorAll('.btnradio.btn-check').length; i++) {
    // if (document.querySelectorAll('.btnradio.btn-check')[i].checked) {
    // let statusS = document.querySelectorAll('.btnradio.btn-check')[i].value;
    // console.log(statusS);
    console.log(QueryAll(page))
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            document.getElementById('quanlydonhang').innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", '/admin/paginate-order?' + QueryAll(page), true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
    // break;
    // }
    // }
}

document.getElementById('search_id').addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();
        searched(1);
    }
});

// tìm kiếm mã đơn hàng
function searched(page) {
    // var search = document.getElementById('search_id').value;
    // console.log(search);
    // for (let i = 0; i < document.querySelectorAll('.btnradio.btn-check').length; i++) {
    // if (document.querySelectorAll('.btnradio.btn-check')[i].checked) {
    // let statusS = document.querySelectorAll('.btnradio.btn-check')[i].value;
    // console.log(statusS);
    console.log(QueryAll(page))
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            document.getElementById('quanlydonhang').innerHTML = this.responseText;
        }
    };
    // xhttp.open("GET", '/admin/search-order?id=' + search + '&status=' + statusS + '&page=' + page, true);
    xhttp.open("GET", '/admin/search-order?' + QueryAll(page), true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
    // break;
}
// }
// }

// lọc đơn hàng theo trạng thái
for (let i = 0; i < document.querySelectorAll('.btnradio.btn-check').length; i++) {
    document.querySelectorAll('.btnradio.btn-check')[i].addEventListener('click', () => {
        console.log(document.querySelectorAll('.btnradio.btn-check')[i].value);
        let statusOrder = document.querySelectorAll('.btnradio.btn-check')[i].value;
        console.log(QueryAll(1))
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                document.getElementById('quanlydonhang').innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", '/admin/filter-order?status=' + statusOrder, true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
        xhttp.send();
    })
}