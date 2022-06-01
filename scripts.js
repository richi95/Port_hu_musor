const channels_buttons = document.getElementsByClassName('channels-buttons');
    const date = document.getElementById('date');
    let url = "http://localhost/webprog/php/portmusor/index.php"

    date.addEventListener('change', function(e) {
      window.location.href = url + "?date=" + e.target.value
    })