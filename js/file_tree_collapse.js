$(document).ready(function() {
	// FILE TREE
	// Find list items representing folders and turn them
	// into links that can expand/collapse the tree leaf.
	$('ul#file_tree li.folder').each(function(i) {
		// Temporarily decouple the child list, wrap the
		// remaining text in an anchor, then reattach it.
		var sub_ul = $(this).children().remove();
		$(this).wrapInner('<a/>').find('a').click(function(e) {
			// Make the anchor toggle the leaf display.
			sub_ul.slideToggle('fast');
		});
		$(this).append(sub_ul);
	});

	// Hide all lists except the outermost.
	$('ul#file_tree ul').hide();
	
	$('#collapse_all').click(function(){
		var text = $(this).text();
		$(this).text(text == "Collapse All" ? "Uncollapse All" : "Collapse All");
		if(text == 'Collapse All'){
			$('ul#file_tree ul').hide('fast');
		} else {
			$('ul#file_tree ul').show('fast');
		}
	});
	
});