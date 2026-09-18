const startE = document.querySelector('#start')
const endE = document.querySelector('#end')
const clearE = document.querySelector('#clear')
const olE = document.querySelector('ol')
const inputE = document.getElementById('task')

function createTask(task){
    let liE = document.createElement('li')
    liE.textContent = task
    let btnE = document.createElement('button')
    btnE.textContent = 'X'
    liE.append(btnE)

    btnE.addEventListener('click',e=>{
        liE.remove()
    })
    return liE
}

endE.addEventListener('click', e=>{
    let task = inputE.value.trim()
    if(task != ''){
        let liE = createTask(task)
        olE.append(liE)

        inputE.value=''
    }

})

startE.addEventListener('click',e=>{
     let task = inputE.value.trim()
     if(task != ''){
        let liE = createTask(task)
        olE.prepend(liE)

        inputE.value=''
    }
})

clearE.addEventListener('click',e=>{
    [...olE.children].forEach(li=>{
        li.remove()
    })
})
