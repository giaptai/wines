function changeUrl(url) {
    const nextURL = '?' + url;
    const nextTitle = 'My new page title';
    const nextState = {
        additionalInformation: 'Updated the URL with JS'
    };
    //window.history.pushState(nextState, nextTitle, nextURL);
    window.history.replaceState(nextState, nextTitle, nextURL);
}

function QueryAll(page) {
    var idqr = document.getElementById('search_id').value;
    var nameqr = document.getElementById('search_name').value;

    if (idqr != '' && nameqr != '') {
        query = 'id=' + idqr + '&nameqr=' + nameqr + '&page=' + page;
    } else if (idqr == '' && nameqr != '') {
        query = 'nameqr=' + nameqr + '&page=' + page;
    } else if (idqr != '' && nameqr == '') {
        query = 'id=' + idqr + '&page=' + page;
    } else {
        query = 'page=' + page;
    }
    changeUrl(query)
    return query;
}

function ToastMess(mess) {
    const toastLiveExample = document.getElementById('liveToast');
    document.getElementById('toast-sanpham').innerHTML = mess;
    const toast = new bootstrap.Toast(toastLiveExample)
    toast.show()
}



document.getElementById('search_id').addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();
        searched();
    }
});

document.getElementById('search_name').addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();
        searched();
    }
});


function deleted(id, page) {
    query = QueryAll(page);
    console.log(query);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            let res = JSON.parse(this.responseText);
            if (res.status == 1) {
                document.getElementById('quanlysanpham').innerHTML = JSON.parse(this.responseText).response;
                ToastMess(res.message);
            } else ToastMess(res.message);
        }
    };

    xhttp.open("DELETE", '/admin/products/' + id + '?' + query, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
}

function edit(ele, page) {
    let formEl = document.getElementById('formOkk' + ele);
    formEl.addEventListener('submit', (event) => {
        event.preventDefault();
        query = QueryAll(page);
        let formData = new FormData(formEl);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                let res = JSON.parse(this.responseText);
                if (res.status == 1) {
                    document.getElementById('quanlysanpham').innerHTML = JSON.parse(this.responseText).response;
                    ToastMess(res.message);
                } else ToastMess(res.message);
            }
        };
        xhttp.open("POST", '/admin/products/' + ele + '?' + query, true);
        xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
        xhttp.send(
            formData
        );
    })
}

// thêm sản phẩm
function add(page) {
    let formEl = document.getElementById('formAdd');
    formEl.addEventListener('submit', (event) => {
        event.preventDefault();
        query = QueryAll(page);
        var xhttp = new XMLHttpRequest();
        let formData = new FormData(formEl);
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                let res = JSON.parse(this.responseText);
                if (res.status == 1) {
                    document.getElementById('quanlysanpham').innerHTML = JSON.parse(this.responseText).response;
                    ToastMess(res.message);
                } else ToastMess(res.message);
            }
        };
        xhttp.open("POST", '/admin/add-product' + '?' + query, true);
        xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
        xhttp.send(
            formData
        );
    })
}


// function add() {
//     var id = document.getElementById('id-product').value;
//     var image = document.getElementById('iptIMG').value;
//     var name = document.getElementById('name-product').value;
//     var desc = document.getElementById('intro-product').value;
//     var category = document.getElementById('category-product').value;
//     var brand = document.getElementById('brand-product').value;
//     var country = document.getElementById('country-product').value;
//     var quantity = document.getElementById('number-product').value;
//     var vol = document.getElementById('vol-product').value;
//     var tone = document.getElementById('tone-product').value;
//     var year = document.getElementById('year-product').value;
//     var price = document.getElementById('price-product').value;
//     console.log(image);
//     var xhttp = new XMLHttpRequest();
//     xhttp.onreadystatechange = function () {
//         if (this.readyState == 4 && this.status == 200) {
//             console.log(this.responseText);
//             // document.getElementById('quanlysanpham').innerHTML = this.responseText;

//             // const toastLiveExample = document.getElementById('liveToast')
//             // toastLiveExample.innerHTML =
//             //     '<div class="d-flex">' +
//             //     '<div class="toast-body">Thêm thành công</div>' +
//             //     '<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>' +
//             //     '</div>'
//             // const toast = new bootstrap.Toast(toastLiveExample)
//             // toast.show()
//         }
//     };
//     xhttp.open("POST", '/admin/add-product', true);
//     xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
//     xhttp.send(
//         // "name" + $request->input('name-product'),
//         //     "&description" + $request->input('intro-product'),
//         //     "&images" +  $request->file('iptIMG'),
//         //     "&quantity" + $request->input('number-product'),
//         //     "&vol" + $request->input('vol-product'),
//         //     "&c" + $request->input('tone-product'),
//         //     "&brand_id" + $request->input('brand-product'),
//         //     "&category_id" + $request->input('category-product'),
//         //     "&origin_id" + $request->input('country-product'),
//         //     "&price" + $request->input('price-product'),
//         //     "&year" + $request->input('year-product'),
//     );
// }

function phantrang(page) {
    query = QueryAll(page);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            document.getElementById('quanlysanpham').innerHTML = this.responseText;
            // changeUrl(page);
        }
    };
    xhttp.open("GET", '/admin/paginate-product?' + query, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
}

function searched() {
    query = QueryAll(1);
    console.log(query);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            document.getElementById('quanlysanpham').innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", '/admin/search-product?' + query, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
}