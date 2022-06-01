const date = document.getElementById("date");
let url = "http://localhost/webprog/php/portmusor2/index.php";

date.addEventListener("change", function (e) {
  window.location.href = url + "?date=" + e.target.value;
});
