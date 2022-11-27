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
    for (let i = 0; i < document.querySelectorAll('.btn-check').length; i++) {
        if (document.querySelectorAll('.btn-check')[i].checked) {
            statusOrder = document.querySelectorAll('.btn-check')[i].value;
        }
    }
    if (search != '') {
        // query = 'status=' + statusOrder + '&search=' + search + '&page=' + page;
        query = 'search=' + search;
    } else query = 'status=' + statusOrder + '&page=' + page;
    changeUrl(query);
    return query;
}


var input = document.getElementById('search_id');
input.addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();
        searched();
    }
});

function ToastMess(mess) {
    const toastLiveExample = document.getElementById('liveToast');
    document.getElementById('toast-info').innerHTML = mess;
    const toast = new bootstrap.Toast(toastLiveExample)
    toast.show()
}

function phantrang(page) {
    // for (let i = 0; i < document.querySelectorAll('.btn-check').length; i++) {
    //     if (document.querySelectorAll('.btn-check')[i].checked) {
    //         let statusOrder = document.querySelectorAll('.btn-check')[i].value;
    //         console.log(statusOrder);
    //         // return;
    //         var xhttp = new XMLHttpRequest();
    //         xhttp.onreadystatechange = function () {
    //             if (this.readyState == 4 && this.status == 200) {
    //                 console.log(this.responseText);
    //                 document.getElementById('donhangcanhan').innerHTML = this.responseText;
    //             }
    //         };
    //         xhttp.open("GET", '/account/paginate-order-client?status=' + statusOrder + '&page=' + page, true);
    //         xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //         xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    //         xhttp.send();
    //     }
    // }
    console.log(QueryAll(page))
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            document.getElementById('donhangcanhan').innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", '/account/paginate-order-client?' + QueryAll(page), true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
}

function updateInfo(id) {
    firstname = document.getElementById('firstname').value;
    lastname = document.getElementById('lastname').value;
    email = document.getElementById('email').value;
    phone = document.getElementById('phone').value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            let res = JSON.parse(this.responseText);
            if (res.status == 1) {
                ToastMess(res.message);
            } else ToastMess(res.message);
        }
    };
    xhttp.open("PUT", '/account/my-account/' + id, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send(
        'lastname=' + lastname +
        '&firstname=' + firstname +
        '&email=' + email +
        '&phone=' + phone
    );
}

function addAddress() {
    firstname = document.getElementById('firstname').value;
    lastname = document.getElementById('lastname').value;
    phone = document.getElementById('phone').value;
    city = document.getElementById('thanhpho').value.split('_')[1];
    districts = document.getElementById('quan-huyen').value.split('_')[1];
    ward = document.getElementById('phuong-xa').value.split('_')[1];
    address = document.getElementById('sonha-duong').value;
    console.log(firstname, lastname, phone, city, districts, ward, address);
    return;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            // const toastLiveExample = document.getElementById('liveToast')
            // const toast = new bootstrap.Toast(toastLiveExample)
            // toast.show()
        }
    };
    xhttp.open("POST", '/account/add-address', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send(
        'lastname=' + lastname +
        '&firstname=' + firstname +
        '&phone=' + phone +
        '&city=' + city +
        '&districts=' + districts +
        '&ward=' + ward +
        '&address=' + address
    );
}

// tìm kiếm mã đơn hàng
function searched() {
    var search = document.getElementById('search_id').value;
    if (search == '') {
        phantrang(1);
        return;
    }
    QueryAll(1)
    console.log(search);
    // return;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            document.getElementById('donhangcanhan').innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", '/account/search-order-client?id=' + search, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
}

// lọc đơn hàng cá nhân theo trạng thái
for (let i = 0; i < document.querySelectorAll('.btn-check').length; i++) {
    document.querySelectorAll('.btn-check')[i].addEventListener('click', () => {
        console.log(document.querySelectorAll('.btn-check')[i].value);
        let statusOrder = document.querySelectorAll('.btn-check')[i].value;
        document.getElementById('search_id').value = '';
        QueryAll(1)
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // console.log(this.responseText);
                document.getElementById('donhangcanhan').innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", '/account/filter-order?status=' + statusOrder, true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
        xhttp.send();
    })
}

function getDistric(ele) {
    let dis = ele.value.split("_")
    var newele = document.getElementById('quan-huyen');
    var newele2 = document.getElementById('phuong-xa');
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(JSON.parse(this.responseText));
            arrcity = JSON.parse(this.responseText);
            newele.length = 1;
            newele2.length = 1;
            for (var i = 0; i < arrcity.length; i++) {
                newele.add(new Option(arrcity[i]['name'], arrcity[i]['code'] + '_' + arrcity[i]['name']));
            }
        }
    };

    xhttp.open("GET", "/cart/distric?id=" + dis[0], true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
}

function getBlock(ele) {
    let bloc = ele.value.split("_")
    var newele = document.getElementById('phuong-xa');
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(JSON.parse(this.responseText));
            arrcity = JSON.parse(this.responseText);
            newele.length = 1;
            for (var i = 0; i < arrcity.length; i++) {
                newele.add(new Option(arrcity[i]['name'], arrcity[i]['code'] + '_' + arrcity[i]['name']));
            }
        }
    };

    xhttp.open("GET", "/cart/block?id=" + bloc[0], true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
}

function changePassword() {
    let email = document.getElementById('clientemail').value;
    let oldpass = document.getElementById('oldpassword').value;
    let newpass = document.getElementById('newpassword').value;
    console.log(email);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.response);
            let res = JSON.parse(this.response);
            const toastLiveExample = document.getElementById('liveToast')
            const toast = new bootstrap.Toast(toastLiveExample)
            if (res.status == true) {
                document.getElementById('toast-body matkhau').innerHTML = res.message
            } else document.getElementById('toast-body matkhau').innerHTML = res.message
            toast.show()
        }
    };
    xhttp.open("POST", '/account/change-password', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send(
        'email=' + email +
        '&oldpass=' + oldpass +
        '&newpass=' + newpass
    );
}

function ToastMessOrder(mess) {
    const toastLiveExample = document.getElementById('liveToast');
    document.getElementById('toast-order').innerHTML = mess;
    const toast = new bootstrap.Toast(toastLiveExample)
    toast.show()
}

function updateOrder(id, page) {
    if (confirm('Bạn muốn hủy đơn hàng này ?')) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                let res = JSON.parse(this.responseText);
                if (res.status == 1) {
                    document.getElementById('donhangcanhan').innerHTML = res.respone;
                    ToastMessOrder(res.message);
                } else ToastMessOrder(res.message);
            }
        };
        xhttp.open("PUT", '/account/cancel-order/' + id, true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
        xhttp.send(
            QueryAll(page) + '&action=3'
        );
    } else {
        // Do nothing!
        return;
    }
}