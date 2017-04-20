<?php
session_start();
?>

<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>dashboard</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />


    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script >
    var d;
   var ids;
   var dataSets;
   var l;
   var i;
   var selectShare;
   var mid;
   var count1;
   var count2;
   var count;
   var p11;
   var p12;
   var p21;
   var p22;
    var tradePrice;
   function PrintDiv() {    
       //var buy = document.getElementById('buy');
       var shares = document.getElementById('shares');
       var amount = document.getElementById('amount');

        //angular.element(document.getElementById('buy')).scope().myFunc(shares.value);

        if(shares.value=="TCS")
          tradePrice=2185.50;
        else if(shares.value=="wipro")
           tradePrice=450.45;
         else
          tradePrice=1003.0;

       var popupWin = window.open('', '_blank', 'width=300,height=300');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' +""+" --receipt-- <br><br><br><br><br><br><br><br> customer name:<?php echo $_SESSION["name"]; ?> <p> name of the share:"+ shares.value + "</p><p>no of shares"+(amount.value)+"</p><p>Amount debited from account no <?php echo $_SESSION["bankaccount"]; ?> : "+(amount.value*tradePrice)+' Rs</p> <br><br><br><br><br><br><br><br><footer>-----H&Ksecurities----- </footer> </html>');
        popupWin.document.close();
            }


            function PrintDiv1() {    
       //var buy = document.getElementById('buy');
       var shares = document.getElementById('shares1');
       var amount = document.getElementById('amount1');

        //angular.element(document.getElementById('buy')).scope().myFunc(shares.value);

        if(shares.value=="TCS")
          tradePrice=2185.50;
        else if(shares.value=="wipro")
           tradePrice=450.45;
         else
          tradePrice=1003.0;

       var popupWin = window.open('', '_blank', 'width=300,height=300');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' +""+" --receipt-- <br><br><br><br><br><br><br><br> customer name:<?php echo $_SESSION["name"]; ?> <p> name of the share:"+ shares1.value + "</p><p>no of shares"+(amount1.value)+"</p><p>Amount credited from account no <?php echo $_SESSION["bankaccount"]; ?> : "+(amount1.value*tradePrice)+'</p> <br><br><br><br><br><br><br><br><footer>-----H&Ksecurities----- </footer> </html>');
        popupWin.document.close();
            }

   function showDiv() {
   document.getElementById('welcomeDiv').style.display = "block";
};
 
  function showDiv1() {
   document.getElementById('welcomeDiv1').style.display = "block";
}; 

 function showDiv2() {
   document.getElementById('welcomeDiv2').style.display = "block";
}; 

    var app = angular.module('myApp', []);
