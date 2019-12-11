<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link href="../style/resources.css" rel="stylesheet">
    <link href="../style/general.css" rel="stylesheet" type="text/css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://unpkg.com/zdog@1/dist/zdog.dist.min.js"></script>
    <!--<script src="zdog-demo.js"></script>-->
   
</head>

<body>
    <?php include "./header.html" ?>
    <div id="resourceNav">
        <p class="test" id="charts">charts</p>
        <p>-</p>
        <p class="test" id="earth">earth</p>
        <p>-</p>
        <p class="test" id="numbers">numbers</p>
    </div>
    <div id="resourceContent">
        <main>
            <div class="stats">
                <h1 class="caption">
                    oil
                </h1>
                <div class="bar">
                    <div class="filled" id="oil"></div>
                </div>
            </div>
            <div class="stats">
                <h1 class="caption">
                    population
                </h1>
                <div class="bar">
                    <div class="filled" id="population"></div>
                </div>
            </div>
            <div class="stats">
                <h1 class="caption">
                    wasted food
                </h1>
                <div class="bar">
                    <div class="filled" id="wastedFood"></div>
                </div>
            </div>
        </main>
        <main style="display: flex; margin-top: -10vh">
            <div class="container">
                <canvas class="illo"></canvas>
            </div>
            <div class="container">
              <canvas class="illo"></canvas>
            </div>
        </main>
        <main>
            <p onclick="animate()">Dies ist ein Typoblindtext. An ihm kann man sehen, ob alle Buchstaben da sind und wie sie aussehen. Manchmal benutzt man Worte wie Hamburgefonts, Rafgenduks oder Handgloves, um Schriften zu testen. Manchmal Sätze, die alle Buchstaben des Alphabets enthalten - man nennt diese Sätze »Pangrams«. Sehr bekannt ist dieser: The quick brown fox jumps over the lazy old dog. Oft werden in Typoblindtexte auch fremdsprachige Satzteile eingebaut (AVAIL® and Wefox™ are testing aussi la Kerning), um die Wirkung in anderen Sprachen zu testen. In Lateinisch sieht zum Beispiel fast jede Schrift gut aus. Quod erat demonstrandum. Seit 1975 fehlen in den meisten Testtexten die Zahlen, weswegen nach TypoGb. 204 § ab dem Jahr 2034 Zahlen in 86 der Texte zur Pflicht werden. Nichteinhaltung wird mit bis zu 245 € oder 368 $ bestraft. Genauso wichtig in sind mittlerweile auch Âçcèñtë, die in neueren Schriften aber fast immer enthalten sind. Ein wichtiges aber schwierig zu integrierendes Feld sind OpenType-Funktionalitäten. Je nach Software und Voreinstellungen können eingebaute Kapitälchen, Kerning oder Ligaturen (sehr pfiffig) nicht richtig dargestellt werden.Dies ist ein Typoblindtext. An ihm kann man sehen, ob alle Buchstaben da sind und wie sie aussehen. Manchmal benutzt man Worte wie Hamburgefonts, Rafgenduks oder Handgloves, um Schriften zu testen. Manchmal Sätze, die alle Buchstaben des Alphabets enthalten - man nennt diese Sätze »Pangrams«. Sehr bekannt ist dieser: The quick brown fox jumps over the lazy old dog. Oft werden in Typoblindtexte auch fremdsprachige Satzteile eingebaut (AVAIL® and Wefox™ are testing aussi la Kerning), um die Wirkung in anderen Sprachen zu testen. In Lateinisch sieht zum Beispiel fast jede Schrift gut aus. Quod erat demonstrandum. Seit 1975 fehlen in den meisten Testtexten die Zahlen, weswegen nach TypoGb. 204 § ab dem Jahr 2034 Zahlen in 86 der Texte zur Pflicht werden. Nichteinhaltung wird mit </p>
        </main>
    </div>
    <script>
      function animate(){
          console.log("test"+this);
          switch(this.innerHTML){
            case "charts": 
              resourceContent.style.right = "0vw";
              break;
            case "earth": 
              resourceContent.style.right = "100vw";
              break;
            case "numbers": 
              resourceContent.style.right = "200vw";
              break;
          }
        }
    </script>
    <script>
        let oilValue = "40%";
        let populationValue = "60%";
        let wastedFoodValue = "33%";
        let values = ['oil', 'population', 'wastedFood'];
        document.getElementById('oil').style.width = '80%';
        document.getElementById('population').style.width = '60%';
        document.getElementById('wastedFood').style.width = '33%';
        //document.getElementById('resourceContent').style.right = "00vw";

        let chartsButton = document.getElementById("charts");
        let earthButton = document.getElementById("earth");
        let numbersButton = document.getElementById("numbers");
        let resourceContent = document.getElementById("resourceContent");
        let buttons = document.getElementsByClassName('test');
        console.log(buttons);
        for (let i = 0; i < buttons.length; i++){
          console.log('test');
          buttons[i].addEventListener('click', animate);
        }
        function animate(){
          console.log('test');
        }
    </script>
    <script>
        /*-- Made with Zdog --*/

