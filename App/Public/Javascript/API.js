class Weather{
    constructor(weather){
        this.weather = document.getElementById('weather');
        this.city = document.getElementById('city');
        console.log(this.city);
        
    }
    affichage(){
        
        fetch('http://www.prevision-meteo.ch/services/json/paris')
        .then(response => response.json())
        .then(data => console.log(data.current_condition.icon));
        
    }
    
}