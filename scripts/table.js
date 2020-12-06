//------Teriq's code begins here ----------

async function getInfo(link){
  const response = await fetch("expanded_issues.php?title='"+link+"'");
  if(response.ok){
    var issues = await response.json();
    return issues;
  } else{
    const message = "An error has occured: ${response.status}";
    throw new Error(message);
  }
}

function addLinks(){
  var titles = document.getElementsByClassName("title");
  var items = []
  for(item of titles){
    //console.log(item.innerHTML);
    items.push(item);
  };
  return(items);
}

getInfo("Button Glitching");

//-----Teriq'S code ends here----------


function button() {
    var butn1 = document.getElementsByTagName("button")[1];
    var butn2 = document.getElementsByTagName("button")[2];
    var butn3 = document.getElementsByTagName("button")[3];
    var htmll = document.getElementById('result');
    var ret = false;

    butn1.addEventListener("click",function(e) {
       e.preventDefault();
       $.ajax({
        type: 'POST',
        url: "issues_table.php",
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
         url: "issues_table.php",
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
         url: "issues_table.php",
         data:{"button":"mytickets"},
         success: function(data){
             $("#result").html(data);
             }
         });
     });

}

//-------Teriq's Code ---------

function pageSetup(){
  function linkSetup(jso){
    var page = document.getElementsByClassName("mainbar")[0];
    var jso = jso;
    var cont = document.createElement('div');
    var head = document.createElement('div');
    var main = document.createElement('div');
    var aside = document.createElement('div');
    var inneras = document.createElement('div');
    cont.classList.add('issuescont');
    head.classList.add('issuesheader');
    main.classList.add('main');
    aside.classList.add('aside');
    inneras.classList.add('inneras');
    var but1 = document.createElement('button');
    var but2 = document.createElement('button');
    but1.innerHTML = "Mark as Closed";
    but2.innerHTML = "Mark In Progress";
    var title = document.createElement('h1');
    title.innerHTML = jso['title'];
    var subH = document.createElement('h3');
    subH.innerHTML = "Issue#"+jso['id'];
    var descrip = document.createElement('p');
    descrip.innerHTML = jso['descrip'];
    var typ = document.createElement('p');
    typ.innerHTML = "Type:<br>"+jso['typeof'];
    var priority = document.createElement('p');
    priority.innerHTML = "Priority:<br>"+jso['priority'];
    var stat = document.createElement('p');
    stat.innerHTML = "Status:<br>"+jso['stat'];
    var assigned_to = document.createElement('p');
    assigned_to.innerHTML = "Assigned To<br>"+jso['assigned_to'];

    var created_by = document.createElement('p');
    created_by.innerHTML = "> Issue created on " + jso['created'] +
    " by " + jso['created_by'];

    var updated = document.createElement('p');
    var arrow = document.createElement('p');
    updated.innerHTML = "> Last updated on "+jso['updated'];

    head.appendChild(title);
    head.appendChild(subH);
    main.appendChild(descrip);
    main.appendChild(created_by);
    main.appendChild(updated);
    inneras.appendChild(assigned_to);
    inneras.appendChild(typ);
    inneras.appendChild(priority);
    inneras.appendChild(stat);
    aside.appendChild(inneras);
    aside.appendChild(but1);
    aside.appendChild(but2);

    page.innerHTML = "";
    cont.appendChild(head);
    cont.appendChild(main);
    cont.appendChild(aside);
    page.appendChild(cont);

    but1.addEventListener("click", function(){
      var formData = new FormData();
      formData.append("button","closed");
      formData.append("title",jso['title']);
      fetch("expanded_issues.php", {
        method: 'POST',
        body: formData,
      }).then(function(response){
        return response.text();
      }).then(function(text){
        console.log(text);
      }).catch(function(error){
        console.log(error);
      });
      location.reload();
    });

    but2.addEventListener("click", function(){
      var formData = new FormData();
      formData.append("button","inprogress");
      formData.append("title",jso['title']);
      fetch("expanded_issues.php", {
        method: 'POST',
        body: formData,
      }).then(function(response){
        return response.text();
      }).then(function(text){
        console.log(text);
      }).catch(function(error){
        console.log(error);
      });
      location.reload();
    });
  }

  var rows = document.getElementsByTagName("tr");
  button();
  setInterval(function(){
    if(rows.length >1){
      var items = addLinks();
      items.forEach(function(item){
        item.addEventListener("click",async function(e){
          e.preventDefault();
          var link = await getInfo(item.innerHTML);
          linkSetup(link);
        })
      })
    } else if(rows.length == 1){
      console.log("No rows added yet");
    }

  }, 1000);
}

window.onload=pageSetup;

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
        if(textt=='inprogress'){
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
