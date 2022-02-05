function fillCostumer() {
    $.ajax({
        url: "/api/customers",
        method: "GET",
        dataType: "json",
        header: { token: window.localStorage["token"] },
        success: (res) => {
            var data = res.data.data;
            var content = "";
            for (let i = 0; i < data.length; i++) {
                var item = data[i];
                content += `<option value='${item.id}'>${item.first_name} ${item.last_name}</option>`;
            }
            $(`select[name=customer_id]`).html(content);
        },
        error: (res, status, err) => {
            alert("Terjadi Kesalahan Baca Data Customer");
        },
    });
}

function fillProduct() {
    $.ajax({
        url: "/api/products",
        method: "GET",
        dataType: "json",
        header: { token: window.localStorage["token"] },
        success: (res) => {
            var data = res.data.data;
            var content = "";
            for (let i = 0; i < data.length; i++) {
                var item = data[i];
                content += `<option value='${item.id}'>${item.title} ${item.category}</option>`;
            }
            $(`select[name=product_id]`).html(content);
        },
        error: (res, status, err) => {
            alert("Terjadi Kesalahan Baca Data Produk");
        },
    });
}

function save(id) {
    $.ajax({
        url: "/api/orders" + (id !== undefined ? "/${id}" : ""),
        method: id !== undefined ? "PATCH" : "POST",
        headers: { token: window.localStorage["token"] },
        dataType: "json",
        data: {
            product_id: $("select[name=product_id]").val(),
            customer_id: $("select[name=customer_id]").val(),
            qty: $("input[name=qty]").val(),
        },
        success: (res) => {
            console.log("Sukses", res);
            alert("Data Order Berhasil Disimpan");
            $("modal#Order").modal("hide");
            refreshData();
        },
        error: (res, status, err) => {
            console.log("error:", res);
            alert("Terjadi Kesalahan Simpan Order");
        },
    });
}

document.addEventListener("DOMContentLoaded", (c) => {
    fillCostumer();
    fillProduct();

    $("button#simpan").on("click", (e) => {
        save();
    });
});
