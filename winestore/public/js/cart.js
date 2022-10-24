function getDistric(ele) {
    console.log(ele);
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
                newele.add(new Option(arrcity[i]['name'], arrcity[i]['code']));
            }
        }
    };

    xhttp.open("GET", "/cart/distric?id=" + ele.value, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
}

function getBlock(ele) {
    console.log(ele);
    var newele = document.getElementById('phuong-xa');
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(JSON.parse(this.responseText));
            arrcity = JSON.parse(this.responseText);
            newele.length = 1;
            for (var i = 0; i < arrcity.length; i++) {
                newele.add(new Option(arrcity[i]['name'], arrcity[i]['code']));
            }
        }
    };

    xhttp.open("GET", "/cart/block?id=" + ele.value, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
}

function minustocart(id) {
    console.log(id);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            document.getElementById('my-cart').innerHTML = this.responseText;
            // document.getElementById('pay-sum').innerHTML = JSON.parse(this.responseText).paysum;
        }
    };

    xhttp.open("GET", "/minus-to-cart/" + id, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
}

function addtocart(id) {
    console.log(id);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            if (this.responseText == 'Vượt số lượng kho !') {
                alert('Vượt số lượng kho !')
            } else {
                document.getElementById('my-cart').innerHTML = this.responseText;
                // document.getElementById('cart-table').innerHTML = JSON.parse(this.responseText).arr1
                // document.getElementById('pay-sum').innerHTML = JSON.parse(this.responseText).paysum;
            }
        }
    };

    xhttp.open("GET", "/add-to-cart/" + id, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
}

function removeItemCart(id) {
    console.log(id);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            // document.getElementById('cart-table').innerHTML = JSON.parse(this.responseText).arr1
            // document.getElementById('pay-sum').innerHTML = JSON.parse(this.responseText).paysum;
            document.getElementById('my-cart').innerHTML = this.responseText;
        }
    };

    xhttp.open("GET", "/del-item-cart/" + id, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
}