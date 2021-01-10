var btn = document.getElementById('addDomain');

function add(){
   if (btn.style.display == "block"){
      btn.style.display = "none";
   }else{
      btn.style.display = "block";
   }
   return;
}