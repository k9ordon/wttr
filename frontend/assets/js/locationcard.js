var locationCard = function() {
		this.$hourForeacast = document.querySelector('.hourForeacast');

		this.$hourChart = document.querySelector('.hourForeacast .hourChart');
		this.$forecastChart = document.querySelector('#forecast .forecastChart');

		this.$hours = document.querySelectorAll('.hour');
		this.$days = document.querySelectorAll('.day.hasData');

	},
	p = locationCard.prototype;

p.init = function() {
	this.createChart();
	this.events();
	console.log([this.$hourChart, this.$forecastChart]);
	return this;
}

p.events = function() {
	var p = this;
	for(var i = 0; i < this.$days.length; i++) {
		this.$days[i].addEventListener('mouseover', function() {
			p.setHoursScroll(this.getAttribute('data-ts'), this);
		});
	}

	this.$hourForeacast.addEventListener('scroll', function() {
		p.hoursOnScroll(this.scrollLeft - 50);
	});
}

p.hoursOnScroll = function(offsetLeft) {
	for(var i = 0; i < this.$hours.length; i++) {
		var $hour = this.$hours[i];

		if($hour.offsetLeft >= offsetLeft) {
			
			// get day
			for(var i = 0; i < this.$days.length; i++) {
				if(this.$days[i].getAttribute('data-ts') == $hour.getAttribute('data-ts'))
					this.$days[i].classList.add('active');
				else
					this.$days[i].classList.remove('active');
			}

			return true;
		}
	}
}

p.setHoursScroll = function(queryts, $activeEl) {
	document.body.scrollTop = 300;
	
	for(var i = 0; i < this.$hours.length; i++) {
		var ts = this.$hours[i].getAttribute('data-ts');
		if(ts >= queryts) return this.$hourForeacast.scrollLeft = this.$hours[i].offsetLeft;
	}
}

p.createChart = function() {
	this.createhourChart();
	//this.createForecastChart();	
}

p.createhourChart = function() {
	//this.$hourChart.style.width = window.innerWidth * 0.1428 * 39;

	var c = new Charts.LineChart(this.$hourChart, {
		show_grid: false,
	  	label_max: false,
  		label_min: false,
		show_y_labels: false,
		show_x_labels: false,
		y_axis_scale: [0, 30],
		x_padding: 0,
		y_padding: 5
	});

    c.add_line({
      data: hourChartData.temp,
      options: {
	    line_color: "#FFE545",
	    dot_color: "yellow",
	    area_color: "#FFE545",//"230-#FC913A-#FFE545-#EDE574",
	    area_opacity: 0,
	    dot_size: 0,
	    line_width: 2	  
	}
    });

    c.add_line({
      data: hourChartData.rain,
      options: {
	    line_color: "#81A8B8",
	    dot_color: "#F8C48B",
	    area_color: "#81A8B8",//"230-#81A8B8-#A4BCC2-#C2CBCE-#DBE6EC-#E8F3F8",
	    area_opacity: 0.8,
	    dot_size: 0,
	    line_width: 1
	  }
    });

    c.add_line({
      data: hourChartData.clouds,
      options: {
	    line_color: "rgba(255, 255, 255, 1)",
	    dot_color: "#999999",
	    area_color: "#999999",//"230-#81A8B8-#A4BCC2-#C2CBCE-#DBE6EC-#E8F3F8",
	    area_opacity: 0.3,
	    dot_size: 0,
	    line_width: 0 
	  }
    });

    c.draw();
}


p.createForecastChart = function() {

	this.$forecastChart.style.width = window.innerWidth;

	var c = new Charts.LineChart(this.$forecastChart, {
		show_grid: false,
	  	label_max: false,
  		label_min: false,
		show_y_labels: false,
		show_x_labels: false,
		y_axis_scale: [-1, 30],
		x_padding: 0,
		y_padding: 0
	});

    c.add_line({
      data: [[1,11], [2,10], [3,20], [4,11], [5,10], [6,25], [7,25]],
      options: {
	    line_color: "rgba(255, 255, 255, 0.5)",
	    //dot_color: "yellow",
	    area_color: "#FFE545",//"230-#88c9dd-rgba(255,255,255,0)",
	    area_opacity: 0.9,
	    dot_size: 0,
	    line_width: 1
	  }
    });

    c.add_line({
      data: [[1,30], [2,0], [3,0], [4,0], [5,10], [6,0], [7,0]],
      options: {
	    line_color: "rgba(255, 255, 255, 0.5)",
	    //dot_color: "#F8C48B",
	    area_color: "#81A8B8",//"230-#88c9dd-rgba(255,255,255,0)",
	    area_opacity: 0.9,
	    dot_size: 0,
	    line_width: 1 
	  }
    });
/*
    c.add_line({
      data: [[3.7,30],[3.9,30]],
      options: {
	    line_color: "red",
	    dot_color: "red",
	    area_color: "red",//"230-#88c9dd-rgba(255,255,255,0)",
	    area_opacity: 0.1,
	    dot_size: 0,
	    line_width: 0 
	  }
    });
*/
    c.draw();

}