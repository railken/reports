import Vue from 'vue'
import VueRouter from 'vue-router'
import Main from './components/Main'
import Index from './components/Index';
import Show from './components/Show';
import Update from './components/Update';


export default new VueRouter({
	routes: [
		{
			path: '/',
			component: Main,
			children: [	
				{
					path: '',
					name: 'index',
					component: Index
				},
				{
					path: '/:hash/edit',
					name: 'update',
					component: Update
				},
				{
					path: '/:hash/show',
					name: 'show',
					component: Show
				}
			]
		}
	],
	hashbang: false,
	mode: 'history'
});

Vue.use(VueRouter);