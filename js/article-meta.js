function articleChooser(state) {
	jQuery("#article-meta-wrap :input").prop( { disabled: !state } );
	var articleWrap = jQuery("#article-meta-wrap");
	if (state) 
		articleWrap.css( { "visibility": "visible", "height": "" } );
	else
		articleWrap.css( { "visibility": "hidden", "height": "0" } );
}

function addTraitBox(button, type) {
	if (button.parentNode.childElementCount <= 5) {
		var inputDiv = '<div><input class="form-input-tip" type="text" /><button type="button" class="button" onclick="removeTraitBox(this);"><b>-</b></button></div>';
		jQuery(button).parent().append(inputDiv).children().last().children().first().attr("name", type + "[]");
	}
}
function removeTraitBox(button) {
	jQuery(button).parent().remove();
}

jQuery(document).ready( function() {
	jQuery('#release-date').datepicker({showAnim: 'slideDown', dateFormat: 'yy-mm-dd'});
});