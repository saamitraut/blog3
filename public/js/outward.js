function showStock1(params) {
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

            document.getElementById('opening_stock1').value = text.stockdetails.availableStock
        })
        .catch(error => console.error(error));
    fetch("/inward_master/getInwardsByMaterialId/" + params.value, {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/text",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-Token": $('input[name="_token"]').val()
        },
        method: "get",
        credentials: "same-origin",
    })
        .then(response => {
            return response.text();
        })
        .then(text => {
            console.log(text);
            document.getElementById('inward_id1').innerHTML = text
        })
        .catch(error => console.error(error));
}

function showStock2(params) {
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

            document.getElementById('opening_stock2').value = text.stockdetails.availableStock
        })
        .catch(error => console.error(error));
    fetch("/inward_master/getInwardsByMaterialId/" + params.value, {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/text",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-Token": $('input[name="_token"]').val()
        },
        method: "get",
        credentials: "same-origin",
    })
        .then(response => {
            return response.text();
        })
        .then(text => {
            console.log(text);
            document.getElementById('inward_id2').innerHTML = text
        })
        .catch(error => console.error(error));
}

function showStock3(params) {
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
            document.getElementById('opening_stock3').value = text.stockdetails.availableStock
        })
        .catch(error => console.error(error));
    fetch("/inward_master/getInwardsByMaterialId/" + params.value, {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/text",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-Token": $('input[name="_token"]').val()
        },
        method: "get",
        credentials: "same-origin",
    })
        .then(response => {
            return response.text();
        })
        .then(text => {
            console.log(text);
            document.getElementById('inward_id3').innerHTML = text
        })
        .catch(error => console.error(error));
}
function showStock4(params) {
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

            document.getElementById('opening_stock4').value = text.stockdetails.availableStock
        })
        .catch(error => console.error(error));
    fetch("/inward_master/getInwardsByMaterialId/" + params.value, {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/text",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-Token": $('input[name="_token"]').val()
        },
        method: "get",
        credentials: "same-origin",
    })
        .then(response => {
            return response.text();
        })
        .then(text => {
            console.log(text);
            document.getElementById('inward_id4').innerHTML = text
        })
        .catch(error => console.error(error));
}
function showStock5(params) {
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

            document.getElementById('opening_stock5').value = text.stockdetails.availableStock
        })
        .catch(error => console.error(error));
    fetch("/inward_master/getInwardsByMaterialId/" + params.value, {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/text",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-Token": $('input[name="_token"]').val()
        },
        method: "get",
        credentials: "same-origin",
    })
        .then(response => {
            return response.text();
        })
        .then(text => {
            console.log(text);
            document.getElementById('inward_id5').innerHTML = text
        })
        .catch(error => console.error(error));
}


document.getElementById(`issued1`).addEventListener("focusout", (e) => {

    let opening_stock = document.getElementById(`opening_stock1`).value;

    let issued = e.target.value; //console.log(Number(issued) > Number(opening_stock));

    if (Number(issued) > Number(opening_stock)) {
        document.getElementById('OpeningStockalert').style.display = "block";
        document.getElementById('outwardsubmit').style.display = "none";
    } else {
        closing_stock1.value = Number(opening_stock) - Number(issued)
        document.getElementById('OpeningStockalert').style.display = "none";
        document.getElementById('outwardsubmit').style.display = "block";
    }
});
document.getElementById(`issued2`).addEventListener("focusout", (e) => {

    let opening_stock = document.getElementById(`opening_stock2`).value;

    let issued = e.target.value; //console.log(Number(issued) > Number(opening_stock));

    if (Number(issued) > Number(opening_stock)) {
        document.getElementById('OpeningStockalert').style.display = "block";
        document.getElementById('outwardsubmit').style.display = "none";
    } else {
        closing_stock2.value = Number(opening_stock) - Number(issued)
        document.getElementById('OpeningStockalert').style.display = "none";
        document.getElementById('outwardsubmit').style.display = "block";
    }
});
document.getElementById(`issued3`).addEventListener("focusout", (e) => {

    let opening_stock = document.getElementById(`opening_stock3`).value;

    let issued = e.target.value; //console.log(Number(issued) > Number(opening_stock));

    if (Number(issued) > Number(opening_stock)) {
        document.getElementById('OpeningStockalert').style.display = "block";
        document.getElementById('outwardsubmit').style.display = "none";
    } else {
        closing_stock3.value = Number(opening_stock) - Number(issued)
        document.getElementById('OpeningStockalert').style.display = "none";
        document.getElementById('outwardsubmit').style.display = "block";
    }
});
document.getElementById(`issued4`).addEventListener("focusout", (e) => {

    let opening_stock = document.getElementById(`opening_stock4`).value;

    let issued = e.target.value; //console.log(Number(issued) > Number(opening_stock));

    if (Number(issued) > Number(opening_stock)) {
        document.getElementById('OpeningStockalert').style.display = "block";
        document.getElementById('outwardsubmit').style.display = "none";
    } else {
        closing_stock4.value = Number(opening_stock) - Number(issued)
        document.getElementById('OpeningStockalert').style.display = "none";
        document.getElementById('outwardsubmit').style.display = "block";
    }
});
document.getElementById(`issued5`).addEventListener("focusout", (e) => {

    let opening_stock = document.getElementById(`opening_stock5`).value;

    let issued = e.target.value; //console.log(Number(issued) > Number(opening_stock));

    if (Number(issued) > Number(opening_stock)) {
        document.getElementById('OpeningStockalert').style.display = "block";
        document.getElementById('outwardsubmit').style.display = "none";
    } else {
        closing_stock5.value = Number(opening_stock) - Number(issued)
        document.getElementById('OpeningStockalert').style.display = "none";
        document.getElementById('outwardsubmit').style.display = "block";
    }
});

