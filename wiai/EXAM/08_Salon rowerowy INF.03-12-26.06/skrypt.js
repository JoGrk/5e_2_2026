const rangeHeightE = document.querySelector('#height-range')
const numberHeightE = document.querySelector('#height-num')
const btnE = document.querySelector('button')
const mountainE = document.querySelector('#mountain')
const roadE = document.querySelector('#road')
const trekkingE = document.querySelector('#trekking')
const pE = document.getElementById('result')
const dateE = document.getElementById('date')

rangeHeightE.addEventListener('input',e=>{
    numberHeightE.value = rangeHeightE.value
})

btnE.addEventListener('click', e=>{
    let height = numberHeightE.value
    let type
    if(mountainE.checked){
        type = height*0.26
    }
    else if(roadE.checked){
        type = height*0.3
    }
    else if(trekkingE.checked){
        type = height*0.28
    }
    type = Math.round(type/2.54)
    pE.textContent = ` Zalecany rozmiar ramy to: ${type} cali`
})

let date = new Date()
let day = date.getDate()
if(day<10){
    day = `0${day}`
}
let month = date.getMonth()+1
if(month<10){
    month = `0${month}`
}
let year = date.getFullYear()


dateE.textContent=`${day}.${month}.${year}`