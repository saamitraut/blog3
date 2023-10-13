function showStock(params) {
    fetch("/report/details/" + params.value, {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-Token": $('input[name="_token"]').val()
        },
        method: "get",
        credentials: "same-origin",
    })
        .then(response => {
            return response.json();
        })
        .then(text => {
            console.log(text);

            document.getElementById('opening_stock').value = text.stockdetails.availableStock
            document.getElementById('GST').value = text.material_details.GST
        })
        .catch(error => console.error(error));
}

document.getElementById(`received`).addEventListener("focusout", (e) => {

    let opening_stock = document.getElementById(`opening_stock`).value;

    let received = e.target.value; //console.log(Number(issued) > Number(opening_stock));

    closing_stock.value = Number(opening_stock) + Number(received) - Number(document.getElementById(`return`).value)
});

document.getElementById(`return`).addEventListener("focusout", (e) => {

    let opening_stock = document.getElementById(`opening_stock`).value;

    let received = document.getElementById(`received`).value; //console.log(Number(issued) > Number(opening_stock));

    closing_stock.value = Number(opening_stock) + Number(received) - Number(e.target.value)
});

document.getElementById(`rate`).addEventListener("focusout", (e) => {
    let rate = e.target.value;
    let quantity = Number(document.getElementById(`received`).value) - Number(document.getElementById(`return`).value);
    let GST = 1 + Number(document.getElementById(`GST`).value) / 100
    document.getElementById('amount').value = Math.round(quantity * rate * GST + Number(document.getElementById(`transportation`).value));
});

document.getElementById(`transportation`).addEventListener("focusout", (e) => {
    let rate = Number(document.getElementById(`rate`).value);
    let quantity = Number(document.getElementById(`received`).value) - Number(document.getElementById(`return`).value);
    let GST = 1 + Number(document.getElementById(`GST`).value) / 100

    document.getElementById('amount').value = Math.round(quantity * rate * GST + Number(e.target.value));
});

document.getElementById(`paid`).addEventListener("focusout", (e) => {

    let paid = e.target.value;

    pending.value = document.getElementById('amount').value - paid;
});
let cnt = document.querySelectorAll("[required]").length - 1
for (let i = 0; i < cnt; i++) { document.querySelectorAll("[required]")[i].previousElementSibling.classList.add("required") }

function saveRegister(e) {
    e.preventDefault();
    // console.log($('#add_inward_master'));
    var add_inward_masterData = $('#add_inward_master')[0];
    var formData = new FormData(add_inward_masterData);
    $.ajax({
        url: '/inward_master/add-inward_master-post',
        method: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function (response) {
            location.reload();//console.log(response);
        },
        error: function (response) {
            let errors = response.responseJSON.errors;
            errorsOuterDiv.classList.remove('d-none')

            for (const property in errors) {
                // console.log(`${property}: ${errors[property]}`);
                document.getElementById("errors").innerHTML += `<li>${property}: ${errors[property]}</li>`
            }
        }
    })


}