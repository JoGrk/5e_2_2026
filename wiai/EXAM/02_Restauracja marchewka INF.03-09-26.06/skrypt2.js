const pancakesE = document.querySelector('#pancakes')
const lasagneE = document.querySelector('#lasagne')
const carrotE = document.querySelector('#carrot')
const brothE = document.querySelector('#broth')
const pieE = document.querySelector('#pie')
const compoteE = document.querySelector('#compote')
const ulE = document.querySelector('ul')
const clearE = document.getElementById('clear')
const sendE = document.getElementById('send')


pancakesE.addEventListener('click',e=>{
    let liE = document.createElement('li')
    liE.textContent='Naleśniki'
    ulE.appendChild(liE)
})

lasagneE.addEventListener('click',e=>{
    let liE = document.createElement('li')
    liE.textContent='Lasagne szpinakowa'
    ulE.appendChild(liE)
})

carrotE.addEventListener('click',e=>{
    let liE = document.createElement('li')
    liE.textContent='Pieczona marchewka'
    ulE.appendChild(liE)
})

brothE.addEventListener('click',e=>{
    let liE = document.createElement('li')
    liE.textContent='Wege rosół'
    ulE.appendChild(liE)
})

pieE.addEventListener('click',e=>{
    let liE = document.createElement('li')
    liE.textContent='Tarta szparagowa'
    ulE.appendChild(liE)
})

compoteE.addEventListener('click',e=>{
    let liE = document.createElement('li')
    liE.textContent='Kompot'
    ulE.appendChild(liE)
})

clearE.addEventListener('click',e=>{
    ulE.innerHTML=''
})
sendE.addEventListener('click',e=>{
    alert('brawo')
        ulE.innerHTML=''
})