class Pagination{
    constructor(){
        this.list = document.getElementsByClassName('card');
        console.log(this.list); 
        console.log(this.list.length);
        this.actualPage = 1;
        this.tableList= "";
        this.numberOfItems = 4;
        this.first = 0;
    }
    showList(){
        
        for(let i = this.first; i < this.numberOfItems;i++){
          if(i<this.numberOfItems){
            this.tableList +=  this.list[i];
            console.log(this.list[i]);
          }
          
        }
        console.log(this.tableList);
        
    }
    nextPage(){
        if(this.first+this.numberOfItems<=this.list){
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
}