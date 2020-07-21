function timtiem() {
    var xhttp = new XMLHttpRequest();
    var soto=document.getElementById('soto').value;
    var sothua=document.getElementById('sothua').value;

    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
       document.getElementById("kq").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "xuly.php?soto="+soto+"&sothua="+sothua, true);
    xhttp.send();
  }