app.controller('customersCtrl', function($scope, $http) {

        $scope.myshare;

      $scope.selectedShare =  "TCS";


    $scope.share = [
        {model : "TCS"},
        {model : "Wipro"},
        {model : "Reliance"}
    ];

    $scope.selectedDays =  1;


    $scope.days = [
        {model : 0},
        {model : 5},
        {model : 10},
        {model : 15},
        {model : 20},
        {model : 30}
    ];

    $scope.selectedMonths =  0;


    $scope.months = [
        {model : 0},
        {model : 1},
        {model : 2},
        {model : 3},
        {model : 6},
        {model : 9}
    ];

    $scope.selectedYears =  0;


    $scope.years = [
        {model : 0},
        {model : 1},
        {model : 3},
        {model : 5},
        {model : 8},
        {model : 10},
        {model : 12}
    ];

    
//log($scope.selectShare);


$scope.myFunc = function(selectedShare) {
      
 
 
$scope.selectedShare= selectedShare;

//alert($scope.selectedShare);
    $http.get("https://www.quandl.com/api/v3/datasets/NSE/"+$scope.selectedShare+".json?api_key=xMH7BiBu6s24LHCizug3")
    .then(function (response) {

      alert("bro");
      $scope.names = response.data.dataset.column_names[1];

      $scope.d1 = response.data.dataset.data[0][1];
      tradePrice=$scope.d1;

      $scope.d = response.data.dataset.data;
       d=$scope.d;

      $scope.id = response.data.dataset.id;
      ids = $scope.id ;
      $scope.dataSets = response.data.dataset.dataset_code;
      dataSets = $scope.dataSets;

      $scope.datacode = response.data.dataset.database_code;

      
    });

     };


     $scope.myfunction = function(myshare) {
      
    $http.get("https://www.quandl.com/api/v3/datasets/NSE/"+myshare+".json?api_key=xMH7BiBu6s24LHCizug3")
    .then(function (response) {
      $scope.names = response.data.dataset.column_names[1];

      $scope.d04 = response.data.dataset.data[0][4];
      tradePrice=$scope.d04; 
      alert(myshare);


      $scope.d = response.data.dataset.data;
       d=$scope.d;

      $scope.id = response.data.dataset.id;
      ids = $scope.id ;
      $scope.dataSets = response.data.dataset.dataset_code;
      dataSets = $scope.dataSets;

      $scope.datacode = response.data.dataset.database_code;

      
    });


     };

     $scope.algo =function()
{ 
max=d[0][1];
min=d[0][1];
      for (i = 0,j=0; i < d.length; i++) { 

        
        if (i==0) {
          v1=0;
        }
        else if (i==1) {
          v2=0;
        }
        else{
          v3=d[i][1];
          temp1=v3;
          /*temp1=(v3+v2+v1)/3;
          v1=v2;
          v2=v3;
          t[j]=temp1;
          j=j+1;
*/
           if (min>temp1) {
            min=temp1;
            }
            if (max<temp1) {
            max=temp1;
            }

        }
  }
mid= (min + max)/3;

for (i = 1,count=0,count1=0,count2=0,p11=0,p12=0,p21=0,p22=0; i < d.length; i++) { 
if (d[i][1]<=mid){
  ++count1;

  if (d[i-1][1]<=mid){
  ++p11;
  }
  else
  {
    ++p21;
  } 


} 
    //console.log(count1);
  //console.log("hi");

else{++count2;

   if (d[i-1][1]<=mid){
  ++p12;
  }
  else
  {
    ++p22;
  } 

}

count = count+1;
}


a=(p11+p21)/(count);
b=(p12+p22)/(count);

//return (min+"-"+max+"-"+count1+"-"+count2+"-"+i+"mid prediction of"+a+"%and"+b+"%"+count);
return ("There is "+(a*100).toFixed(2)+"% prediction between "+min.toFixed(2)+" & "+mid.toFixed(2)+" and "+(b*100).toFixed(2)+"% prediction between "+mid.toFixed(2)+" & "+max.toFixed(2));
}


        $scope.average3 = function()
{
 
google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
$scope.totaldays = ($scope.selectedDays*1) + ($scope.selectedMonths*22)+ ($scope.selectedYears*245);
console.log($scope.totaldays);

      function drawChart() {
        
         var dataArray = [['Date', 'Open', 'Close']];
       i=d.length;
      for(var i= ( $scope.totaldays ) ;i>0;i--){
        
        dataArray.push([d[i][0],  d[i][2],      d[i][3]])
      }
      
      var data = google.visualization.arrayToDataTable(dataArray);

       /* var data = google.visualization.arrayToDataTable([
          ['Date', 'Open', 'Close'],
          [d[0][0],  d[0][1],      d[0][5]],
          [d[1][0],  d[1][1],      d[1][5]],
          [d[2][0],  d[2][1],       d[2][5]],
          [d[3][0],  d[3][1],      d[3][5]]



        ]);
*/
        var options = {
          title: dataSets + ' Company Performance since last '+  $scope.selectedDays +' days ' +  $scope.selectedMonths +' months ' +  $scope.selectedYears +' years',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }

}    

});

      
      document.getElementById("demo").innerHTML = ids;
    </script>
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    H&K Securities.
                </a>
            </div>

            <ul class="nav">
               

                <li class="active">
                    <a href="dashboard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Your Portfolio</p>
                          
                    </a>
                    <?php

                           
include("mysqlconnect.php");

                            $result = mysql_query("SELECT * from portfolio where id='" .$_SESSION["id"]. "' ");
                           
                           


                            if (mysql_num_rows($result) > 0) {
                            // output data of each row
                               echo" &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp name of Shares &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp No. of Shares<br><br>";
                           
                            while($row = mysql_fetch_assoc($result)) {
                            echo" &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp " . $row["shares"]. " &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . $row["amount"]. "<br>";
                            }
                            } else {
                             echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp You have no portfolio";
                            }
                          ?>
                </li>
                
              
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                            </a>
                        </li>
                      <!--  <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret"></b>
                                    <span class="notification">5</span>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>-->
                        <!-- <li>
                           <a href="">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>-->
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                              
                               <?php
                          if($_SESSION["name"]) {
                            ?>
                          Hi <?php echo $_SESSION["name"]; ?>. 
                          <?php
                            }
                            ?>
                            </a>
                        </li>
                       <!-- <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    Dropdown
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                        </li>-->
                        <li>
                             <a href="logout.php" tite="Logout">Logout.</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                  
    
   

    <div ng-app="myApp" ng-controller="customersCtrl">

  <p>Here we are using marcov chain algorithm to predict the  next days opening price of the selected stock.</p>      
      
       <button  class="btn" style="background-color: #8A2BE2;color:white;width:150" name="answer" value="predict-charts" onclick="showDiv1()"> Predict-Charts</button>
   
<div id="welcomeDiv1"  style="display:none;" > WELCOME

   select Company
      <select ng-model="selectedShare">
      <option ng-repeat="x in share" value="{{x.model}}">{{x.model}}</option>
      </select>
      

      days
      <select ng-model="selectedDays">
      <option ng-repeat="x in days" value="{{x.model}}">{{x.model}}</option>
      </select>

      months
      <select ng-model="selectedMonths">
      <option ng-repeat="x in months" value="{{x.model}}">{{x.model}}</option>
      </select>
      
      years 
      <select ng-model="selectedYears">
      <option ng-repeat="x in years" value="{{x.model}}">{{x.model}}</option>
      </select>

    <button ng-click="myFunc(selectedShare)">OK</button>

    <h1>you selected: {{selectedShare}}</h1>

      <p id="curve_chart">{{average3()}}</p>

      <p>Tommorow's opening price prediction:{{algo()}}</p>


<br>
<br>                                

</div>
<br>
<p>TRANSACTION CHARGES: NATURE OF TRANSACTION - RATE OF STT (Charged on Traded Value).

Delivery based transaction in equity - Buyer and seller each to pay 0.125%<br>
<br>
Non-delivery based transaction in equity - Seller to pay 0.025%<br>



      </p>
   
<div><!--<input type="button" name="answer" value="Buy" onclick="showDiv()" />-->
<p>Using the Buy option the shares can be bought and the amount will be debited from your bank account.</p>
    <button  class="btn" style="background-color: #8A2BE2;color:white;width:150" name="answer" value="Buy" onclick="showDiv()"> buy</button>
     
<div id="welcomeDiv"  style="display:none;" > WELCOME


      select Company name<select id="shares">
  <option value="TCS">TCS</option>
  <option value="wipro">wipro</option>
  <option value="Reliance">Reliance</option>
</select>
  

      No. of Shares: <input type="number" id="amount">
       <button  class="btn"   name="buy" id="buy" value="buy" onclick="PrintDiv()"> buy</button>
                                 

</div>
<p>Using the SELL option the shares already bought can be sold and the amount will be credited into your bank account</p>
</div>
      
<div> 
  <button  class="btn" style="background-color: #8A2BE2;color:white;width:150" name="answer" value="Sell" onclick="showDiv2()"> sell</button>
    
<div id="welcomeDiv2"  style="display:none;" > WELCOME


      select Company name<select id="shares1">
  <option value="TCS">TCS</option>
  <option value="wipro">wipro</option>
  <option value="Reliance">Reliance</option>
</select>
  

      No. of Shares: <input type="number" id="amount1">

       <button class="btn"   name="buy" id="sell" onclick="PrintDiv1()" value="sell"> sell</button>
                                 

</div>
</div>
     

    </div>
    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

	
    <script type="text/javascript">
         var globalarray = [];
         var arrLinks =[];
         arrLinks = JSON.parse(window.localStorage.getItem("globalarray"));
        console.log(arrLinks);




    $('#buy').on('click', function ()
    { var shares = document.getElementById('shares').value;
      var amount = document.getElementById('amount').value;
         
   var id = '<?php echo $_SESSION["id"]; ?>';
         var url="shares="+shares+"&id="+id+"&amount="+amount;
          
          
          $.ajax
          ({
            url: "buy.php",
            type : "POST",
            cache : false,
            data : url,
            success: function(response)
            {
           
            console.log(response);
            console.log("hello");
             //window.location.href = "dashboard.php";
              location.reload();
            }
          });
       
    }


  );



    $('#sell').on('click', function ()
    { var shares = document.getElementById('shares1').value;
      var amount = document.getElementById('amount1').value;
         
   var id = '<?php echo $_SESSION["id"]; ?>';
         var url="shares="+shares+"&id="+id+"&amount="+amount;
          
          
          $.ajax
          ({
            url: "sell.php",
            type : "POST",
            cache : false,
            data : url,
            success: function(response)
            {
           
            console.log(response);
            console.log("hello");
             location.reload();
            }
          });
       
    }


  );


</script>

</html>
