<!DOCTYPE html>
<html>
  <head>
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
  
  </head>
  <body>
  <!-- Plotly chart will be drawn inside this DIV -->
    <div id="myDiv"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                                      
    <script>    
var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

var user = getUrlParameter('user');      
var count = getUrlParameter('count');       

    
$.ajax({
  method: "GET",
  url: "tweet_data.php",
  data: { user: user, count: count }
})
  .done(function( tweettime ) {
  tweettime = tweettime.split(','); 
  var trace = {
      x: tweettime,
      type: 'histogram',
    };
  var data = [trace];
  var layout = {
  bargap: 0,
  title: "Twitter Histogram", 
  xaxis: {title: "Time"}, 
  yaxis: {title: "Number of Tweets"}
  };
  Plotly.newPlot('myDiv', data, layout);   
  });    
    
    /*
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          var tweettime = this.responseText;
          tweettime = tweettime.split(','); 
          var trace = {
              x: tweettime,
              type: 'histogram',
            };
          var data = [trace];
          var layout = {
          bargap: 0,
          title: "Twitter Histogram", 
          xaxis: {title: "Time"}, 
          yaxis: {title: "Number of Tweets"}
          };
          Plotly.newPlot('myDiv', data, layout);    
        }
    };
    xmlhttp.open("GET", "tweet_data.php", true);
    xmlhttp.send();     */      
    </script>  
  </body>
<html>
