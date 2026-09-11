const fileE = document.querySelector('#file')
const numberE = document.querySelector('#number')
const glossyE = document.querySelector('#glossy')
const matE = document.querySelector('#mat')
const btnLeftE = document.querySelector('#btnLeft')
const secRightE = document.querySelector('.right')


btnLeftE.addEventListener('click',e=>{
    let number = parseInt(numberE.value)
    let price
    if(glossyE.checked){
        price = number*1.50
    }else{
        price = number*2
    }
    let fileName = fileE.files[0].name
      console.log(fileName)
    

    let imgE = document.createElement('img')
    imgE.src = fileName
    secRightE.appendChild(imgE)

    let copiesE = document.createElement('p')
    copiesE.textContent = `liczba kopii ${number}`
    secRightE.append(copiesE)

    let priceE = document.createElement('p')
    priceE.textContent = `cena ${price}`
    secRightE.appendChild(priceE)

  
})