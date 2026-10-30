const btnUser = document.getElementById('user')
const btnRes = document.getElementById('reserve')
const inputsFirst = document.querySelectorAll('.first input')
const inputsSecond = document.querySelectorAll('.second input')
const select = document.querySelector('select')
const spanLeftE=document.getElementById('spanLeft')
const spanRightE=document.getElementById('spanRight')
const imgE=document.querySelector('.second img')

const arrayImg = [
    {
        fileName:'1.jpg',
        place:'Barcelona'
    },
    {
        fileName:'2.jpg',
        place:'Rzym'
    },
    {
        fileName:'3.jpg',
        place:'Londyn'
    }
]

let index=0

btnUser.style.backgroundColor='DodgerBlue'

btnUser.addEventListener('click', e=>{
    btnUser.style.backgroundColor="DodgerBlue"
    btnRes.style.backgroundColor="SkyBlue"
    
    inputsFirst.forEach(inputE =>{
        inputE.disabled=false
    })

    inputsSecond.forEach(inputE =>{
        inputE.disabled=true
    })

    select.disabled=true
})

btnRes.addEventListener('click', e=>{
    btnUser.style.backgroundColor="SkyBlue"
    btnRes.style.backgroundColor="DodgerBlue"
    
    inputsFirst.forEach(inputE =>{
        inputE.disabled=true
    })

    inputsSecond.forEach(inputE =>{
        inputE.disabled=false
    })

    select.disabled=false
})

spanLeftE.addEventListener('click',e=>{
    if(index==0){
        let index=3
    }
    else{
        index--
    }
    imgE.src=arrayImg[index].fileName
    imgE.alt=arrayImg[index].place
})
