function deleted(ele, page) {
    console.log(ele);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('quanlyquocgia').innerHTML = this.responseText;

            const toastLiveExample = document.getElementById('liveToast')
            toastLiveExample.innerHTML =
                '<div class="d-flex">' +
                '<div class="toast-body">Xóa thành công</div>' +
                '<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>' +
                '</div>'
            const toast = new bootstrap.Toast(toastLiveExample)
            toast.show()
        }
    };

    xhttp.open("DELETE", '/admin/countries/' + ele + '?page=' + page, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
}

function edit(ele) {
    var name = document.getElementById('name-country-modal-' + ele).value;
    var desc = document.getElementById('desc-country-modal-' + ele).value;

    var ss1 = document.getElementById(ele).parentElement.parentElement;
    console.log(ele, name, desc, ss1);

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            ss1.children[1].innerHTML = name;
            ss1.children[2].innerHTML = desc;

            const toastLiveExample = document.getElementById('liveToast')
            toastLiveExample.innerHTML =
                '<div class="d-flex">' +
                '<div class="toast-body">Sửa thành công</div>' +
                '<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>' +
                '</div>'
            const toast = new bootstrap.Toast(toastLiveExample)
            toast.show()
        }
    };
    xhttp.open("PUT", '/admin/countries/' + ele + '?name=' + name + '&description=' + desc, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
}

function add(page) {
    var name = document.getElementById('name-country-add').value;
    var desc = document.getElementById('desc-country-add').value;
    console.log(name, desc);

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            document.getElementById('quanlyquocgia').innerHTML = this.responseText;

            const toastLiveExample = document.getElementById('liveToast')
            toastLiveExample.innerHTML =
                '<div class="d-flex">' +
                '<div class="toast-body">Thêm thành công</div>' +
                '<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>' +
                '</div>'
            const toast = new bootstrap.Toast(toastLiveExample)
            toast.show()
        }
    };
    xhttp.open("POST", '/admin/add-country', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send(
        'name=' + name +
        '&description=' + desc +
        '&page='+ page
    );
}

function phantrang(page) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            document.getElementById('quanlyquocgia').innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", '/admin/countries/' + page, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
}

function search(ele) {
    var newval = document.getElementById('desc-country-modal-' + ele).value;
    var ss1 = document.getElementById(ele).parentElement.parentElement;
    console.log(ss1);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            ss1.children[1].innerHTML = newval;
        }
    };
    xhttp.open("PUT", '/admin/countries/' + ele + '?name=' + newval, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
}