function getRate1(params) {
    fetch("/inward_master/getDetails/" + params.value, {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-Token": $('input[name="_token"]').val()
        },
        method: "get",
        credentials: "same-origin",
    }).then(response => {
        return response.json();
    })
        .then(text => {
            console.log(text);
            document.getElementById('rate1').value = text.rate
            let issued1 = document.getElementById('issued1').value
            document.getElementById('amount1').value = text.rate * issued1
        })
        .catch(error => console.error(error));
}

function getRate2(params) {
    fetch("/inward_master/getDetails/" + params.value, {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-Token": $('input[name="_token"]').val()
        },
        method: "get",
        credentials: "same-origin",
    }).then(response => {
        return response.json();
    })
        .then(text => {
            console.log(text);
            document.getElementById('rate2').value = text.rate
            let issued2 = document.getElementById('issued2').value
            document.getElementById('amount2').value = text.rate * issued2
        })
        .catch(error => console.error(error));
}
function getRate3(params) {
    fetch("/inward_master/getDetails/" + params.value, {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-Token": $('input[name="_token"]').val()
        },
        method: "get",
        credentials: "same-origin",
    }).then(response => {
        return response.json();
    })
        .then(text => {
            console.log(text);
            document.getElementById('rate3').value = text.rate
            let issued3 = document.getElementById('issued3').value
            document.getElementById('amount3').value = text.rate * issued3
        })
        .catch(error => console.error(error));
}
function getRate4(params) {
    fetch("/inward_master/getDetails/" + params.value, {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-Token": $('input[name="_token"]').val()
        },
        method: "get",
        credentials: "same-origin",
    }).then(response => {
        return response.json();
    })
        .then(text => {
            console.log(text);
            document.getElementById('rate4').value = text.rate
            let issued4 = document.getElementById('issued4').value
            document.getElementById('amount4').value = text.rate * issued4
        })
        .catch(error => console.error(error));
}
function getRate5(params) {
    fetch("/inward_master/getDetails/" + params.value, {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-Token": $('input[name="_token"]').val()
        },
        method: "get",
        credentials: "same-origin",
    }).then(response => {
        return response.json();
    })
        .then(text => {
            console.log(text);
            document.getElementById('rate5').value = text.rate
            let issued5 = document.getElementById('issued5').value
            document.getElementById('amount5').value = text.rate * issued5
        })
        .catch(error => console.error(error));
}
function showCustomerDetails(params) {
    // console.log(params);
    fetch("/sms_view_subscribers/details/" + params.value, {
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

            if (text != '0') {
                document.getElementById('customer_name').value = text.SubscriberName
                document.getElementById('mobile').value = text.MobileNo
                document.getElementById('area').value = text.Area
            } else {

                document.getElementById("customernotfound").innerHTML = '<div class="alert alert-primary alert-dismissible" role="alert">Such Customerid not found!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div > ';
            }

        })
        .catch(error => console.error(error));
}