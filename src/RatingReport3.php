<?php header('Access-Control-Allow-Origin: *'); ?>
<script src="./js/jquery-3.2.1.min.js" type="text/javascript"></script>
 <script type="text/javascript" src="./js/loader.js"></script>
<script type='text/javascript'  src='./js/functions.js' ></script>
    <script type="text/javascript">
 
      google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChartWeightedAllChannels);
    
  </script>
</head>
<body>
  <div id="line_top_x"></div>
</body>
</html>
