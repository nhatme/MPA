
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


/*  login signup */

const btnActions = document.querySelectorAll('.btnAction');
const modals = document.querySelectorAll('.modal');
const xClose = document.querySelectorAll('.x-close');
const backdrops = document.querySelectorAll('.backdrop-wrapper');

btnActions.forEach((el, index) => {
    el.onclick = () => {
        modals[index].classList.add('active');
        backdrops[index].style = "display: flex";
    }

    xClose[index].onclick = () => {
        modals[index].classList.remove('active');
        backdrops[index].style = "display: none";
    }
});

$("#loginBtn").on("click", function () {
    let username = $("#login_username").val()
    let password = $("#login_password").val()

    $.ajax({
        type: "POST",
        url: "./model/userAccount.php",
        data: JSON.stringify({
            username: username,
            password: password
        }),
        success: function (res) {
            setTimeout(location.reload(), 2000)
        }
    })
})
