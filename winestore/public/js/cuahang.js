function addtocart(id) {
    let btn = document.getElementById('btn' + id);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            btn.innerText = "Trong giỏ hàng"
            btn.classList.add('disabled')
            btn.classList.add('btn-primary')
            btn.classList.remove('btn-outline-primary')
            const toastLiveExample = document.getElementById('liveToast')
            const toast = new bootstrap.Toast(toastLiveExample)
            toast.show()
        }
    };
    xhttp.open("POST", '/store-to-cart/' + id, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
}

function filter(id) {
    let btn = document.getElementById('btn' + id);
    let arr = [];
    let arr2 = [];
    let arr3 = [];
    let arr4 = [];

    var chbox = document.querySelectorAll('.input-checkbox');
    var country = document.querySelectorAll('.input-country');
    var brand = document.querySelectorAll('.input-brand');
    var tone = document.querySelectorAll('.input-tone');

    var firstprice = document.getElementById('first-price').value;
    var lastprice = document.getElementById('last-price').value;
    var dispose = document.getElementById('dispose').value;

    for (var i = 0; i < chbox.length; i++) {
        if (chbox[i].checked) {
            // arr.push(chbox[i].id.replace('wine', ''));
            arr.push(chbox[i].value);
        }
    }

    for (var i = 0; i < country.length; i++) {
        if (country[i].checked) {
            arr2.push(country[i].value);

        }
    }

    for (var i = 0; i < brand.length; i++) {
        if (brand[i].checked) {
            arr3.push(brand[i].value);

        }
    }

    for (var i = 0; i < tone.length; i++) {
        if (tone[i].checked) {
            arr4.push(tone[i].value);

        }
    }
    console.log('ok:=' + arr4);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // console.log(JSON.parse(this.responseText));
            console.log(this.responseText);
            document.getElementById('show-product').innerHTML = this.responseText;
            // document.getElementById('phantrang').innerHTML = JSON.parse(this.responseText).pagin;
            // document.getElementById('soluong').innerText = '(Có ' + JSON.parse(this.responseText).soluong +
            //     ' sản phẩm)';
        }
    };
    xhttp.open(formOk.method, '/shop/filter?arr=' + arr +
        '&arr2=' + arr2 +
        '&arr3=' + arr3 +
        '&arr4=' + arr4 +
        '&firstprice=' + firstprice +
        '&lastprice=' + lastprice +
        '&dispose=' + dispose,
        true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
}

function phantrang(page) {
    let arr = [];
    let arr2 = [];
    let arr3 = [];
    let arr4 = [];

    var chbox = document.querySelectorAll('.input-checkbox');
    var country = document.querySelectorAll('.input-country');
    var brand = document.querySelectorAll('.input-brand');
    var tone = document.querySelectorAll('.input-tone');

    var firstprice = document.getElementById('first-price').value;
    var lastprice = document.getElementById('last-price').value;
    var dispose = document.getElementById('dispose').value;

    for (var i = 0; i < chbox.length; i++) {
        if (chbox[i].checked) {
            // arr.push(chbox[i].id.replace('wine', ''));
            arr.push(chbox[i].value);
        }
    }

    for (var i = 0; i < country.length; i++) {
        if (country[i].checked) {
            arr2.push(country[i].value);
        }
    }

    for (var i = 0; i < brand.length; i++) {
        if (brand[i].checked) {
            arr3.push(brand[i].value);
        }
    }

    for (var i = 0; i < tone.length; i++) {
        if (tone[i].checked) {
            arr4.push(tone[i].value);
        }
    }
    console.log('ok:=' + arr4);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // console.log(JSON.parse(this.responseText));
            // console.log(document.getElementById('soluong'));
            // document.getElementById('show-product').innerHTML = JSON.parse(this.responseText).showproduct;
            // document.getElementById('phantrang').innerHTML = JSON.parse(this.responseText).pagin;
            // document.getElementById('soluong').innerText = '(Có ' + JSON.parse(this.responseText).soluong +
            //     ' sản phẩm)';
            console.log(this.responseText);
            document.getElementById('show-product').innerHTML = this.responseText;
        }
    };
    xhttp.open(formOk.method, '/shop/filter?arr=' + arr +
        '&arr2=' + arr2 +
        '&arr3=' + arr3 +
        '&arr4=' + arr4 +
        '&firstprice=' + firstprice +
        '&lastprice=' + lastprice +
        '&page=' + page +
        '&dispose=' + dispose,
        true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
}