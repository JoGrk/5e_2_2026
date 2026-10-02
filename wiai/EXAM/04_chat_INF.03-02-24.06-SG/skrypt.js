const messageE = document.getElementById('message')
const sendE = document.getElementById('send')
const randomE = document.getElementById('random')
const chatE = document.querySelector('.chat')
const array = ["Świetnie!",
                "Kto gra główną rolę?",
                "Lubisz filmy Tego reżysera?",
                "Będę 10 minut wcześniej",
                "Może kupimy sobie popcorn?",
                "Ja wolę Colę",
                "Zaproszę jeszcze Grześka",
                "Tydzień temu też byłem w kinie na Diunie",
                "Ja funduję bilety"]

sendE.addEventListener('click', e=>{
    let  message = messageE.value 
    const chatBlock = document.createElement('div')
    chatBlock.classList.add('jolka')

    const imgE = document.createElement('img')
    imgE.src = 'jolka.jpg'

    const pE = document.createElement('p')
    pE.textContent = message

    chatBlock.appendChild(imgE)
    chatBlock.appendChild(pE)
    chatE.appendChild(chatBlock)
    chatBlock.scrollIntoView()

    // <div class="jolka">
    //             <img src="jolka.jpg" alt="">
    //             <p>Cześć idziesz jutro do kina?</p>
    //         </div>
})

randomE.addEventListener('click',e=>{
    let index = Math.random()*array.length
     index =Math.floor(index) 
    console.log(index)
    const chatBlock = document.createElement('div')
    const pE = document.createElement('p')
    const imgE = document.createElement('img')
    pE.textContent = array[index]
    imgE.src = 'krzysiek.jpg'
    chatBlock.classList.add('krzysiek')
    chatE.appendChild(chatBlock)
    chatBlock.appendChild(imgE)
    chatBlock.appendChild(pE)
    chatBlock.scrollIntoView()
})