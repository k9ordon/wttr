/* Load this script using conditional IE comments if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'meteocons\'">' + entity + '</span>' + html;
	}
	var icons = {
			'icon-sun' : '&#xe000;',
			'icon-moon' : '&#xe001;',
			'icon-cloudy' : '&#xe002;',
			'icon-cloud' : '&#xe003;',
			'icon-rainy' : '&#xe004;',
			'icon-lightning' : '&#xe005;',
			'icon-cloud-2' : '&#xe006;',
			'icon-weather' : '&#xe007;',
			'icon-Celsius' : '&#xe008;'
		},
		els = document.getElementsByTagName('*'),
		i, attr, html, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		attr = el.getAttribute('data-icon');
		if (attr) {
			addIcon(el, attr);
		}
		c = el.className;
		c = c.match(/icon-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
};