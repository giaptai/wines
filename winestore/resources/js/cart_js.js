function addtocart(id) {
    console.log(id);
    var xhttp = new XMLHttpRequest() || ActiveXObject();
    //Bat su kien thay doi trang thai cuar request
    xhttp.onreadystatechange = function () {
        //Kiem tra neu nhu da gui request thanh cong
        if (this.readyState == 4 && this.status == 200) {
            //In ra data nhan duoc
            console.log(xhttp.responseText);
            document.getElementById('cart-table').innerHTML = JSON.parse(xhttp.responseText).arr1;
            document.getElementById('tongtien').innerHTML = JSON.parse(xhttp.responseText).arr2;
            document.getElementById('pay-sum').innerHTML = JSON.parse(xhttp.responseText).arr2;
            document.getElementById('pay-sum2').innerHTML = JSON.parse(xhttp.responseText).arr3;

        }
    }
    //cau hinh request
    xhttp.open('GET', './add-to-cart/' + id, true);
    //cau hinh header cho request
    xhttp.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
    xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    //gui request
    xhttp.send();
}

function minustocart(id) {
    console.log(id);
    var xhttp = new XMLHttpRequest() || ActiveXObject();
    //Bat su kien thay doi trang thai cuar request
    xhttp.onreadystatechange = function () {
        //Kiem tra neu nhu da gui request thanh cong
        if (this.readyState == 4 && this.status == 200) {
            //In ra data nhan duoc
            console.log(xhttp.responseText);
            document.getElementById('cart-table').innerHTML = JSON.parse(xhttp.responseText).arr1;
            document.getElementById('tongtien').innerHTML = JSON.parse(xhttp.responseText).arr2;
            document.getElementById('pay-sum').innerHTML = JSON.parse(xhttp.responseText).arr2;
            document.getElementById('pay-sum2').innerHTML = JSON.parse(xhttp.responseText).arr3;

        }
    }
    //cau hinh request
    xhttp.open('GET', './minus-to-cart/' + id, true);
    //cau hinh header cho request
    xhttp.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
    xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    //gui request
    xhttp.send();
}

function codpay() {
    var s1 = document.getElementById('pay-name').value;
    var s2 = document.getElementById('pay-phone').value;
    var s3 = document.getElementById('pay-email').value;
    var s4 = document.getElementById('pay-address').value;
    var s5 = document.getElementById('pay-options').value;
    var s6 = document.getElementById('pay-sum2').innerHTML;
    console.log(s1, s2, s3, s4, s5, s6);

    var xhttp = new XMLHttpRequest() || ActiveXObject();
    //Bat su kien thay doi trang thai cuar request
    xhttp.onreadystatechange = function () {
        //Kiem tra neu nhu da gui request thanh cong
        if (this.readyState == 4 && this.status == 200) {
            //In ra data nhan duoc
            console.log(xhttp.responseText);
            setTimeout(() => {
                window.location.href = 'https://www.youtube.com/watch?v=SoZaHKud2i4';
            }, 3000)
        }
    }
    //cau hinh request
    xhttp.open('POST', './pay-cod', true);
    //cau hinh header cho request
    xhttp.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
    xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    //gui request
    xhttp.send(
        'fullname=' + s1 +
        '&phone=' + s2 +
        '&email=' + s3 +
        '&address=' + s4 +
        '&total_money=' + s6 +
        '&pay_method=' + s5
    );
}

function deletedItem(id) {
    console.log(id);
    var xhttp = new XMLHttpRequest() || ActiveXObject();
    //Bat su kien thay doi trang thai cuar request
    xhttp.onreadystatechange = function () {
        //Kiem tra neu nhu da gui request thanh cong
        if (this.readyState == 4 && this.status == 200) {
            //In ra data nhan duoc
            console.log(xhttp.responseText);
            document.getElementById('cart-table').innerHTML = JSON.parse(xhttp.responseText).arr1;
            document.getElementById('tongtien').innerHTML = JSON.parse(xhttp.responseText).arr2;
            document.getElementById('pay-sum').innerHTML = JSON.parse(xhttp.responseText).arr2;
            document.getElementById('pay-sum2').innerHTML = JSON.parse(xhttp.responseText).arr3;

        }
    }
    //cau hinh request
    xhttp.open('GET', './del-item-cart/' + id, true);
    //cau hinh header cho request
    xhttp.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
    xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    //gui request
    xhttp.send();
}