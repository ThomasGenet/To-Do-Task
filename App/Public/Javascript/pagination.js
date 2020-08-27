class Pagination{
    constructor(){
        this.list = document.getElementsByClassName('col-sm');
        this.actualPage = 1;
        this.tableList = "";
        this.numberOfItems = 5;
        this.first = 0;
        this.maxPage = Math.ceil(this.list.length / this.numberOfItems);
        
    }
    showList(){
        for(let i = 0; i < this.list.length;i++){
              this.list[i].style.display = "none";

        }
        let fin = this.numberOfItems + this.first;
        
        if(fin > this.list.length ){
            fin = this.list.length ;
        }
        
        for(let i = this.first; i < fin;i++){ 
                this.list[i].style.display = "block";
        }
        
    }
    showPageInfo(){
        document.getElementById('pageInfo').innerHTML = 'Page ' + this.actualPage + ' / ' + this.maxPage;
    }
    nextPage(){
        if(this.first+this.numberOfItems<=this.list.length){
            this.first += this.numberOfItems;
            this.actualPage++;
            this.showList();
            this.showPageInfo();
        }
        
    }
    lastPage(){
        if(this.first-this.numberOfItems >= 0){
            this.first-=this.numberOfItems
            this.actualPage --;
            this.showList();
            this.showPageInfo();
          }
    }
    
}