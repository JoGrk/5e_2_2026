
const btn1= document.querySelector('#client')
const bnt2= document.querySelector('#address')
const btn3= document.querySelector('#contact')
const alldiv=document.querySelectorAll('main div')
const progressDiv = document.querySelector('.progress div')
const inputAll = document.querySelectorAll('input')
const agreeE = document.querySelector('#agree')

function showDiv(classs){
    alldiv.forEach(element => {
        element.style.display='none'
            });
    const div= document.querySelector(classs)
    div.style.display='block'
}

btn1.addEventListener('click',e=>{
    showDiv('.first')
})


bnt2.addEventListener('click',e=>{
    showDiv('.second')
})

btn3.addEventListener('click',e=>{
    showDiv('.third')
})

let w = 4

function progressWidth(aha){
    w += aha
    if(w > 100){
        w = 100
    }
    progressDiv.style.width = `${w}%`
}

inputAll.forEach(input=>{
    input.addEventListener('blur', e=>{
        progressWidth(12)
    })
})

agreeE.addEventListener('click',e=>{
    inputAll.forEach(input=>{
        console.log(input.value)
    })
})
