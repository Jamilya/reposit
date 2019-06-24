<?php
if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
else {
    header("Location: includes/login.php");
};?>
<?xml version="1.0" standalone="yes"?>
<!DOCTYPE html>



<html lang="en">
<meta charset="utf-8">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/data/ico/innofit.ico">
    <title>Final Order Amount</title>
    
    		
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7"
        crossorigin="anonymous">

    <style>
      body {
        margin: 0px;
      }

      .domain {
       /* display: none; */
        stroke: #635F5D;
        stroke-width: 1;
      }
      .tick text, .legendCells text {
        fill: #635F5D;
        font-size: 7.5pt;
        font-family: sans-serif;
      }
      .axis-label {
        fill: #635F5D;
        font-size: 10pt;
        font-family: sans-serif;
      }
      .legend-label {
        fill: #635F5D;
        font-size: 7.5t;
        font-family: sans-serif;
      }
      .legend rect {
        fill:white;
        stroke:black;
        opacity:0.8;}

        table {
        border-collapse: collapse;
        }

        table, th, td {
        border: 1px solid black;
        }
        th {
        height: 30px;
        }
        table, th, td {
        text-align: center;
        }
        tr, thead {
        text-align: center;
        }
    </style>


</head>
<!-- <div id = "area1"></div> 
    <div id="area2"></div> -->

<body >


 <nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/index.php">Web tool home</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav">
                    <!--  <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li > -->
            <li><a href="./about.php">About this tool</a></li>
            <li class="dropdown" class = "active">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Visualizations<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li class = "active"><a href="./finalorder.php">Final Order Amount   <span class="sr-only">(current)</span></a></li>
                    <li ><a href="./deliveryplans.php">Delivery Plans </a></li>
                     <li><a href="./forecasterror.php">Forecast Error</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Error Measures</li>                            
                    <li><a href="./mad_graph.php">Mean Absolute Deviation (MAD) </a></li>
                    <li> <a href="./mse_graph.php">Mean Square Error (MSE)</a></li>
                    <li><a href="./rmse_graph.php">Root Mean Square Error (RMSE)</a></li>
                    <li><a href="./mpe.php">Mean Percentage Error (MPE) </a></li>
                    <li><a href="./mape.php">Mean Absolute Percentage Error (MAPE)</a></li>
                    <li><a href="./meanforecastbias.php">Mean Forecast Bias (MFB)</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Matrices</li>
                    <li><a href="./matrix.php">Delivery Plans Matrix</a></li>
                    <li><a href="./matrixvariance.php">Delivery Plans Matrix - With Variance </a></li>
                            <!-- <li role="separator" class="divider"></li>
                            <li class="dropdown-header">New Graphs</li>
                            <li>
                                <a class="dropdown-item" href="./boxplot.php">Box Plot</a>
                            </li> -->
                </ul>
            </li>
          <!-- </ul> -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Corrections <span class="caret"></span> </a>
                        <ul class="dropdown-menu">
                            <li><a href="./cor_rmse.php">Corrected Root Mean Square Error (CRMSE) </a></li>
                        </ul>
                </li>
        </ul>  
                <ul class="nav navbar-nav navbar-right">
                <li>
<!-- GTranslate: https://gtranslate.io/ -->
<a href="#" onclick="doGTranslate('en|en');return false;" title="English" class="gflag nturl" style="background-position:-0px -0px;"><img src="//gtranslate.net/flags/blank.png" height="12" width="12" alt="English" /></a><a href="#" onclick="doGTranslate('en|de');return false;" title="German" class="gflag nturl" style="background-position:-300px -100px;"><img src="//gtranslate.net/flags/blank.png" height="12" width="12" alt="German" /></a>

<style type="text/css">

