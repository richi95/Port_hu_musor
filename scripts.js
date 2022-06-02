//Az aktuális URL-t paraméterezi a kiválasztott dátummal 
const date = document.getElementById("date");
let url = window.location.href;

date.addEventListener("change", function (e) {
  window.location.href = url + "?date=" + e.target.value;
});
