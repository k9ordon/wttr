var locationCard = function() {
		this.$el = document.querySelector('.dayCard');
		this.$chart = document.querySelector('.dayCard .dayChart');
	},
	p = locationCard.prototype;

p.init = function() {
	this.createChart();
	this.events();
	return this;
}

p.events = function() {
	this.$el.addEventListener('click', function() {
		console.log('yolo');
	});
}

p.createChart = function() {

	var c = new Charts.LineChart(this.$chart, {
		show_grid: false,
	  	label_max: false,
  		label_min: false,
		show_y_labels: false,
		show_x_labels: false,
		y_axis_scale: [-1, 30],
		x_padding: 50,
		y_padding: 0
	});

    c.add_line({
      data: [[1,14], [2,11], [3,10], [4,11], [5,16], [6,25], [7,25]],
      options: {
	    line_color: "yellow",
	    dot_color: "yellow",
	    area_color: "#F8C48B",//"230-#88c9dd-rgba(255,255,255,0)",
	    area_opacity: 0,
	    dot_size: 4,
	    line_width: 2
	  }
    });

    c.add_line({
      data: [[1,0], [2,10], [3,25], [4,20], [5,10], [6,0], [7,0]],
      options: {
	    line_color: "#ffffff",
	    //dot_color: "#F8C48B",
	    area_color: "#ffffff",//"230-#88c9dd-rgba(255,255,255,0)",
	    area_opacity: 0.2,
	    dot_size: 0,
	    line_width: 0 
	  }
    });

    c.draw();

}