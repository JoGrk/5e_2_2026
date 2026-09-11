const foodAllE = document.querySelectorAll('div.food')
const ulE = document.querySelector('ul')

foodAllE.forEach(foodE => {
    foodE.addEventListener('click', e=>{
        let foodName = foodE.children[1].textContent
        let liE = document.createElement('li')
        liE.textContent = foodName
        ulE.appendChild(liE)
    })
}); 