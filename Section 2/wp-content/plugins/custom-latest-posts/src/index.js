import { registerBlockType } from '@wordpress/blocks';
import Edit from "./edit";
import View from "./view";

registerBlockType('custom-latest-posts/my-custom-block', {
	title: 'Custom Latest Posts',
	icon: 'smiley',
	category: 'widgets',
	attributes: {
		postCount: {
			type: 'number',
			default: 5,
		},
	},

	edit: Edit,

	save() {
		return null;
	},

	view: View
});
