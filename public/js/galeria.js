"use strict"
const canvas = document.getElementById('lienzo');
const ctx = canvas.getContext('2d');
const audio = document.getElementById('audio');
ctx.strokeRect(0, 0, canvas.width, canvas.height);
const imagenes = [
  './img/img1.jpg',
  './img/img2.jpg',
  './img/img3.jpg'
];
// Configuramos el tiempo de transición (en milisegundos)
const transitionTime = 10000;

// Definimos el índice de la imagen actual
let indiceImagenActual = 0;

// Cargamos las imágenes
const arrayimagenesCarg = [];
let imagenesCargadas = 0;
for (let i = 0; i < imagenes.length; i++) {
  const img = new Image();
  img.onload = function() {
    imagenesCargadas++;
    if (imagenesCargadas === imagenes.length) {
      // Comenzamos la animación una vez se hayan cargado todas las imágenes
      animate();
    }
  };
  img.src = imagenes[i];
  arrayimagenesCarg.push(img);
}

function animate() {
  // Calculamos la cantidad de tiempo que ha pasado desde el inicio de la animación
  const elapsedTime = Date.now() - startTime;

  // Calculamos el porcentaje de progreso de la transición (entre 0 y 1)
  const progress = Math.min(1, elapsedTime / transitionTime);

  // Dibujamos la imagen actual con la transición easy-in
  const imagenActual = arrayimagenesCarg[indiceImagenActual];
  const indiceSiguienteImagen = (indiceImagenActual + 1) % arrayimagenesCarg.length;
  const siguienteImagen = arrayimagenesCarg[indiceSiguienteImagen];
  ctx.globalAlpha = progress;
  ctx.drawImage(imagenActual, 0, 0, canvas.width, canvas.height);
   let info = ctx.getImageData(0, 0, canvas.width, canvas.height);
  ctx.putImageData(info, 0, 0);
  ctx.globalAlpha = 1 - progress;
  ctx.globalAlpha = 1;

  // Si la transición ha terminado, avanzamos al siguiente índice de imagen
  if (progress === 1) {
    indiceImagenActual = indiceSiguienteImagen;
    audio.play();
    startTime = Date.now();
  }

  // Solicitamos el siguiente cuadro de animación
  requestAnimationFrame(animate);
}

// Comenzamos la animación
let startTime = Date.now();
animate();