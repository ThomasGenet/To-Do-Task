//Meteo affichage
let map = new Weather();
map.affichage();

//Pagination affichage
let list = new Pagination();
console.log(list);
list.showList();

//Contrôle des buttons
next = document.getElementById('nextPage');
next.onclick = function(){
    list.nextPage();
}
last = document.getElementById('lastPage');
last.onclick = function(){
    list.lastPage();
}