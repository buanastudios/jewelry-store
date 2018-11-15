$(function(){
/*
     * Flot Interactive Chart
     * -----------------------
     */
    // We use an inline data source in the example, usually data would
    // be fetched from a server
    var data = [], totalPoints = 100;

function getRandomData() {

      if (data.length > 0)
        data = data.slice(1);

      // Do a random walk
      while (data.length < totalPoints) {

        var prev = data.length > 0 ? data[data.length - 1] : 50,
            y = prev + Math.random() * 10 - 5;

        if (y < 0) {
          y = 0;
        } else if (y > 100) {
          y = 100;
        }

        data.push(y);
      }

      // Zip the generated y values with the x values
      var res = [];
      var dates = [1196463600000, 1196550000000, 1196636400000, 1196722800000 , 1196809200000,1196895600000,1196982000000,1197068400000,1197154800000, 1197241200000];
      for (var i = 0; i < dates.length; ++i) {
        res.push([dates[i], data[i]]);
      }	  
      return res;
    }

    function getRandomData2() {

      if (data.length > 0)
        data = data.slice(1);

      // Do a random walk
      while (data.length < totalPoints) {

        var prev = data.length > 0 ? data[data.length - 1] : 19,
            y = prev + Math.random() * 2 - 7;

        if (y < 0) {
          y = 0;
        } else if (y > 100) {
          y = 100;
        }

        data.push(y);
      }

      // Zip the generated y values with the x values
      var res = [];
      var dates = [1196463600000, 1196550000000, 1196636400000, 1196722800000 , 1196809200000,1196895600000,1196982000000,1197068400000,1197154800000, 1197241200000];
      for (var i = 0; i < dates.length; ++i) {
        res.push([dates[i], data[i]]);
      }	  
      return res;
    }

	var interactive_plot = $.plot("#cashier_stats", [
		{data:getRandomData(),label:"Cashier 1",lines: {fill: false,color: "#3c8dbc"}},
		{data:getRandomData2(),label:"Cashier 2",lines: {fill: true,color: "#fff0ff"}}
		],
	{		
      grid: {
        borderColor: "#f3f3f3",
        borderWidth: 1,
        tickColor: "#f3f3f3"
      },
      yaxis: {
        min: 0,
        max: 100,
        show: true
      },
      xaxis: {
      	mode: "time",
		tickLength: 5,
        show: true
      }
    });

    var updateInterval = 100; //Fetch data ever x milliseconds
    var realtime = "on"; //If == to on then fetch data every x seconds. else stop fetching
    function update() {

      interactive_plot.setData([{data:getRandomData(),label:"Cashier 1",lines: {fill: true,color: "#3c8dbc"}},
		{data:getRandomData2(),label:"Cashier 2",lines: {fill: true,color: "#fff0ff"}}]);

      // Since the axes don't change, we don't need to call plot.setupGrid()
      interactive_plot.draw();
      if (realtime === "on")
        setTimeout(update, updateInterval);
    }

    //INITIALIZE REALTIME DATA FETCHING
    if (realtime === "on") {
      update();
    }	
});