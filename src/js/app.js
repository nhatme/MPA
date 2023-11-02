const scroll = document.querySelector('.ctn__lists__filter ')
let isDown = false
let startX
let scrollLeft

scroll.addEventListener('mousedown', () => {
    isDown = true
})

scroll.addEventListener('mouseleave', () => {
    isDown = false
    
})


scroll.addEventListener('mouseup', () => {
    isDown = false
    
})


scroll.addEventListener('mousemove', () => {
})


