class Weather{
    constructor(){
        this.city = document.getElementById('city').textContent;
        
        console.log(this.city);
    }
    affichage(){
        //mettre this.city à la place de paris
        
        fetch('http://www.prevision-meteo.ch/services/json/'+ this.city)
        .then(response => response.json())
        .then(data => document.getElementById('weather').src = data.current_condition.icon);
        
    }
    
}