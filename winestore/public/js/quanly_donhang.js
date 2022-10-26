function updateOrder(id, action, ele) {
    console.log(id, action, ele);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            ele.children[4].children[0].innerHTML = (action==1 ? 'Đã xác nhận':'Đã hủy');
            ele.children[5].children[0].remove();
            ele.children[5].children[0].remove();
        }
    };
    xhttp.open("PUT", '/admin/orders/' + id + '?status=' + action, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
}

function phantrang(page) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            document.getElementById('quanlydonhang').innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", '/admin/orders/' + page, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
}

function searched(ele) {
    var search = document.getElementById('search_id').value;
    console.log(search);
    // var ss1 = document.getElementById(ele).parentElement.parentElement;
    // console.log(ss1);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            document.getElementById('quanlydonhang').innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", '/admin/search-order?id=' + search, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
}

// document.getQue