
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


/*  login */

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
        url: "?mod=request&act=apilogin",
        data: JSON.stringify({
            username: username,
            password: password
        }),
        success: function (res) {
            setTimeout(location.reload(), 2000)
            console.log(JSON.parse(res));
        }
    })
})


/*  signup */


$("#signup_retypepass").on('blur', function () {
    let password = $("#signup_password").val()
    let retypepass = $("#signup_retypepass").val()

    if (retypepass !== password) {
        $(this).css({
            "border": "1px solid red",
            'box-shadow': "0 0 5px red"
        });
        $("#error-text").text("Password is not correct");
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

    let currentDate = new Date();
    let year = currentDate.getFullYear();
    let month = currentDate.getMonth() + 1;
    let day = currentDate.getDate();
    let hours = currentDate.getHours();
    let minutes = currentDate.getMinutes();
    let seconds = currentDate.getSeconds();

    let email = $("#signup_email").val()
    let username = $("#signup_username").val()
    let password = $("#signup_password").val()
    let retypepass = $("#signup_retypepass").val()
    let currentDateTime = `${year}-${month}-${day} -- ${hours}:${minutes}:${seconds}`

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
                currentdateTime: currentDateTime
            }),
            success: function (res) {
                console.log(JSON.parse(res))
            }
        })
    }

})
