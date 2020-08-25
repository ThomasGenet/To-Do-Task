class Pagination{
    constructor(){
        this.list = document.getElementsByClassName('card');
        console.log(this.list); 
        console.log(this.list.length);
        this.actualPage = 1;
        this.tableList = "";
        this.numberOfItems = 5;
        this.first = 0;
        this.maxPage = Math.ceil(this.list.length / this.numberOfItems);
        
    }
    showList(){
        
        for(let i = this.first; i < this.numberOfItems;i++){
          if(i<this.numberOfItems){
            console.log(this.list[i]);
            this.tableList +=  this.list[i];  
          }
        }
        console.log(this.tableList);
    }
    nextPage(){
        if(this.first+this.numberOfItems<=this.list.length){
            this.first += this.numberOfItems;
            this.actualPage++;
            showList();
        }
        
    }
    lastPage(){
        if(this.first-this.numberOfItems >= 0){
            this.first-=this.numberOfItems
            this.actualPage --;
            showList();
          }
    }
    showPageInfo(){
        document.getElementById('pageInfo').innerHTML = 'Page ' + this.actualPage + ' / ' + this.maxPage;
    }
}