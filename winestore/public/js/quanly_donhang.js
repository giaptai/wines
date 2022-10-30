function updateOrder(id, action, ele) {
    console.log(id, action, ele);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            ele.children[4].children[0].innerHTML = (action==1 ? 'Đã xác nhận':'Đã hủy');
            ele.children[5].children[0].remove();
            ele.children[5].children[0].remove();
            const toastLiveExample = document.getElementById('liveToast')
            const toast = new bootstrap.Toast(toastLiveExample)
            toast.show()
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

// lọc đơn hàng theo trạng thái
for(let i=0; i<document.querySelectorAll('.btnradio.btn-check').length; i++){
    document.querySelectorAll('.btnradio.btn-check')[i].addEventListener('click', ()=>{
        console.log(document.querySelectorAll('.btnradio.btn-check')[i].value);
        let statusOrder=document.querySelectorAll('.btnradio.btn-check')[i].value;

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                document.getElementById('quanlydonhang').innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", '/admin/filter-order?id=' + statusOrder, true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
        xhttp.send();
    })
}