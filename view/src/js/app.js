
const eachMenubars = document.querySelectorAll('.each_menubar')
const dropdowns = document.querySelectorAll('.dropdown')

eachMenubars.forEach((el, index) => {
    el.onmouseover = () => {
        dropdowns[index].classList.remove("d_none")
    }

    el.onmouseout = () => {
        dropdowns[index].classList.add("d_none")
    }

    dropdowns[index].onmouseover = () => {
        dropdowns[index].classList.remove("d_none")
    }

    dropdowns[index].onmouseout = () => {
        dropdowns[index].classList.add("d_none")
    }
})


// format number currency


// format number currency


/*  login */

const btnActions = document.querySelectorAll('.btnAction');
const modals = document.querySelector('.modal');
const xClose = document.querySelectorAll('.x-close');
const backdrops = document.querySelector('.backdrop-wrapper');

btnActions.forEach((el, index) => {
    el.onclick = () => {
        modals.classList.add('active');
        backdrops.style = "display: flex";
    }

    if (xClose[index]) {
        xClose[index].onclick = () => {
            modals.classList.remove('active');
            backdrops.style = "display: none";
        }
    }
});

$("#loginBtn").on("click", function () {
    let username = $("#login_username").val()
    let password = $("#login_password").val()

    $.ajax({
        type: "POST",
        url: "?mod=request&act=apilogin",
        data: JSON.stringify({
            username: username,
            password: password
        }),
        success: function (res) {

            let json_data = JSON.parse(res);

            if (json_data.status == true) {
                toast({
                    title: "Success!",
                    message: json_data.message,
                    type: "success",
                    duration: 3000
                });

                setTimeout(function () {
                    location.reload()
                }, 3000)

            } else {
                toast({
                    title: "Failed",
                    message: json_data.message,
                    type: "error",
                    duration: 3000
                });
            }
            console.log(json_data);
        }
    })
})


/*  signup */


$("#signup_retypepass").on('change', function () {
    let password = $("#signup_password").val()
    let retypepass = $("#signup_retypepass").val()

    if (retypepass !== password) {
        $(this).css({
            "border": "1px solid red",
            'box-shadow': "0 0 5px red"
        });
        $("#error-text").text("retype-password is not correct");
    } else {
        $(this).css({
            border: "",
            'box-shadow': ""
        });
        $("#error-text").text("");
    }
});

const submitBtn = $("#signupbtn")
submitBtn.click(function (e) {

    let email = $("#signup_email").val()
    let username = $("#signup_username").val()
    let password = $("#signup_password").val()
    let retypepass = $("#signup_retypepass").val()

    e.preventDefault()

    if ((retypepass === password)) {
        $.ajax({
            type: "POST",
            url: "?mod=request&act=apisignup",
            data: JSON.stringify({
                email: email,
                username: username,
                password: password,
                retypepass: retypepass,
            }),
            success: function (res) {

                let json_data = JSON.parse(res);

                if (json_data.status == true) {
                    toast({
                        title: "Success!",
                        message: json_data.message,
                        type: "success",
                        duration: 3000
                    });

                    setTimeout(function () {
                        location.reload()
                    }, 3000)

                } else {
                    toast({
                        title: "Failed",
                        message: json_data.message,
                        type: "error",
                        duration: 3000
                    });
                }
                console.log(json_data);
            }
        })
    }

})
// format price
function formatNum(number) {
    const formatter = new Intl.NumberFormat('en-US');
    if (number == 0) {
        return "";
    } else {
        return formatter.format(number);
    }
}

const fmPrice = document.querySelectorAll('.fm-price');

fmPrice.forEach(item => {
    item.textContent = formatNum(+item.textContent)
})


//toast message

// Toast function
function toast({ title = "", message = "", type = "info", duration = 3000 }) {
    const main = document.getElementById("toast");
    if (main) {
        const toast = document.createElement("div");

        // Auto remove toast
        const autoRemoveId = setTimeout(function () {
            main.removeChild(toast);
        }, duration + 1000);

        // Remove toast when clicked
        toast.onclick = function (e) {
            if (e.target.closest(".toast__close")) {
                main.removeChild(toast);
                clearTimeout(autoRemoveId);
            }
        };

        const icons = {
            success: "fas fa-check-circle",
            info: "fas fa-info-circle",
            warning: "fas fa-exclamation-circle",
            error: "fas fa-exclamation-circle"
        };
        const icon = icons[type];
        const delay = (duration / 1000).toFixed(2);

        toast.classList.add("toast", `toast--${type}`);
        toast.style.animation = `slideInLeft ease .3s, fadeOut linear 1s ${delay}s forwards`;

        toast.innerHTML = `
                      <div class="toast__icon">
                          <i class="${icon}"></i>
                      </div>
                      <div class="toast__body">
                          <h3 class="toast__title">${title}</h3>
                          <p class="toast__msg">${message}</p>
                      </div>
                      <div class="toast__close">
                          <i class="fas fa-times"></i>
                      </div>
                  `;
        main.appendChild(toast);
    }
}


