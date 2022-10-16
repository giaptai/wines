function addtocart(id, btn) {
    console.log(btn);
    var xhttp = new XMLHttpRequest() || ActiveXObject();
    //Bat su kien thay doi trang thai cuar request
    xhttp.onreadystatechange = function () {
        //Kiem tra neu nhu da gui request thanh cong
        if (this.readyState == 4 && this.status == 200) {
            //In ra data nhan duoc
            // console.log(xhttp.responseText);
            if (JSON.parse(xhttp.responseText).arr1 == 'Tối đa 10 sản phẩm') {
                arlet('Tối đa 10 sản phẩm');
            } else {
                const toastLiveExample = document.getElementById('liveToast')
                const toast = new bootstrap.Toast(toastLiveExample)
                toast.show();
                btn.innerText = "Trong giỏ hàng"
                btn.classList.add('disabled')
                btn.classList.add('btn-primary')
                btn.classList.remove('btn-outline-primary')
            }
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


function searched(val) {
    let valuee = val.children[0].value;
    console.log(valuee);
    // let arr=getAllInput();
    var xhttp = new XMLHttpRequest() || ActiveXObject();
    xhttp.onreadystatechange = function () {
        //Kiem tra neu nhu da gui request thanh cong
        if (this.readyState == 4 && this.status == 200) {
            console.log(xhttp.responseText);
            // document.getElementById('show-product').innerHTML = xhttp.responseText;
        }
    }
    //cau hinh request
    xhttp.open('GET', "./shop/search?search_name=" + valuee + "&page=1", true);
    //cau hinh header cho request
    xhttp.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
    xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhttp.send();
}

function search() {
    let arr = [];
    var radioArr = document.querySelectorAll('.form-check-input');
    for (let i = 0; i < radioArr.length; i++) {
        if (radioArr[i].checked) {
            arr.push(radioArr[i].value);
        }
    }
    console.log(arr);
    var xhttp = new XMLHttpRequest() || ActiveXObject();
    xhttp.onreadystatechange = function () {
        //Kiem tra neu nhu da gui request thanh cong
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            // document.getElementById('show-product').innerHTML = xhttp.responseText;
        }
    }
    //cau hinh request
    xhttp.open('GET', "./shop/filter?search_filter=" + arr + "&page=1", true);
    //cau hinh header cho request
    xhttp.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
    xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhttp.send();
}
