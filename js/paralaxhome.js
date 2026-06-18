//Получаем элемент фона с деревом
const pc = document.getElementById("pc");
 
//При движении мышью вызываем функцию, которая меняет положение фона
document.addEventListener("mousemove", function (e) { MoveBackground(e); });
 
function MoveBackground(e) {
   //Рассчитываем, насколько далеко от начала оси находится курсор: 0 - 0, 0.5 - середина экрана, 1 - ширина экрана (например, 1920)
   //Затем умножаем получившееся число на 30 - настолько будет сдвигаться фон
   //Например, если курсор находится посередине страницы (0.5), то при умножении получится 15
   //Далее отнимаем половину от 30, чтобы фон мог двигаться как влево, так и вправо
   let offsetX = (e.clientX / window.innerWidth * 10) - 15;
   let offsetY = (e.clientY / window.innerHeight * 5) - 5;
 
   //Меняем положение фона
   pc.setAttribute("style", "background-position: " + offsetX + "px " + offsetY + "px;");
}

const book = document.getElementById("book");

document.addEventListener("mousemove", function (e) { MoveBackgroundbook(e); });
 
function MoveBackgroundbook(e) {
   let offsetXbook = (e.clientX / window.innerWidth * 30) - 15;
   let offsetYbook = (e.clientY / window.innerHeight * 10) - 5;

   book.setAttribute("style", "background-position: " + offsetXbook + "px " + offsetYbook + "px;");
}

const pen = document.getElementById("pen");

document.addEventListener("mousemove", function (e) { MoveBackgroundpen(e); });
 
function MoveBackgroundpen(e) {
   let offsetXpen = (e.clientX / window.innerWidth * 50) - 15;
   let offsetYpen = (e.clientY / window.innerHeight * 20) - 5;

   pen.setAttribute("style", "background-position: " + offsetXpen + "px " + offsetYpen + "px;");
}

const grass = document.getElementById("grass");

document.addEventListener("mousemove", function (e) { MoveBackgroundgrass(e); });
 
function MoveBackgroundgrass(e) {
   let offsetXgrass = (e.clientX / window.innerWidth * 8) - 15;
   let offsetYgrass = (e.clientY / window.innerHeight * 3) - 5;

   grass.setAttribute("style", "background-position: " + offsetXgrass + "px " + offsetYgrass + "px;");
}

const notebook = document.getElementById("notebook");

document.addEventListener("mousemove", function (e) { MoveBackgroundnotebook(e); });
 
function MoveBackgroundnotebook(e) {
   let offsetXnotebook = (e.clientX / window.innerWidth * 20) - 15;
   let offsetYnotebook = (e.clientY / window.innerHeight * 15) - 5;

   notebook.setAttribute("style", "background-position: " + offsetXnotebook + "px " + offsetYnotebook + "px;");
}