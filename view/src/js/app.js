
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

