//Az aktuális URL-t paraméterezi a kiválasztott dátummal
const date = document.getElementById("date");
let url = window.location.origin + window.location.pathname;

date.addEventListener("change", function (e) {
  window.location.href = url + "?date=" + e.target.value;
});
