function get_row(title, values){
    var rows = "";
    for (let k = 0; k < values.length; k++) {
          let v = values[k];

          var live = "_live";
          if (v[1].includes(":")){live = "";}

          // console.log("Live is "+live);

          rows = rows +
            "<tr><td class='l1" + live + "' rowspan='3' style=''>" + v[1] + "<td></tr>" +
            "<tr class='bordert-top'><td class='l2 pb-3 mt-3' style=''>"+ v[2] + "</td><td class='l3"+ live +" mt-3 pb-4' style=''>" + v[3] + "</td></tr>";

          if(k == values.length-1){
            rows = rows + "<tr><td style='' class=' pb-3 mt-3'>" + v[5] + "</td><td class='l3"+live+" pb-3 mt-3' style=''>" + v[4]+ "</td></tr>";
          }
          else {
            rows = rows + "<tr><td style='' class=' pb-3 mt-3'>" + v[5] +
                  "</td><td class='l3"+live+" pb-3 mt-3' style=''>" +v[4] + "</td></tr>";
          }
    }
    var body = "<div class='myHeader'>" + title + "</div><table class='livescore'>" +
                rows + "<table>";
    return body;
}

function get_livescores(filter, live){
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
      // console.log(this.responseText);
         document.getElementById("data_container").innerHTML = this.responseText;//   "Try again later.";
         var data = JSON.parse(this.responseText);
        //  console.log(data);
         var alltables = "";
         for (const key in data){
             alltables = alltables + get_row(key, data[key])  ;
            //  console.log(alltables);
         }
         document.getElementById("data_container").innerHTML = alltables;

    }

    xhttp.open("GET", "get_data.php?filter=" + filter + "&live=" + live, true);
    xhttp.send();
}

function do_search(){
    let term = document.getElementById("edt_search").value;
    let live = document.getElementById("chk_live").checked ? "true" : "false";
    // console.log(live);
    get_livescores(term, live);
    return false;
}


function check_Click(){
    do_search();
}
