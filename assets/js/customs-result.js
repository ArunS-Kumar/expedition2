
jQuery(function($) {

	"use strict";

	/**
	 * Range Slider
	*/
	 
	$("#price_range").ionRangeSlider({
		grid: true, 
		type: "single", 
		min: 150, 
		max: 2000,
		from: 250, 
		to: 800, 
		prefix: "$",
	});
	
		$("#days_range").ionRangeSlider({
		grid: true, 
		type: "single", 
		min: 5, 
		max: 20,
		from: 5, 
		to: 14, 
		prefix: "",
	});
	
		$("#budjet_range").ionRangeSlider({
		grid: true, 
		type: "single", 
		min: 1200, 
		max: 4000,
		from: 2200, 
		to: 3000, 
		prefix: "",
	});
	
	
	$("#star_range").ionRangeSlider({
		type: "single",
		grid: false,
		from: 1,
		to: 1,
		values: [

			"<i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i>", 
			"<i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i>",
			"<i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i>" 
		]
	});

	
	/**
	 * Input Spinner
	*/
	$(".form-spin").TouchSpin({
		buttondown_class: 'btn btn-spinner-down',
		buttonup_class: 'btn btn-spinner-up',
		buttondown_txt: '<i class="ion-minus"></i>',
		buttonup_txt: '<i class="ion-plus"></i>'
	});
	
	
	/**
	 * Tokenfield for Bootstrap
	 * http://sliptree.github.io/bootstrap-tokenfield/
	*/
	 
	$('.tokenfield').tokenfield()
	// Autocomplete Tagging
	var engine = new Bloodhound({
		local: [{value: 'Paris'}, {value: 'London'}, {value: 'Bangkok'} , {value: 'Bali'}, {value: 'Hongkong'}, {value: 'Rome'}, {value: 'Dubai'}, {value: 'Cairo'}, {value: 'Istanbul'}],
		datumTokenizer: function(d) {
			return Bloodhound.tokenizers.whitespace(d.value);
		},
		queryTokenizer: Bloodhound.tokenizers.whitespace
	});
	engine.initialize();
	$('#autocompleteTagging').tokenfield({
		typeahead: [null, { source: engine.ttAdapter() }],
		limit: '5',
	});
	
		$('#autocompleteTagging1').tokenfield({
		typeahead: [null, { source: engine.ttAdapter() }],
		limit: '1000',
	});
		$('#autocompleteTagging2').tokenfield({
		typeahead: [null, { source: engine.ttAdapter() }],
		limit: '1000',
	});
		$('#autocompleteTagging3').tokenfield({
		typeahead: [null, { source: engine.ttAdapter() }],
		limit: '1000',
	});
	
			$('#autocompleteTagging4').tokenfield({
		typeahead: [null, { source: engine.ttAdapter() }],
		limit: '1000',
	});
				$('#autocompleteTagging5').tokenfield({
		typeahead: [null, { source: engine.ttAdapter() }],
		limit: '1000',
	});
});

