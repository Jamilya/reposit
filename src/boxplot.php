<?php
if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
else {
    header("Location: includes/login.php");
};?>


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
    <title>Box Plot Graph</title>
    <link href="/lib/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 2000px;
            padding-top: 70px;
        }

        .box {
            font: 10px sans-serif;
        }

        .box line,
        .box rect,
        .box circle {
            fill: steelblue;
            stroke: #000;
            stroke-width: 1px;
        }

        .box .center {
            stroke-dasharray: 3, 3;
        }

        .box .outlier {
            fill: none;
            stroke: #000;
        }

        .axis {
            font: 12px sans-serif;
        }

        .axis path,
        .axis line {
            fill: none;
            stroke: #000;
            shape-rendering: crispEdges;
        }

        .x.axis path {
            fill: none;
            stroke: #000;
            shape-rendering: crispEdges;
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7"
        crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>


</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
                    aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/index.php">Web tool home</a>
            </div>
            <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <!--  <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li > -->
                    <li>
                        <a class="nav-link" href="./about.php">About this tool</a>
                    </li>
                    <div class="nav-link dropdown">
                        <a class="nav-link active" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Visualizations
                            <span class="caret"></span>
                        </a>
                        <ul class="nav-link dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li>
                                <a class="dropdown-item" href="./finalorder.php">Final Order Amount</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="./deliveryplans.php">Delivery Plans</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="./forecasterror.php">Forecast Error</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="./mad_graph.php">Mean Absolute Deviation (MAD)</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="./mse_graph.php">Mean Square Error (MSE)</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="./rmse_graph.php">Root Mean Square Error (RMSE)</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="./mpe.php">Mean Percentage Error (MPE)</a>
                            </li>
                            <li>
                                <a class="dropdown-item " href="./mape.php">Mean Absolute Percentage Error (MAPE)</a>
                            </li>
                            <li>
                                    <a class="dropdown-item " href="./meanforecastbias.php">Mean Forecast Bias</a>
                                </li>
                                <li role="separator" class="divider"></li>
                            <li class="dropdown-header">Corrected Error Measures</li>
                                <li>
                                    <a class="dropdown-item" href="./cor_rmse.php">Corrected Root Mean Square Error (CRMSE)</a>
                                </li>

                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">Matrices</li>
                            <li>
                                <a class="dropdown-item" href="./matrix.php">Delivery Plans Matrix</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="./matrixvariance.php">Delivery Plans Matrix - With Variance</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">New Graphs</li>
                            <li>
                                <a class="dropdown-item active" href="./boxplot.php">Box Plot</a>
                            </li>
                        </ul>
                        </li>
                </ul>
                </div>
                <ul class="nav navbar-nav navbar-right">

                    <li>
                        <a class="nav-link" href="/includes/logout.php">Logout
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                </ul>
    </nav>
    <!--/.nav-collapse -->
    </div>
    </nav>

    <script src="http://d3js.org/d3.v4.min.js"></script>
    <script src="http://d3js.org/d3.v3.min.js"></script>

    <div style="padding-left:39px">
        <br>
        <br>
        <br>
        <h3>Box Plot Graph </h3>
        <p>
        <small>
                <?php
                echo "You are logged in as: ";
                print_r($_SESSION["session_username"]);
                echo ".";
                ?></small>
            <br><br>
            <p> NOTE: This is the box plot graph. <font color="red">(Note: the graph calculation is still under development!)</font></p>
        </p>
    </div>

    <script>

        d3.json("/includes/getdata.php", function (error, data) {
            if (error) throw error;
            //console.log(data);


        var labels = true; // show the text labels beside individual boxplots?

        var margin = { top: 30, right: 50, bottom: 70, left: 50 };
        var width = 800 - margin.left - margin.right;
        var height = 400 - margin.top - margin.bottom;

        var min = Infinity,
            max = -Infinity;

        // parse in the data	
        d3.csv("/data/data3.csv", function (error, csv) {
            // using an array of arrays with
            // data[n][2] 
            // where n = number of columns in the csv file 
            // data[i][0] = name of the ith column
            // data[i][1] = array of values of ith column

            var data = [];
            data[0] = [];
            data[1] = [];
            data[2] = [];
            data[3] = [];
            data[4] = [];
            data[5] = [];
            data[6] = [];
            data[7] = [];
            data[8] = [];
            data[9] = [];
            // add more rows if your csv file has more columns

            // add here the header of the csv file
            data[0][0] = "FW1";
            data[1][0] = "FW2";
            data[2][0] = "FW3";
            data[3][0] = "FW4";
            data[4][0] = "FW5";
            data[5][0] = "FW6";
            data[6][0] = "FW7";
            data[7][0] = "FW8";
            data[8][0] = "FW9";
            data[9][0] = "FW10";
            // add more rows if your csv file has more columns

            data[0][1] = [];
            data[1][1] = [];
            data[2][1] = [];
            data[3][1] = [];
            data[4][1] = [];
            data[5][1] = [];
            data[6][1] = [];
            data[7][1] = [];
            data[8][1] = [];
            data[9][1] = [];

            csv.forEach(function (x) {
                var v1 = Math.floor(x.FW1),
                    v2 = Math.floor(x.FW2),
                    v3 = Math.floor(x.FW3),
                    v4 = Math.floor(x.FW4);
                v5 = Math.floor(x.FW5),
                    v6 = Math.floor(x.FW6),
                    v7 = Math.floor(x.FW7);
                v8 = Math.floor(x.FW8),
                    v9 = Math.floor(x.FW9);
                v10 = Math.floor(x.FW10);
                // add more variables if your csv file has more columns

                var rowMax = Math.max(v1, Math.max(v2, Math.max(v9, v10)));
                var rowMin = Math.min(v1, Math.min(v2, Math.min(v9, v10)));

                data[0][1].push(v1);
                data[1][1].push(v2);
                data[2][1].push(v3);
                data[3][1].push(v4);
                data[4][1].push(v5);
                data[5][1].push(v6);
                data[6][1].push(v7);
                data[7][1].push(v8);
                data[8][1].push(v9);
                data[9][1].push(v10);
                // add more rows if your csv file has more columns

                if (rowMax > max) max = rowMax;
                if (rowMin < min) min = rowMin;
            });

            var chart = d3.box()
                .whiskers(iqr(1.5))
                .height(height)
                .domain([min, max])
                .showLabels(labels);

            var svg = d3.select("body").append("svg")
                .attr("width", width + margin.left + margin.right)
                .attr("height", height + margin.top + margin.bottom)
                .attr("class", "box")
                .append("g")
                .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

            // the x-axis
            var x = d3.scale.ordinal()
                .domain(data.map(function (d) { console.log(d); return d[0] }))
                .rangeRoundBands([0, width], 0.7, 0.3);

            var xAxis = d3.svg.axis()
                .scale(x)
                .orient("bottom");

            // the y-axis
            var y = d3.scale.linear()
                .domain([min, max])
                .range([height + margin.top, 0 + margin.top]);

            var yAxis = d3.svg.axis()
                .scale(y)
                .orient("left");

            // draw the boxplots	
            svg.selectAll(".box")
                .data(data)
                .enter().append("g")
                .attr("transform", function (d) { return "translate(" + x(d[0]) + "," + margin.top + ")"; })
                .call(chart.width(x.rangeBand()));


            // add a title
            svg.append("text")
                .attr("x", (width / 2))
                .attr("y", 0 + (margin.top / 2))
                .attr("text-anchor", "middle")
                .style("font-size", "16px")
                //.style("text-decoration", "underline")  
                .text("Delivery Plans");

            // draw y axis
            svg.append("g")
                .attr("class", "y axis")
                .call(yAxis)
                .append("text") // and text1
                .attr("transform", "rotate(-90)")
                .attr("y", 6)
                .attr("dy", ".71em")
                .style("text-anchor", "end")
                .style("font-size", "14px")
                .text("Order amount (pcs)");

            // draw x axis	
            svg.append("g")
                .attr("class", "x axis")
                .attr("transform", "translate(0," + (height + margin.top + 10) + ")")
                .call(xAxis)
                .append("text")             // text label for the x axis
                .attr("x", (width / 2))
                .attr("y", 19)
                .attr("dy", ".79em")
                .style("text-anchor", "end")
                .style("font-size", "14px")
                .text("Forecast week");
        });

        // Returns a function to compute the interquartile range.
        function iqr(k) {
            return function (d, i) {
                var q1 = d.quartiles[0],
                    q3 = d.quartiles[2],
                    iqr = (q3 - q1) * k,
                    i = -1,
                    j = d.length;
                while (d[++i] < q1 - iqr);
                while (d[--j] > q3 + iqr);
                return [i, j];
            };
        }
        (function () {

            // Inspired by http://informationandvisualization.de/blog/box-plot
            d3.box = function () {
                var width = 1,
                    height = 1,
                    duration = 0,
                    domain = null,
                    value = Number,
                    whiskers = boxWhiskers,
                    quartiles = boxQuartiles,
                    showLabels = true, // whether or not to show text labels
                    numBars = 4,
                    curBar = 1,
                    tickFormat = null;

                // For each small multiple…
                function box(g) {
                    g.each(function (data, i) {
                        //d = d.map(value).sort(d3.ascending);
                        //var boxIndex = data[0];
                        //var boxIndex = 1;
                        var d = data[1].sort(d3.ascending);

                        // console.log(boxIndex); 
                        //console.log(d); 

                        var g = d3.select(this),
                            n = d.length,
                            min = d[0],
                            max = d[n - 1];

                        // Compute quartiles. Must return exactly 3 elements.
                        var quartileData = d.quartiles = quartiles(d);

                        // Compute whiskers. Must return exactly 2 elements, or null.
                        var whiskerIndices = whiskers && whiskers.call(this, d, i),
                            whiskerData = whiskerIndices && whiskerIndices.map(function (i) { return d[i]; });

                        // Compute outliers. If no whiskers are specified, all data are "outliers".
                        // We compute the outliers as indices, so that we can join across transitions!
                        var outlierIndices = whiskerIndices
                            ? d3.range(0, whiskerIndices[0]).concat(d3.range(whiskerIndices[1] + 1, n))
                            : d3.range(n);

                        // Compute the new x-scale.
                        var x1 = d3.scale.linear()
                            .domain(domain && domain.call(this, d, i) || [min, max])
                            .range([height, 0]);

                        // Retrieve the old x-scale, if this is an update.
                        var x0 = this.__chart__ || d3.scale.linear()
                            .domain([0, Infinity])
                            // .domain([0, max])
                            .range(x1.range());

                        // Stash the new scale.
                        this.__chart__ = x1;

                        // Note: the box, median, and box tick elements are fixed in number,
                        // so we only have to handle enter and update. In contrast, the outliers
                        // and other elements are variable, so we need to exit them! Variable
                        // elements also fade in and out.

                        // Update center line: the vertical line spanning the whiskers.
                        var center = g.selectAll("line.center")
                            .data(whiskerData ? [whiskerData] : []);

                        //vertical line
                        center.enter().insert("line", "rect")
                            .attr("class", "center")
                            .attr("x1", width / 2)
                            .attr("y1", function (d) { return x0(d[0]); })
                            .attr("x2", width / 2)
                            .attr("y2", function (d) { return x0(d[1]); })
                            .style("opacity", 1e-6)
                            .transition()
                            .duration(duration)
                            .style("opacity", 1)
                            .attr("y1", function (d) { return x1(d[0]); })
                            .attr("y2", function (d) { return x1(d[1]); });

                        center.transition()
                            .duration(duration)
                            .style("opacity", 1)
                            .attr("y1", function (d) { return x1(d[0]); })
                            .attr("y2", function (d) { return x1(d[1]); });

                        center.exit().transition()
                            .duration(duration)
                            .style("opacity", 1e-6)
                            .attr("y1", function (d) { return x1(d[0]); })
                            .attr("y2", function (d) { return x1(d[1]); })
                            .remove();

                        // Update innerquartile box.
                        var box = g.selectAll("rect.box")
                            .data([quartileData]);

                        box.enter().append("rect")
                            .attr("class", "box")
                            .attr("x", 0)
                            .attr("y", function (d) { return x0(d[2]); })
                            .attr("width", width)
                            .attr("height", function (d) { return x0(d[0]) - x0(d[2]); })
                            .transition()
                            .duration(duration)
                            .attr("y", function (d) { return x1(d[2]); })
                            .attr("height", function (d) { return x1(d[0]) - x1(d[2]); });

                        box.transition()
                            .duration(duration)
                            .attr("y", function (d) { return x1(d[2]); })
                            .attr("height", function (d) { return x1(d[0]) - x1(d[2]); });

                        // Update median line.
                        var medianLine = g.selectAll("line.median")
                            .data([quartileData[1]]);

                        medianLine.enter().append("line")
                            .attr("class", "median")
                            .attr("x1", 0)
                            .attr("y1", x0)
                            .attr("x2", width)
                            .attr("y2", x0)
                            .transition()
                            .duration(duration)
                            .attr("y1", x1)
                            .attr("y2", x1);

                        medianLine.transition()
                            .duration(duration)
                            .attr("y1", x1)
                            .attr("y2", x1);

                        // Update whiskers.
                        var whisker = g.selectAll("line.whisker")
                            .data(whiskerData || []);

                        whisker.enter().insert("line", "circle, text")
                            .attr("class", "whisker")
                            .attr("x1", 0)
                            .attr("y1", x0)
                            .attr("x2", 0 + width)
                            .attr("y2", x0)
                            .style("opacity", 1e-6)
                            .transition()
                            .duration(duration)
                            .attr("y1", x1)
                            .attr("y2", x1)
                            .style("opacity", 1);

                        whisker.transition()
                            .duration(duration)
                            .attr("y1", x1)
                            .attr("y2", x1)
                            .style("opacity", 1);

                        whisker.exit().transition()
                            .duration(duration)
                            .attr("y1", x1)
                            .attr("y2", x1)
                            .style("opacity", 1e-6)
                            .remove();

                        // Update outliers.
                        var outlier = g.selectAll("circle.outlier")
                            .data(outlierIndices, Number);

                        outlier.enter().insert("circle", "text")
                            .attr("class", "outlier")
                            .attr("r", 5)
                            .attr("cx", width / 2)
                            .attr("cy", function (i) { return x0(d[i]); })
                            .style("opacity", 1e-6)
                            .transition()
                            .duration(duration)
                            .attr("cy", function (i) { return x1(d[i]); })
                            .style("opacity", 1);

                        outlier.transition()
                            .duration(duration)
                            .attr("cy", function (i) { return x1(d[i]); })
                            .style("opacity", 1);

                        outlier.exit().transition()
                            .duration(duration)
                            .attr("cy", function (i) { return x1(d[i]); })
                            .style("opacity", 1e-6)
                            .remove();

                        // Compute the tick format.
                        var format = tickFormat || x1.tickFormat(8);

                        // Update box ticks.
                        var boxTick = g.selectAll("text.box")
                            .data(quartileData);
                        if (showLabels == true) {
                            boxTick.enter().append("text")
                                .attr("class", "box")
                                .attr("dy", ".3em")
                                .attr("dx", function (d, i) { return i & 1 ? 6 : -6 })
                                .attr("x", function (d, i) { return i & 1 ? + width : 0 })
                                .attr("y", x0)
                                .attr("text-anchor", function (d, i) { return i & 1 ? "start" : "end"; })
                                .text(format)
                                .transition()
                                .duration(duration)
                                .attr("y", x1);
                        }

                        boxTick.transition()
                            .duration(duration)
                            .text(format)
                            .attr("y", x1);

                        // Update whisker ticks. These are handled separately from the box
                        // ticks because they may or may not exist, and we want don't want
                        // to join box ticks pre-transition with whisker ticks post-.
                        var whiskerTick = g.selectAll("text.whisker")
                            .data(whiskerData || []);
                        if (showLabels == true) {
                            whiskerTick.enter().append("text")
                                .attr("class", "whisker")
                                .attr("dy", ".3em")
                                .attr("dx", 6)
                                .attr("x", width)
                                .attr("y", x0)
                                .text(format)
                                .style("opacity", 1e-6)
                                .transition()
                                .duration(duration)
                                .attr("y", x1)
                                .style("opacity", 1);
                        }
                        whiskerTick.transition()
                            .duration(duration)
                            .text(format)
                            .attr("y", x1)
                            .style("opacity", 1);

                        whiskerTick.exit().transition()
                            .duration(duration)
                            .attr("y", x1)
                            .style("opacity", 1e-6)
                            .remove();
                    });
                    d3.timer.flush();
                }

                box.width = function (x) {
                    if (!arguments.length) return width;
                    width = x;
                    return box;
                };

                box.height = function (x) {
                    if (!arguments.length) return height;
                    height = x;
                    return box;
                };

                box.tickFormat = function (x) {
                    if (!arguments.length) return tickFormat;
                    tickFormat = x;
                    return box;
                };

                box.duration = function (x) {
                    if (!arguments.length) return duration;
                    duration = x;
                    return box;
                };

                box.domain = function (x) {
                    if (!arguments.length) return domain;
                    domain = x == null ? x : d3.functor(x);
                    return box;
                };

                box.value = function (x) {
                    if (!arguments.length) return value;
                    value = x;
                    return box;
                };

                box.whiskers = function (x) {
                    if (!arguments.length) return whiskers;
                    whiskers = x;
                    return box;
                };

                box.showLabels = function (x) {
                    if (!arguments.length) return showLabels;
                    showLabels = x;
                    return box;
                };

                box.quartiles = function (x) {
                    if (!arguments.length) return quartiles;
                    quartiles = x;
                    return box;
                };

                return box;
            };

            function boxWhiskers(d) {
                return [0, d.length - 1];
            }

            function boxQuartiles(d) {
                return [
                    d3.quantile(d, .25),
                    d3.quantile(d, .5),
                    d3.quantile(d, .75)
                ];
            }

        });
    </script>


    <script src="/lib/jquery/jquery.min.js"></script>
    <script src="/lib/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
</body>

</html>