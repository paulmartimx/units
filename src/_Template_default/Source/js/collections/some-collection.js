/*jshint esversion: 6 */

const SomeCollection = Vue.extend({

	mixins: [BaseCollection],
	
	data: function() {
		return {
			
			all: [],
						
			model: 'model',
			collection: 'all',
			
			create_fields: {
				title: 'Nuevo',
				fields: {
					example: {
						title: 'Example',
						type: 'text',
						required: true
					}
				}
			},		

			sortables: [
				{field: 'example', name: 'Some filter'},
				{field: 'created_at', name: 'Por fecha de creación'},
			],

			filters: [
				{field: 'active', type:'=', value: true, name: 'Sólo activos'},
				{field: 'active', type:'=', value: false, name: 'Sólo inactivos'}				
			],

			order_by: 'created_at',
			sort: 'ASC',
			filter: null
			
		};
	}	
});

export { SomeCollection };