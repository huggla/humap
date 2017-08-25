var sheet = (function() {
	// Create the <style> tag
	var style = document.createElement("style");

	// Add a media (and/or media query) here if you'd like!
	// style.setAttribute("media", "screen")
	// style.setAttribute("media", "only screen and (max-width : 1024px)")

	// WebKit hack :(
	style.appendChild(document.createTextNode(""));

	// Add the <style> element to the page
	document.head.appendChild(style);

	return style.sheet;
})();
var layerCount=0;
function layertreeBind(map)
{
	map.getLayers().forEach(function(layer)
	{
		bindInputs('#layer' + layerCount, layer);
		layerCount++;
		if (layer instanceof ol.layer.Group)
		{
			layertreeBind(layer);
		}
	});
}
layertreeBind(map);


