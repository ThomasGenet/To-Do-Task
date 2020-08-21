class Pagination{
    constructor(){
        this.list = document.getElementById('projectList');
        this.actualPage = 1;
        this.tableList;
        this.numberOfItems = 5;
        this.first = 0;
    }
    showList(){
        
        for(let i = this.first; i < this.numberOfItems;i++){
          //console.log(i);
          if(i<this.numberOfItems){
            this.tableList += `
            <div class="col-sm">
              <card>${this.list[i]}</card>
            </div>
          `  
          }
        }
        
        document.getElementById('projectList').innerHTML = this.tableList;	
        
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