a.gflag {vertical-align:middle;font-size:16px;padding:1px 0;background-repeat:no-repeat;background-image:url(//gtranslate.net/flags/16.png);}
a.gflag img {border:0;}
a.gflag:hover {background-image:url(//gtranslate.net/flags/16a.png);}
#goog-gt-tt {display:none !important;}
.goog-te-banner-frame {display:none !important;}
.goog-te-menu-value:hover {text-decoration:none !important;}
body {top:0 !important;}
#google_translate_element2 {display:none!important;}

</style>

<div id="google_translate_element2"></div>
<script type="text/javascript">
function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'en',autoDisplay: false}, 'google_translate_element2');}
</script><script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>


<script type="text/javascript">
/* <![CDATA[ */
eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
/* ]]> */
</script>
                </li>
                    <li><a href="/includes/logout.php">Logout</a></li>

            </ul>
        </div> <!--/.nav-collapse -->
    </div> <!--/.container-fluid -->
    </nav>

    <script src="http://d3js.org/d3.v4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/d3-legend/2.24.0/d3-legend.min.js"></script>
    

    <div style="padding-left:39px">

        <h3>Final Order Amount</h3>
        <small>
    <?php
    echo "You are logged in as: ";
    print_r($_SESSION["session_username"]);
    echo ".";
    ?>
        </small>
        <br>
        <br>
        <p> <b>Graph Description: </b>The graph shows the distribution of final orders (FO) per time period (calendar weeks).The <font color="green"> green-coloured line </font>
            is the average (mean) value of all final orders. <br> Additionally, the calculations of several statistical measures are shown in the table below <i>(Hint: please hover over <font color= "#1f77b4 "> circles </font> or over <font color="green"> the line </font>in the graph to see additional details!)</i>
        </p>
    </div>
    <div class="row">
         <!-- <div class="col-md-9">
            <div id="svg"></div>
        </div>  -->
        <div class="col-md-3">
            <div id="table"></div>
        </div>

    </div>

<!-- <script src="https://cdn.rawgit.com/mozilla/localForage/master/dist/localforage.js"></script> -->
<svg width="960" height="500"></svg>
<script> 
    var valuesToPrint = [];

    var finalOrder = JSON.parse(localStorage['finalOrder']);
    var data = JSON.parse(localStorage['data']);

        
            // function valuesPrint() {
            //   var myMean = dataMean;
            //   document.getElementById("dataMean").innerHTML = myMean;
            // }
</script>


<!-- <g id='columnGroup' class='table'>
    <rect x='850' y='7' width='150' height='100' fill='gainsboro' fill-opacity="1"/>
</g> -->


   <!-- <g id='rowGroup' class='table' transform='translate(0, 150)'>
   <rect x='850' y='-15' width='150' height='150' fill='gainsboro' fill-opacity="1"/>
   <text x='840' y='18' font-size='12px' font-weight='bold' fill='grey'>
        
         <tspan x='860' dy='1em'>Median value:</tspan>
         <tspan x='860' dy='1em'>Min Value:</tspan>
         <tspan x='860' dy='1em'>Max Value:</tspan>
         <tspan x='860' dy='1em'>95% Quantile:</tspan>
   <text x='840' y='21' font-size='12px' font-weight='bold' fill='black' text-anchor='left'>
         <tspan y='25'>1</tspan>
         <tspan y='30'>Expenses</tspan>
         <tspan y='35'>Net</tspan>
      </text>
   </g> -->


</svg>
    <script>
        // var finalOrder = localforage.getItem('finalOrder');
        // console.log(finalOrder);
        // console.log(finalOrder[[PromiseValue]]);
        //Promise.all()
        const xValue = d => d.ActualPeriod;
      const xLabel = 'Actual Period';
      const yValue = d => d.OrderAmount;
      const yLabel = 'Final Customer Order (pcs)';
      const colorValue = d => d.Product;
      const colorLabel = 'Product';
      const margin = { left: 55, right: 25, top: 20, bottom: 30 };
      const legendOffset = 57;

 const svg = d3.select('svg');
      const width = svg.attr('width');
      const height = svg.attr('height');
      const innerWidth = width - margin.left - margin.right - legendOffset;
      const innerHeight = height - margin.top - margin.bottom-35;


      
      const g = svg.append('g')
        .attr('transform', `translate(${margin.left},${margin.top})`);
      const xAxisG = g.append('g')
        .attr('transform', `translate(0, ${innerHeight})`);
      const yAxisG = g.append('g');
      const colorLegendG = g.append('g')
        .attr('transform', `translate(${innerWidth + 32}, 28)`)
        .attr('stroke','black')
        .attr('stroke-width',0.5);

        xAxisG.append('text')
          .attr('class', 'axis-label')
          .attr('x', innerWidth / 2)
          .attr('y', 41)
          .text(xLabel);

      yAxisG.append('text')
          .attr('class', 'axis-label')
          .attr('x', -innerHeight / 2)
          .attr('y', -35)
          .attr('transform', `rotate(-90)`)
          .style('text-anchor', 'middle')
          .text(yLabel);



      colorLegendG.append('text')
          .attr('x', -10)
          .attr('y', -38)
          .text(colorLabel);



      const xScale = d3.scaleLinear();
      const yScale = d3.scaleLinear();
      const colorScale = d3.scaleOrdinal(d3.schemeCategory10);

        const xAxis = d3.axisBottom(xScale)
            .ticks(10);

        const yAxis = d3.axisLeft(yScale)
            .ticks(12);

      const colorLegend = d3.legendColor()
        .scale(colorScale)
        .shape('circle');




        d3.json("/includes/getdata.php", function (error, data2) {
            xScale
            .domain([
                d3.min([0, d3.min(finalOrder, function (d) { return d.ActualPeriod })]),
                d3.max([0, d3.max(finalOrder, function (d) { return d.ActualPeriod })])
            ])
            .range([0, innerWidth])
          .nice();
        
          yScale
            .domain([
                d3.min([0, d3.min(finalOrder, function (d) {
                    if (d.PeriodsBeforeDelivery=="0")
                            return d.OrderAmount
                    })]),
                d3.max([0, d3.max(finalOrder, function (d) {
                        if (d.PeriodsBeforeDelivery=="0")
                            return d.OrderAmount
                    })])
                ])
                .range([innerHeight, 0])
          //.range([innerHeight, 0])
          .nice();
            


            // let dataFiltered = data.filter((el) => { return el.PeriodsBeforeDelivery==0; });

          //  console.log("Final orders: ", dataFiltered);

            //console.log('2', parseInt('2'));

            // var margin = { top: 20, right: 25, bottom: 30, left: 55 },
            //     width = 960 - margin.left - margin.right,
            //     height = 590 - margin.top - margin.bottom;

            // var margin2 = { top2: 100, right2: 25, bottom2: 30, left2: 55 },
            //     width2 = 60 - margin.left - margin.right,
            //     height2 = 60 - margin.top - margin.bottom;

            // var x = d3.scaleLinear()
            //     .domain([
            //         d3.min([0, d3.min(finalOrder, function (d) { return d.ActualPeriod })]),
            //         d3.max([0, d3.max(finalOrder, function (d) { return d.ActualPeriod })])
            //     ])
            //     .range([0, width])

            // var y = d3.scaleLinear()
            //     .domain([
            //         d3.min([0, d3.min(finalOrder, function (d) {
            //             if (d.PeriodsBeforeDelivery==0)
            //                 return d.OrderAmount
            //         })]),
            //         d3.max([0, d3.max(finalOrder, function (d) {
            //             if (d.PeriodsBeforeDelivery==0)
            //                 return d.OrderAmount
            //         })])
            //     ])
            //     .range([height, 0])

            // var product = function (d) { return d.Product; },
            //     color = d3.scaleOrdinal(d3.schemeCategory10);

            // var xAxis = d3.axisBottom(x)
            //     .ticks(10);

            // var yAxis = d3.axisLeft(y);
            //     // .ticks(11)


            // var svg = d3.select("#chart").append("svg")
            //     .attr("width", width + margin.left + margin.right)
            //     .attr("height", height + margin.top + margin.bottom)
            //     .append("g")
            //     .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

            var dataMean = d3.mean(finalOrder, function (d) { //Define mean value of Order Amount, i.e. Avg. Order Amount
                return d.OrderAmount;
            });
            console.log("Mean Value: ", dataMean);

            var dataMedian = d3.median(finalOrder, function (d) { //Define median value of Order Amount
                return d.OrderAmount;
            });            
            var dataMax = d3.max(finalOrder, function (d) { //Define maximum  value of Order Amount
                return d.OrderAmount;
            });
            var dataMin = d3.min(finalOrder, function (d) { //Define minimum  value of Order Amount
                return d.OrderAmount;
            });
            var dataQuantile1 = d3.quantile(finalOrder, 0.99, function (d) { 
                return d.OrderAmount;
            });
            var dataQuantile2 = d3.quantile(finalOrder, 0.95, function (d) { 
                return d.OrderAmount;
            });
            var dataQuantile3 = d3.quantile(finalOrder, 0.75, function (d) { 
                return d.OrderAmount;
            });

            //valuesToPrint.push(generateDescObject('Product: ', product));
            valuesToPrint.push(generateDescObject('Mean Value: ', dataMean + " "));
            valuesToPrint.push(generateDescObject('Median Value: ', dataMedian + " "));
            valuesToPrint.push(generateDescObject('Min Value: ', dataMin + "      "));
            valuesToPrint.push(generateDescObject('Max Value: ', dataMax + "      "));
            valuesToPrint.push(generateDescObject('99% Quantile: ', dataQuantile1.toFixed(1) + '  '));
            valuesToPrint.push(generateDescObject('95% Quantile: ', dataQuantile2.toFixed(1) + '  '));
            valuesToPrint.push(generateDescObject('75% Quantile: ', dataQuantile3.toFixed(1) + '  '));

            var productName = function (d) {
                return d.Product;
            }
            var dataMin = d3.min(finalOrder, function (d) { //Define min number of periods
                return d.ActualPeriod;
            });
            var dataMaxPer = d3.max(finalOrder, function (d) { //Define max number of periods
                return d.ActualPeriod;
            });
            //console.log("Amount of Periods: ", dataMaxPer);
            valuesToPrint.push(generateDescObject('Max Number of Periods', dataMaxPer + " "));

            var standardDev = d3.deviation(finalOrder, function (d) { //Define a standard deviation variable
                return d.OrderAmount;
            });
            console.log("Standard Deviation: ", standardDev, 1);
            valuesToPrint.push(generateDescObject('St. Dev.: ', standardDev.toFixed(2), 1));

            var varKo = standardDev / dataMean;
            var roundVarKo = varKo.toFixed(2)
            console.log("Var Ko : ", varKo);
            valuesToPrint.push(generateDescObject('Var. Ko.:: ', roundVarKo + " "));




            //     //console.log('data Mean in px: ', y(dataMean));

            //  svg.append("text")             
            //     .attr("transform", "translate(" + (width-15) + " ," + (height + margin.top - 50) + ")")
            //      .style("text-anchor", "middle")
            //     .attr("x", -410)
            //     .attr("dy", "3.5em")
            //     .attr("y", 3)
            //     .style("font-size","14px")
            //     .style("stroke-width", "1px")
            //     .text("Actual Period"); 

            //   svg.append("g")
            //     .attr("class", "x axis")
            //      .attr("transform", "translate(0," + height + ")")
            //      .style("text-anchor", "end")
            //     .text("Actual Period")
            //     //.attr("class", "label")
            //     // .style("text-anchor", "end")
            //     // .append("text")
            //     // .attr('dy', '.60em') 
            //     .call(xAxis);

            //   svg.append("text")
            //    .attr("transform", "rotate(-90)")
            //    .attr("y", 10)
            //    .attr("x",0 - (height / 1.5))
            //    .attr("dy", "-3em")
            //    .style("font-size","14px")
            //    .style("stroke-width", "1px")
            //     .text("Final Customer Order (pcs)");

            //   svg.append("g")
            //     .attr("class", "y axis")
            // //    .append("text")
            //  //  .attr("class", "label")
            //     // .attr("transform", "translate(0," + height + ")")
            //     // .attr("x", 0)
            //     // .attr("y", 5)
            //     // .attr("dy", ".45em")
            //     // .style("text-anchor", "end")
            //     .style("text-anchor", "end")
            //     .text("Final Customer Order (pcs)")
            //     .call(yAxis);       

            // var circles = svg.selectAll('circle')
            //     .data(finalOrder)
            //     .enter()
            //     .append('circle')
            //     .attr('cx', function (d) { return x(d.ActualPeriod) })
            //     .attr('cy', function (d) {
            //         return y(d.OrderAmount)
            //     })

            //     .attr('r', '7')
            //     .attr('stroke', 'black')
            //     .attr('stroke-width', 1)
            //     //.attr('fill', "3366CC")
            //     .style("fill", "3366CC")
            //     .on('mouseover', function (d) {
            //         d3.select(this)
            //             .transition()
            //             .duration(500)
            //             .style("opacity", 1)
            //             .attr('r', 10)
            //             .attr('stroke-width', 3)
            //     })
            //     .on('mouseout', function () {
            //         d3.select(this)
            //             .transition()
            //             .duration(500)
            //             .attr('r', 7)
            //             .attr('stroke-width', 3)
            //     })
            //     .append('title') // Tooltip
            //     .text(function (d) {
            //         return d.Product +
            //             '\nFinal Customer Order: ' + d.OrderAmount +
            //             '\nActual Period: ' + d.ActualPeriod +
            //             '\nPeriods Before Delivery: ' + d.PeriodsBeforeDelivery
            //     })
            g.selectAll('circle').data(finalOrder)
          .enter().append('circle')
            .attr('cx', d => xScale(xValue(d)))
            .attr('cy', d => yScale(yValue(d)))
            .attr('fill', d => colorScale(colorValue(d)))
            .attr('fill-opacity', 1)
            .attr('r', 8)
            .attr('stroke','black')
             .attr('stroke-width',1)
        .on('mouseover', function (d) {  // Tooltip
               d3.select(this)
                  .transition()
                  .duration(500)
                  .style("opacity", 1)
                  .attr('r', 10)
                  .attr('stroke-width', 3)
            })
            .on('mouseout', function () {
               d3.select(this)
                  .transition()
                  .duration(500)
                  .attr('r', 7)
                  .attr('stroke-width', )
            })
            .append('title') // Tooltip

            .text(function (d) {
               return d.Product +
                  '\nActual Period: ' + d.ActualPeriod +
                  '\nForecast Period: ' + d.ForecastPeriod +
                  '\nPeriods Before Delivery: ' + d.PeriodsBeforeDelivery +
                  '\nOrder Amount: ' + d.OrderAmount
            });

            g.append('line')
            .style('stroke', 'green')
            .attr('stroke-width', 3)
            .data (finalOrder)
            .attr('x1', 0)
            .attr('y1', yScale(dataMean))
            .attr('x2', width-131)
            .attr('y2', yScale(dataMean))
            .on('mouseover', function (d) {  // Tooltip
               d3.select(this)
                  .transition()
                  .duration(500)
                  .style("opacity", 1)
                  //.attr('r', 10)
                  .attr('stroke-width', 4.5)
            })
            .on('mouseout', function () {
               d3.select(this)
                  .transition()
                  .duration(500)
                  .attr('x1', 0)
                  .attr('y1', yScale(dataMean))
                  .attr('x2', width-131)
                 .attr('y2', yScale(dataMean))
                  //.attr('r', 7)
                  .attr('stroke-width', 3)
            })
            .append('title') // Tooltip

            .text(function (d) {
               return d.Product +
                  '\nAverage: ' + dataMean
                  
            });
            
            xAxisG.call(xAxis);
            yAxisG.call(yAxis);
            colorLegendG.call(colorLegend)
            .attr('class', 'legendCells')
            .selectAll('.cell text')
            .attr("x", -43)
            .attr("y", -10);

            colorLegendG.call(colorLegend)
            .attr('class', 'legendCells')
            .selectAll('.cell circle')
            .attr("cx", 35)
            .attr("cy", -11);
            //.attr('dy', '0.1em')

            colorLegendG.append('rect').attr("x",23).attr("y",12).attr("width", 21).attr("height", 2).style("fill", "green")
            colorLegendG.append("text").attr("x", -23).attr("y", 18).text("Av. \nline").style("font-size", "12px")

       var _lsTotal=0,_xLen,_x;for(_x in localStorage){ if(!localStorage.hasOwnProperty(_x)){continue;} _xLen= ((localStorage[_x].length + _x.length)* 2);_lsTotal+=_xLen; console.log(_x.substr(0,50)+" = "+ (_xLen/1024).toFixed(2)+" KB")};console.log("Total Localstorage size = " + (_lsTotal / 1024).toFixed(2) + " KB");
            // var svg = d3.select("#new_legend")

            // // Handmade legend
            // svg.append("circle").attr("cx",70).attr("cy",15).attr("r", 6).style("fill", "3366CC")
            // svg.append("rect").attr("x",170).attr("y",15).attr("width", 15).attr("height", 3).style("fill", "grey")                
                
            // //svg.append("circle").attr("cx",200).attr("cy",160).attr("r", 6).style("fill", "#404080")
            // svg.append("text").attr("x", 90).attr("y", 15).text("Product 1").style("font-size", "15px").attr("alignment-baseline","middle")
            // svg.append("text").attr("x", 190).attr("y", 15).text("Average line").style("font-size", "15px").attr("alignment-baseline","middle")


                tabulate(valuesToPrint, ['Description', 'Value']);

        });

    
        
            // The table generation function
            function tabulate(data, columns) {
                        var table = d3.select('#table').append('table')
                        var thead = table.append('thead')
                        var	tbody = table.append('tbody');

                        // append the header row
                        thead.append('tr')
                        .selectAll('th')
                        .data(columns).enter()
                        .append('th')
                            .text(function (column) { return column; });

                        // create a row for each object in the data
                        var rows = tbody.selectAll('tr')
                        .data(data)
                        .enter()
                        .append('tr');

                        // create a cell in each row for each column
                        var cells = rows.selectAll('td')
                        .data(function (row) {
                            return columns.map(function (column) {
                            return {column: column, value: row[column]};
                            });
                        })
                        .enter()
                        .append('td')
                            .text(function (d) { return d.value; });

                        return table;
                    }

            function generateDescObject(desc, value) {
                const obj = {};
                obj['Description'] = desc;
                obj['Value'] = value;

                return obj;
            }

    </script>



    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script src="/lib/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
		


</body>

</html>