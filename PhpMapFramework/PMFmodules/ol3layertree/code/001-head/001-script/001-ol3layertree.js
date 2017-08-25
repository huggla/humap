function bindInputs(layerid, layer)
{
	var visibilityInput = $(layerid + ' input.visible');
	visibilityInput.on('change', function()
	{
		layer.setVisible(this.checked);
	});
	visibilityInput.prop('checked', layer.getVisible());
	$.each(['opacity', 'hue', 'saturation', 'contrast', 'brightness'], function(i, v)
	{
		var input = $(layerid + ' input.' + v);
		input.on('input change', function() 
		{
			layer.set(v, parseFloat(this.value));
		});
		input.val(String(layer.get(v)));
	});
}