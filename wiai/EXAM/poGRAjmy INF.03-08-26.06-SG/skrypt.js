const counterE = document.querySelector('#counter')

function counter(){
    let views = localStorage.getItem('views')
    if(views == null){
        views = 0
    }
    views += 1
    counterE.textContent=views
    localStorage.setItem('views', views)
}
counter()

// zdecydowanie wymaga poprawy :)