// setting up Zdog illustration element
let elements = document.getElementsByClassName('illo');
for (let i = 0; i < elements.length; i++){
let illoElem = elements[i];

const illoSize = 70;
const minWindowSize = Math.min( window.innerWidth - 20, window.innerHeight - 60 );
const zoom = Math.floor( (minWindowSize / illoSize) * 0.75 );
illoElem.setAttribute( 'width', illoSize * zoom );
illoElem.setAttribute( 'height', illoSize * zoom);

// Zdog math variables
const TAU = Zdog.TAU;

// boolean flag for spin 
let isSpinning = true;

// illustration base
const illo = new Zdog.Illustration({
  element: illoElem,
  zoom: zoom,
  dragRotate: true,
  onDragStart: function() {
    isSpinning = false;
  },
  rotate: { y: TAU/4 }
});

// frontside earth
const head = new Zdog.Hemisphere({
  addTo: illo,
  diameter: 40,
  stroke: false,
  color: '#1976B5',
});

// backside earth
new Zdog.Hemisphere({
  addTo: head,
  diameter: 40,
  stroke: false,
  color: '#1976b5',
  rotate: { x: TAU/2 }
});

// light green lands
const land1 = new Zdog.Shape({
  path: [
    { x: 0, y:  0, z:  0 },
    { x: -2, y: 0, z: 5 },
  ],
  translate: { x: 17, y: 5, z: 4 },
  color: "#6FCC50",
  closed: false,
  fill: true,
  stroke: 7,
  addTo: head,
});
land1.copy({
  scale: { x: -1 },
  translate: { x: -17, y: 0, z: 4 },
})

const land2 = new Zdog.Shape({
  path: [
    { x: 0, y:  0, z:  0 },
    { x: -10, y: 0, z: 4 },
  ],
  translate: { x: 13, y: -10, z: 10 },
  color: "#6FCC50",
  closed: false,
  fill: true,
  stroke: 7,
  addTo: head,
});

new Zdog.Shape({
  path: [
    { x: 0, y:  0, z:  0 },
    { x: 5, y: 0, z: 4 },
  ],
  translate: { x: -13, y: -10, z: 10 },
  color: "#6FCC50",
  closed: false,
  fill: true,
  stroke: 7,
  addTo: head,
});

const land3 = new Zdog.Shape({
  path: [
    { x: 0, y:  0, z:  0 },
    { x: -2, y: 0, z: 3 },
  ],
  translate: { x: 13, y: 13, z: 7 },
  color: "#6FCC50",
  closed: false,
  fill: true,
  stroke: 4,
  addTo: head,
});
land3.copy({
  scale: { x: -1 },
  translate: { x: -13, y: 13, z: 7 },
})

const land4 = new Zdog.Shape({
  path: [
    { x: 0, y:  0, z:  0 },
    { x: -7, y: 0, z: 3 },
  ],
  translate: { x: 10, y: -3, z: 16 },
  color: "#6FCC50",
  closed: false,
  fill: true,
  stroke: 4,
  addTo: head,
});
land4.copy({
  scale: { x: -1 },
  translate: { x: -10, y: 3, z: 16 },
})

// light clouds
const cloud1 = new Zdog.Shape({
  path: [
    { x: 0, y:  0, z:  0 },
    { x: -2, y: 0, z: 5 },
  ],
  translate: { x: 20, y: 7, z: 4 },
  color: "#fff",
  closed: false,
  fill: true,
  stroke: 5,
  addTo: head,
});

new Zdog.Shape({
  path: [
    { x: 0, y:  0, z:  0 },
    { x: 3, y: 0, z: 1 },
  ],
  translate: { x: -5, y: 7, z: 20 },
  color: "#fff",
  closed: false,
  fill: true,
  stroke: 5,
  addTo: head,
});

const cloud2 = new Zdog.Shape({
  path: [
    { x: 0, y:  0, z:  0 },
    { x: -5, y: 0, z: 10 },
  ],
  translate: { x: 23, y: 2, z: 4 },
  color: "#fff",
  closed: false,
  fill: true,
  stroke: 4,
  addTo: head,
});
cloud2.copy({
  scale: { x: -1 },
  translate: { x: -23, y: 2, z: 4 },
})

const cloud3 = new Zdog.Shape({
  path: [
    { x: 0, y:  0, z:  0 },
    { x: -2, y: 0, z: 5 },
  ],
  translate: { x: 20, y: -2, z: 7 },
  color: "#fff",
  closed: false,
  fill: true,
  stroke: 2,
  addTo: head,
});
cloud3.copy({
  scale: { x: -1 },
  translate: { x: -20, y: -2, z: 7 },
})

const cloud4 = new Zdog.Shape({
  path: [
    { x: 0, y:  0, z:  0 },
    { x: -2, y: 0, z: 5 },
  ],
  translate: { x: 18, y: -10, z: 7 },
  color: "#fff",
  closed: false,
  fill: true,
  stroke: 3,
  addTo: head,
});
cloud4.copy({
  scale: { x: -1 },
  translate: { x: -18, y: -10, z: 7 },
})

// dark clouds
const cloud5 = new Zdog.Shape({
  path: [
    { x: 0, y:  0, z:  0 },
    { x: 0, y: 0, z: -3 },
  ],
  translate: { x: 20, y: -8, z: -3 },
  color: "#A6B3DA",
  closed: false,
  fill: true,
  stroke: 3,
  addTo: head,
});
cloud5.copy({
  scale: { x: -1 },
  translate: { x: -20, y: -8, z: -3 },
})

const cloud6 = new Zdog.Shape({
  path: [
    { x: 0, y:  0, z:  0 },
    { x: -4, y: 0, z: -7 },
  ],
  translate: { x: 20, y: 0, z: -8 },
  color: "#A6B3DA",
  closed: false,
  fill: true,
  stroke: 6,
  addTo: head,
});
cloud6.copy({
  scale: { x: -1 },
  translate: { x: -20, y: 0, z: -8 },
})

const cloud7 = new Zdog.Shape({
  path: [
    { x: 0, y:  0, z:  0 },
    { x: -3, y: 0, z: -3 },
  ],
  translate: { x: 15, y: 15, z: -8 },
  color: "#A6B3DA",
  closed: false,
  fill: true,
  stroke: 3,
  addTo: head,
});
cloud7.copy({
  scale: { x: -1 },
  translate: { x: -15, y: 15, z: -8 },
})

new Zdog.Shape({
  path: [
    { x: 0, y:  0, z: 0 },
    { x: -5, y:  0, z: 0 },
  ],
  translate: { x: -5, y: -4, z: -18 },
  color: "#A6B3DA",
  fill: true,
  stroke: 8,
  addTo: head,
});

// dark green lands
const land5 = new Zdog.Shape({
  path: [
    { x: 0, y:  0, z: 0 },
    { x: 2.5, y:  0, z: 2 },
  ],
  translate: { x: 7, y: 7, z: -16 },
  color: "#489268",
  fill: true,
  stroke: 4,
  addTo: head,
});
land5.copy({
  scale: { x: -1 },
  translate: { x: -7, y: 12, z: -16 },
})

const land6 = new Zdog.Shape({
  path: [
    { x: 0, y:  0, z: 0 },
    { x: 10, y:  0, z: 9 },
  ],
  translate: { x: 5, y: -2, z: -17 },
  color: "#489268",
  fill: true,
  stroke: 8,
  addTo: head,
});

const land7 = new Zdog.Shape({
  path: [
    { x: 0, y:  0, z: 0 },
    { x: 2.5, y:  0, z: 5 },
  ],
  translate: { x: 13, y: -10, z: -10 },
  color: "#489268",
  fill: true,
  stroke: 4,
  addTo: head,
});
land5.copy({
  scale: { x: -1 },
  translate: { x: -13, y: -10, z: -10 },
  stroke: 5,
})


// spinning animation
function animate() {
  illo.rotate.y += isSpinning ? -0.01 : 0;
  illo.updateRenderGraph();
  requestAnimationFrame( animate );
}

animate();
/*
// reset animation
document.querySelector('.reset-button').onclick = function() {
  isSpinning = false;
  illo.rotate.set({
    y: TAU/4,
  });
  
  setTimeout(() => { 
    isSpinning = true;
  }, 2000);
};*/

}

    </script>
</body>

</html>