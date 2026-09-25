const counterE = document.querySelector('#counter')

function counter(){
    let views = localStorage.getItem('views')
    if(views == null){
        views = 0
    }
    
    views= Number(views)
    views = views + 1
    counterE.textContent=views
    localStorage.setItem('views', views)

    
}
counter()
// localStorage.clear()
// localStorage.setItem('views', 0)
// zdecydowanie wymaga poprawy :)