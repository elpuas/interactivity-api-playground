/**
 * WordPress dependencies
 */
import { store, getContext } from '@wordpress/interactivity';

store( 'elpuasdigitalcrafts', {
	actions: {
		toggle: () => {
			const context = getContext();
			context.isOpen = ! context.isOpen;
		},
		logId: () => {
			const { post } = getContext();
			console.log( `Post ID: ${ post.id }` );
		},
		printed: () => {
			const { postTitle } = getContext();
			const parentDiv = document.querySelector('.printed');
			const postDiv = document.createElement('div');

			postDiv.textContent = `You are in: ${ postTitle.title } Post`;
			parentDiv.appendChild(postDiv);
		}
	},
	callbacks: {
		logIsOpen: () => {
			const { isOpen } = getContext();
			// Log the value of `isOpen` each time it changes.
			console.log( `Is open: ${ isOpen }` );
		},
	},
} );
