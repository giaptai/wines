function changeUrl(page){
    const nextURL = '?page='+page;
    const nextTitle = 'My new page title';
    const nextState = {
        additionalInformation: 'Updated the URL with JS'
    };
    //window.history.pushState(nextState, nextTitle, nextURL);
    window.history.replaceState(nextState, nextTitle, nextURL);
}

function deleted(id, page) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            console.log(this.responseText);

            document.getElementById('quanlysanpham').innerHTML = this.responseText;

            const toastLiveExample = document.getElementById('liveToast')
            toastLiveExample.innerHTML =
                '<div class="d-flex">' +
                '<div class="toast-body">Xóa sản phẩm thành công</div>' +
                '<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>' +
                '</div>'
            const toast = new bootstrap.Toast(toastLiveExample)
            toast.show()
        }
    };

    xhttp.open("DELETE", '/admin/products/' + id + '?page=' + page, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
}

function edit(ele) {
    var image = document.getElementById('image-product-modal-' + ele).value;
    var name = document.getElementById('name-product-modal-' + ele).value;
    var desc = document.getElementById('desc-product-modal-' + ele).value;
    var category = document.getElementById('category-product-modal-' + ele).value;
    var brand = document.getElementById('brand-product-modal-' + ele).value;
    var country = document.getElementById('country-product-modal-' + ele).value;
    var quantity = document.getElementById('quantity-product-modal-' + ele).value;
    var vol = document.getElementById('vol-product-modal-' + ele).value;
    var tone = document.getElementById('tone-product-modal-' + ele).value;
    var year = document.getElementById('year-product-modal-' + ele).value;
    var price = document.getElementById('price-product-modal-' + ele).value;


    var ss1 = document.getElementById(ele).parentElement.parentElement;
    console.log(image);

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            ss1.children[2].children[0].children[0].src = 'https://api.lorem.space/image/game?w=68&h=51';
            ss1.children[2].children[0].children[1].innerHTML = name;
            ss1.children[3].innerHTML = quantity;
            ss1.children[4].innerHTML = new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'VND' }).format(price);
            ss1.children[5].innerHTML = new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'VND' }).format(quantity * price);

            const toastLiveExample = document.getElementById('liveToast')
            toastLiveExample.innerHTML =
                '<div class="d-flex">' +
                '<div class="toast-body">' + this.responseText + '</div>' +
                '<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>' +
                '</div>'
            const toast = new bootstrap.Toast(toastLiveExample)
            toast.show()
        }
    };
    xhttp.open("PUT", '/admin/products/' + ele, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send(
        'name=' + name +
        '&description=' + desc +
        '&images=' + (image == '' ? 'https://api.lorem.space/image/game?w=68&h=51' : image) +
        '&quantity=' + quantity +
        '&vol=' + vol +
        '&c=' + tone +
        '&brand_id=' + brand +
        '&category_id=' + category +
        '&origin_id=' + country +
        '&price=' + price +
        '&year=' + year,
    );
}

// function add() {
//     var name = document.getElementById('name-country-add').value;
//     var desc = document.getElementById('desc-country-add').value;
//     console.log(name, desc);

//     var xhttp = new XMLHttpRequest();
//     xhttp.onreadystatechange = function () {
//         if (this.readyState == 4 && this.status == 200) {
//             console.log(this.responseText);
//             document.getElementById('quanlysanpham').innerHTML = this.responseText;

//             const toastLiveExample = document.getElementById('liveToast')
//             toastLiveExample.innerHTML =
//                 '<div class="d-flex">' +
//                 '<div class="toast-body">Thêm thành công</div>' +
//                 '<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>' +
//                 '</div>'
//             const toast = new bootstrap.Toast(toastLiveExample)
//             toast.show()
//         }
//     };
//     xhttp.open("POST", '/admin/add-product', true);
//     xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
//     xhttp.send(
//         'name=' + name +
//         '&description=' + desc
//     );
// }

function phantrang(page) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            document.getElementById('quanlysanpham').innerHTML = this.responseText;
            changeUrl(page);
        }
    };
    xhttp.open("GET", '/admin/products/' + page, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
}

function searched() {
    var idqr = document.getElementById('search_id').value;
    var nameqr = document.getElementById('search_name').value;
    console.log(idqr, nameqr);

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            document.getElementById('quanlysanpham').innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", '/admin/search-product?name=' + nameqr + '&id=' + idqr, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
}