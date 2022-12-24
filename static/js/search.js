function filterSearch() {
	$('.searchResult').html('<div id="loading">Loading .....</div>');

	var action = 'fetch_data';
	var category = getFilterData('category');
	var type = getFilterData('type');
	var destination = getFilterData('destination');
    var level = getFilterData('level');
	var season = getFilterData('season');

	$.ajax({
		url:"action.php",
		method:"POST",
		dataType: "json",		
		data:{action:action, category:category, type:type, destination:destination, 
                level:level, season:season},
		success:function(data){
			$('.searchResult').html(data.html);
		}
	});
}