/*jshint esversion: 6 */

const SomeModel = Vue.component('some-model', {

	template: `
    <div>
    </div>
	`,

	mixins: [BaseModel],
    props: ['model'],
	
	data: function() {
		return {
			model: 'model',
			loading: false,
		};
	},

	computed: {
		// 
	},

	methods: {
        // 
	}
});

export { SomeModel };