// modal switch 

$(".switchform").click(function () {

    const type = $(this).attr("btn-type")

    $(".body-form").each(function () {
        $(this).removeClass("active-form")
    })

    $("." + type).addClass("active-form")
    $(".switchform").each(function () {
        $(this).removeClass("active")
    })

    $(this).addClass("active")
    $(".label-bottom." + type).addClass("active")
})

function formatNum(number) {
    const formatter = new Intl.NumberFormat('en-US');
    if (number == 0) {
        return "";
    } else {
        return formatter.format(number);
    }
}

$("#inputcrypto").on('input', function () {
    const type_value = $("#inputUSD").attr("coinPrice-value")

    let cryptoValue = $(this).val()
    if (cryptoValue == "" || isNaN(cryptoValue)) {
        cryptoValue = 0
    }

    let convertToUSD = parseFloat(cryptoValue) * parseFloat(type_value)
    $("#inputUSD").val(formatNum(convertToUSD.toFixed(2)))
})

$("#inputUSD").on('input', function () {
    const type_value = $("#inputUSD").attr("coinPrice-value")

    let valueUSD = $(this).val()
    if (valueUSD == "" || isNaN(valueUSD)) {
        valueUSD = 0
    }

    $("#inputcrypto").val(formatNum((parseFloat(valueUSD) / parseFloat(type_value)).toFixed(2)))
})


//////////////////////////// modal edit profile admin /////////////////////

const btnAdminEdit = document.querySelector('.edit_admin_btn');
const modalAdmin = document.querySelector('.modal_admin');
const closeModalAdmin = document.querySelector('.closeModalAdmin');
const backdropModalAdmin = document.querySelector('.backdrop_modal_admin');


if (btnAdminEdit) {

    btnAdminEdit.onclick = () => {
        modalAdmin.classList.add('active');
        backdropModalAdmin.style = "display: flex";
        if (closeModalAdmin) {
            closeModalAdmin.onclick = () => {
                modalAdmin.classList.remove('active');
                backdropModalAdmin.style = "display: none";
            }
        }
    }
}



///////////////////////////// search bar //////////////////

const search_area = document.querySelector('.search_area')
const boxSearch = document.querySelector('.boxSearch_hidden')
const closeSearch = document.querySelector('.closeSearch')

search_area.onclick = () => {
    boxSearch.classList.add('active')
    $('#searchInput').focus()
}

closeSearch.onclick = () => {
    boxSearch.classList.remove('active')
    $(".resultSearch").html("")
    $('#searchInput').val("")
}

////////////////////////// editDetailBtn editable ////////////////////
const editDetailBtn = document.querySelectorAll('.editDetailBtn')
const modal_CurrLatest = document.querySelectorAll('.modal_CurrLatest');
const closeModalCurrLatest = document.querySelectorAll('.closeModalCurrLatest');
const backdropModalCurrLatest = document.querySelectorAll('.backdrop_modal_CurrLatest');

editDetailBtn.forEach((el, index) => {
    el.onclick = () => {
        modal_CurrLatest[index].classList.add('active');
        backdropModalCurrLatest[index].style = "display: flex";
        if (closeModalCurrLatest) {
            closeModalCurrLatest[index].onclick = () => {
                modal_CurrLatest[index].classList.remove('active');
                backdropModalCurrLatest[index].style = "display: none";
            }
        }
    }
})

// search bar 

$('#searchInput').on("input", function () {
    let keyword = $('#searchInput').val()
    $.ajax({
        type: "POST",
        url: "?mod=request&act=searchEngine",
        data: JSON.stringify({
            keyword: keyword
        }),
        success: function (res) {
            let data = JSON.parse(res);
            console.log(data);
            if (data.status == false) {
                $(".resultSearch").html("<strong style='margin-top: 24px; text-align: center;'>Not found</strong>")
            } else {
                let html = data.result.map((json_data) => {
                    return `<a href="?mod=page-detail&id=${json_data.id}" target="_blank" class="mt_24px pointer resultSearchTag">
                                <div>
                                    <span>ID: ${json_data.id}</span>
                                    <span style='margin-left: 8px;'>Rank: ${json_data.cmc_rank}</span>
                                </div>
                                <div class=''>
                                    <strong style='margin-top: 8px; color: #3861FB;'>${json_data.name_product}</strong>
                                    <strong style='color: #3861FB; margin-left: 8px;'>${json_data.symbol}</strong>
                                </div>
                            </a>`
                }).join(" ")
                $(".resultSearch").html(html)
            }
        }
    })
})

// order 

// fetch('http://localhost/MPA/model/openOrders.php', {
//     method: 'POST',
//     headers: {
//         'Content-Type': 'application/json',
//     }
// })
//     .then(response => response.json())
//     .then(data => {
//         console.log(data);
//         if (data.status) {
//             // Success
//             console.log(data.message);
//         } else {
//             // Failure
//             console.error(data.message);
//         }
//     })
//     .catch(error => {
//         // Handle errors here
//         console.error('Error:', error);
//     });
