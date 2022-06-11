console.log('test')


class Portfolio_Controller {
    constructor() {
        //Ici le DOM n'est pas encore prêt
        //Pour le moment rien à faire
        this.body = document.body
    }

    run() {
        //Ici le DOM est prêt
        document.documentElement.classList.add('js-enabled');
        // FADE-IN
        let options = {
            root: null,
            rootMargin: '0px',
            threshold: 0.5,
        }

        let aTargets = document.querySelectorAll('.slide-in');
        let observer = new IntersectionObserver(callback, options);
        for (const target of aTargets) {
            observer.observe(target);
            target.addEventListener('load', (event) => {
            })
        }

        function callback(entries, observer) {
            entries.forEach(entry => {
                // chaque élément de entries correspond à une variation
                // d'intersection pour un des éléments cible:
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        };

        function bubbles() {
            console.log('hello')
            const canvas = document.querySelector("canvas");
            canvas.height = window.innerHeight;
            canvas.width = window.innerWidth;
            console.log(window.innerHeight, canvas.height)
            console.log(window.innerWidth, canvas.width)
            let radius = 150 + (Math.random() * (200 - 150));
            if (window.innerWidth > 768) {
                radius *= 1.5;
            }
            let x = (Math.random() * (canvas.width));
            let y = Math.random() * 150;
            console.log(y);
            console.log(canvas.height);
            let ctx = canvas.getContext('2d');
            const color = '#D4E4E5';
            window.addEventListener('resize', () => {
                 x = (Math.random() * (canvas.width));
                 y = Math.random() * 150;
                radius = 150 + (Math.random() * (200 - 150));
                canvas.height = window.innerHeight;
                canvas.width = window.innerWidth;
                if (window.innerWidth > 768) {
                    radius *= 1.5;
                }
                draw();
                console.log('ici');
            });
            draw();
            function draw() {
                //---------------------1
                ctx.save();
                ctx.beginPath();
                ctx.arc(x, y, radius, 0, 2 * Math.PI);
                ctx.lineWidth = 3;
                ctx.strokeStyle = color;
                ctx.stroke();
                //---------------------2
                x += Math.random() > 0.5 ? -x/2 : x/2 ;
                y += 200;
                radius -= 50 + (Math.random() * (100 - 50))
                ctx.beginPath();
                ctx.arc(x, y, radius, 0, 2 * Math.PI);
                ctx.lineWidth = 3;
                ctx.strokeStyle = color;
                ctx.stroke();
                //---------------------3
                x += Math.random() > 0.5 ? -x : x;
                y += 300;
                radius += 50 + (Math.random() * (100 - 50))
                ctx.beginPath();
                ctx.arc(x, y, radius, 0, 2 * Math.PI);
                ctx.lineWidth = 3;
                ctx.strokeStyle = color;
                ctx.stroke();
                ctx.restore();
            }
        }

        bubbles();
    }

}

window.portfolio = new Portfolio_Controller();
window.addEventListener('load', () => window.portfolio.run())