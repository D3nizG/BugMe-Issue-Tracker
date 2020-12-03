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
            // htmll.insertAdjacentHTML('beforeend',data);
            // const tempWrapper = document.createElement('div');
            // tempWrapper.innerHTML = data;
            // document.getElementById('result').appendChild(tempWrapper.firstChild);
            console.log(data);
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
             // htmll.insertAdjacentHTML('beforeend',data);
             // const tempWrapper = document.createElement('div');
             // tempWrapper.innerHTML = data;
             // document.getElementById('result').appendChild(tempWrapper.firstChild);
             console.log(data);
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
             // htmll.insertAdjacentHTML('beforeend',data);
             // const tempWrapper = document.createElement('div');
             // tempWrapper.innerHTML = data;
             // document.getElementById('result').appendChild(tempWrapper.firstChild);
             console.log(data);
             }
         }); 
     });
    
}

window.onload=button;