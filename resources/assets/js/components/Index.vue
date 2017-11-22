<template>
    <div class='content text-center'>
    	<h3>Crea un nuovo report</h3>
    	<br><br>
        <div class='btn btn-primary' v-on:click='create()'>Crea</div>
    </div>
</template>

<script>
	import axios from 'axios';
    export default {
        methods: {
        	create() {
        		var self = this;
        		axios.post('/api/v1/reports')
			    .then(response => {
                	self.$router.push({ name: 'update', params: {hash: response.data.resource.hash}});
			    })
			    .catch(e => {
			      
			    })

        	}
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style>
	.content {
		padding: 20px;
	}
</style>
