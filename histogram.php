<!DOCTYPE html>
<html>
  <head>
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
  
  </head>
  <body>
  <!-- Plotly chart will be drawn inside this DIV -->
    <div id="demo"></div> <br>
    <div id="myDiv"></div>
                                      
    <script>
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var tweettime = this.responseText;      
            alert(tweettime);
                               
        }
    };
    xmlhttp.open("GET", "tweet_data.php", true);
    xmlhttp.send();    

   
    </script>
    
  </body>
<html>
