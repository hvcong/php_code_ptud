const $ = document.querySelector.bind(document)
const $$ = document.querySelectorAll.bind(document)
let viewWidth = window.innerWidth
let viewHeight = window.innerHeight

//when document resize
window.addEventListener('resize', e => {
    viewWidth = e.target.innerWidth
    viewHeight = e.target.innerHeight
    handleSlide()
})

window.addEventListener('DOMContentLoaded', (event) => {


});