const foodAllE = document.querySelectorAll('div.food')
const ulE = document.querySelector('ul')
const clearE = document.getElementById('clear')
const sendE = document.getElementById('send')

foodAllE.forEach(foodE => {
    foodE.addEventListener('click', e=>{
        let foodName = foodE.children[1].textContent
        let liE = document.createElement('li')
        liE.textContent = foodName
        ulE.appendChild(liE)
    })
}); 

clearE.addEventListener('click',e=>{
    clearList()
})

function clearList(){
    [...ulE.children].forEach(li=>li.remove())
    // ulE.innerHTML=""
}

sendE.addEventListener('click',e=>{
    alert('Zamówienie zostało przekazane do realizacji')
    clearList()
})