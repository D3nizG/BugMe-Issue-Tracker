function button() {
    var butn1 = document.getElementsByTagName("button")[1];
    var butn2 = document.getElementsByTagName("button")[2];
    var butn3 = document.getElementsByTagName("button")[3];
    var htmll= document.getElementById('result');
    butn1.addEventListener("click",function(e) {
       e.preventDefault();
       $.ajax({
        type: 'POST',
        url: "scripts/issues_table.php",
        data:{"button":"all"},
        success: function(data){
            $("#result").html(data);
            }
        }); 
    });

    butn2.addEventListener("click",function(e) {
        e.preventDefault();
        $.ajax({
         type: 'POST',
         url: "scripts/issues_table.php",
         data:{"button":"open"},
         success: function(data){
             $("#result").html(data);
             }
         }); 
     });
     butn3.addEventListener("click",function(e) {
        e.preventDefault();
        $.ajax({
         type: 'POST',
         url: "scripts/issues_table.php",
         data:{"button":"mytickets"},
         success: function(data){
             $("#result").html(data);
             }
         }); 
     });
    
}


window.onload=button;

window.setInterval(function(){
    var ths = document.getElementsByClassName('status');
    var tds = document.getElementsByClassName('typeof');
    for(let a of ths){
        var textt= a.innerHTML;
        if(textt=='open'){
            a.innerHTML="OPEN";
            a.style.backgroundColor='green';
            a.style.color='white';
        }
        else if(textt=='closed'){
            a.innerHTML="CLOSED";
            a.style.backgroundColor='orange';
            a.style.color='white';
        }
        if(textt=='in progress'){
            a.innerHTML="IN PROGRESS";
            a.style.backgroundColor='rgb(255,255,0)';
        }
    }
    for(let b of tds){
        var text1 = b.innerHTML;
        if(text1=='bug'){
            b.innerHTML="Bug";
        }
        else if(text1=='proposal'){
            b.innerHTML="Proposal";
        }
        else if(text1=='task'){
            b.innerHTML="Task";
        }
    }
  }, 10);