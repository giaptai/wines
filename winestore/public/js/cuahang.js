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
    let arr = [];
    let arr2 = [];
    let arr3 = [];
    let arr4 = [];
    let query = '';
    var chbox = document.querySelectorAll('.input-checkbox');
    var country = document.querySelectorAll('.input-country');
    var brand = document.querySelectorAll('.input-brand');
    var tone = document.querySelectorAll('.input-tone');

    var firstprice = document.getElementById('first-price').value;
    var lastprice = document.getElementById('last-price').value;
    // var dispose = 'ASC';
    var dispose = document.getElementById('dispose').value;

    for (var i = 0; i < chbox.length; i++) {
        if (chbox[i].checked) {
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
    // console.log(arr, arr2, arr3, arr4)
    query = 'arr=' + arr +
        '&arr2=' + arr2 +
        '&arr3=' + arr3 +
        '&arr4=' + arr4 +
        '&firstprice=' + firstprice +
        '&lastprice=' + lastprice +
        '&dispose=' + dispose +
        '&page=' + (page == null ? 1 : page);
    // query = (arr == '' ? '' : 'arr=' + arr) +
    //     (arr2 == '' ? '' : '&arr2=' + arr2) +
    //     (arr3 == '' ? '' : '&arr3=' + arr3) +
    //     (arr4 == '' ? '' : '&arr4=' + arr4)
    // '&firstprice=' + firstprice +
    //     '&lastprice=' + lastprice +
    //     '&dispose=' + dispose +
    //     '&page=' + (page == null ? 1 : page);
    changeUrl(query);
    return query;
}

function addtocart(id) {
    let btn = document.getElementById('btn' + id);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            btn.innerText = "Trong giỏ hàng"
            btn.classList.add('disabled')
            btn.classList.add('btn-danger')
            btn.classList.remove('btn-outline-danger')
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

function filter() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // console.log(this.responseText);
            document.getElementById('show-product').innerHTML = this.responseText;
        }
    };
    xhttp.open('GET', '/shop/filter?' + QueryAll(1), true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
}

function phantrang(page) {
    QueryAll(page);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            document.getElementById('show-product').innerHTML = this.responseText;
        }
    };
    xhttp.open('GET', '/shop/filter?' + QueryAll(page), true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
}

console.log(document.querySelectorAll('.input-checkbox'));
for (let index = 1; index < document.querySelectorAll('.input-checkbox').length; index++) {
    document.querySelectorAll('.input-checkbox')[index].addEventListener('click', () => {
        document.querySelectorAll('.input-checkbox')[0].checked = false

    })
}

document.querySelectorAll('.input-checkbox')[0].addEventListener('click', () => {
    for (let index = 1; index < document.querySelectorAll('.input-checkbox').length; index++) {
        document.querySelectorAll('.input-checkbox')[index].checked = false
    }
})
