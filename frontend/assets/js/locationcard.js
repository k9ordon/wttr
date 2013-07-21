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
}