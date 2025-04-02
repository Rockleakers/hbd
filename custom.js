var r = document.getElementById("greetings").textContent;
r=r.replaceAll("\\n","<br>");
r=r.replaceAll("\\r","");
document.getElementById("greetings").innerHTML = r;