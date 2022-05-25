class Portfolio_Controller
{
    constructor()
    {
        //Ici le DOM n'est pas encore prêt
        //Pour le moment rien à faire
        console.log(document.body);
        const svg = document.querySelector('svg');
    }
    run(){
        //Ici le DOM est prêt
        console.log('Hello');


    }
}
window.portfolio = new Portfolio_Controller();
window.addEventListener('load', ()=>window.portfolio.run())