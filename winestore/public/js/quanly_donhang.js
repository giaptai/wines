function changeUrl(url) {
    const nextURL = '?' + url;
    const nextTitle = 'My new page title';
    const nextState = {
        additionalInformation: 'Updated the URL with JS'
    };
    // window.history.pushState(nextState, nextTitle, nextURL);
    window.history.replaceState(nextState, nextTitle, nextURL);
}

function QueryAll(page) {
    var search = document.getElementById('search_id').value;
    for (let i = 0; i < document.querySelectorAll('.btnradio.btn-check').length; i++) {
        if (document.querySelectorAll('.btnradio.btn-check')[i].checked) {
            statusS = document.querySelectorAll('.btnradio.btn-check')[i].value;
        }
    }
    if (search != '') {
        // query = 'status=' + statusS + '&search=' + search + '&page=' + page;
        query = 'search=' + search;
    } else query = 'status=' + statusS + '&page=' + page;
    changeUrl(query);
    return query;
}

function ToastMessOrder(mess) {
    const toastLiveExample = document.getElementById('liveToast');
    document.getElementById('toast-donhang').innerHTML = mess;
    const toast = new bootstrap.Toast(toastLiveExample)
    toast.show()
}

function updateOrder(id, action, page) {
    if (confirm('Cập nhật đơn hàng ?')) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                let res = JSON.parse(this.responseText);
                if (res.status == 1) {
                    document.getElementById('quanlydonhang').innerHTML = res.respone;
                    ToastMessOrder(res.message);
                } else ToastMessOrder(res.message);
            }
        };
        xhttp.open("PUT", '/admin/orders/' + id, true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
        xhttp.send(
            QueryAll(page) + '&action='+action
        );
    } else {
        return;
    }

}

// phân trang theo mã đơn hàng
function phantrang(page) {
    // for (let i = 0; i < document.querySelectorAll('.btnradio.btn-check').length; i++) {
    // if (document.querySelectorAll('.btnradio.btn-check')[i].checked) {
    // let statusS = document.querySelectorAll('.btnradio.btn-check')[i].value;
    // console.log(statusS);
    console.log(QueryAll(page))
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            document.getElementById('quanlydonhang').innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", '/admin/paginate-order?' + QueryAll(page), true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
    // break;
    // }
    // }
}

document.getElementById('search_id').addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();
        searched(1);
    }
});

// tìm kiếm mã đơn hàng
function searched(page) {
    // var search = document.getElementById('search_id').value;
    // console.log(search);
    // for (let i = 0; i < document.querySelectorAll('.btnradio.btn-check').length; i++) {
    // if (document.querySelectorAll('.btnradio.btn-check')[i].checked) {
    // let statusS = document.querySelectorAll('.btnradio.btn-check')[i].value;
    // console.log(statusS);
    QueryAll(page)
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            document.getElementById('quanlydonhang').innerHTML = this.responseText;
        }
    };
    // xhttp.open("GET", '/admin/search-order?id=' + search + '&status=' + statusS + '&page=' + page, true);
    xhttp.open("GET", '/admin/search-order?' + QueryAll(page), true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
    // break;
}
// }
// }

// lọc đơn hàng theo trạng thái
for (let i = 0; i < document.querySelectorAll('.btnradio.btn-check').length; i++) {
    document.querySelectorAll('.btnradio.btn-check')[i].addEventListener('click', () => {
        document.getElementById('search_id').value = '';
        let statusOrder = document.querySelectorAll('.btnradio.btn-check')[i].value;
        QueryAll(1)
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('quanlydonhang').innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", '/admin/filter-order?status=' + statusOrder, true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
        xhttp.send();
    })
}


function xuatExcel() {
    console.log(document.getElementById('xuatexcel').dataset.page);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            JSONToCSVConvertor(this.responseText, "order_sheet", true)
        }
    };
    xhttp.open("GET", '/admin/order-excel?page=' + document.getElementById('xuatexcel').dataset.page, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
    xhttp.send();
}

// hám xuất excel
function JSONToCSVConvertor(JSONData, ReportTitle, ShowLabel) {
    //If JSONData is not an object then JSON.parse will parse the JSON string in an Object
    var arrData = typeof JSONData != 'object' ? JSON.parse(JSONData) : JSONData;

    var CSV = '';
    //Set Report title in first row or line

    CSV += ReportTitle + '\r\n\n';

    //This condition will generate the Label/Header
    if (ShowLabel) {
        var row = "";

        //This loop will extract the label from 1st index of on array
        for (var index in arrData[0]) {

            //Now convert each value to string and comma-seprated
            row += index + ',';
        }

        row = row.slice(0, -1);

        //append Label row with line break
        CSV += row + '\r\n';
    }

    //1st loop is to extract each row
    for (var i = 0; i < arrData.length; i++) {
        var row = "";

        //2nd loop will extract each column and convert it in string comma-seprated
        for (var index in arrData[i]) {
            row += '"' + arrData[i][index] + '",';
        }

        row.slice(0, row.length - 1);

        //add a line break after each row
        CSV += row + '\r\n';
    }

    if (CSV == '') {
        alert("Invalid data");
        return;
    }

    //Generate a file name
    var fileName = "";
    //this will remove the blank-spaces from the title and replace it with an underscore
    fileName += ReportTitle.replace(/ /g, "_");

    //Initialize file format you want csv or xls
    var uri = 'data:text/csv;charset=utf-8,%EF%BB%BF' + encodeURI(CSV);

    // Now the little tricky part.
    // you can use either>> window.open(uri);
    // but this will not work in some browsers
    // or you will not get the correct file extension    

    //this trick will generate a temp <a /> tag
    var link = document.createElement("a");
    link.href = uri;

    //set the visibility hidden so it will not effect on your web-layout
    link.style = "visibility:hidden";
    link.download = fileName + ".csv";

    //this part will append the anchor tag and remove it after automatic click
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}