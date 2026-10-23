 const giftArray =  ["Klocki", "Nowy i szybki rower górski z przerzutkami", "Książka", "Czekolada gorzka z orzechami laskowymi i bakaliami", "Konsola"]

 const giftListE = document.getElementById('gift-list')

document.addEventListener('DOMContentLoaded', e=>{
    giftArray.forEach(gift =>{
        let pE = document.createElement('p')
        pE.textContent=gift

        let divE = document.createElement('div')
        divE.className = 'gift'
        divE.appendChild(pE)

        divE.addEventListener('click',e=>{
            // divE.style.display='none'
            divE.style.visibility='hidden'
        })

        giftListE.appendChild(divE)

        
    })

    
})

