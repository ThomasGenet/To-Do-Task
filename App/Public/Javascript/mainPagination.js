//Pagination affichage
let list = new Pagination();
list.showList();
list.showPageInfo();

//Contrôle des buttons
next = document.getElementById('nextPage');
next.onclick = function(){
    list.nextPage();
}
last = document.getElementById('lastPage');
last.onclick = function(){
    list.lastPage();
}