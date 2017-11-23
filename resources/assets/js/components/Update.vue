<template>
    <div class='content' v-if='report'> 
    	<h3 class='text-center'>Modifica il report corrente</h3>
    	<br>
        <input type='text' v-model='report.project_name' placeholder='Nome del progetto'>
        <input type='text' v-model='report.project_icon' placeholder='Icona del progetto'>
        <input type='text' v-model='report.team_name' placeholder='Nome del team'>
        <input type='text' v-model='report.team_icon' placeholder='Icona del team'>
        <textarea v-model='report.description' class="materialize-textarea" placeholder='Descrizione'></textarea>
        
        <div v-for='bug, key in report.bugs'>
            <h5>Bug #{{ key+1 }}</h5>
            <select-materialize v-model='report.bugs[key].type' :options="types" :value='report.bugs[key].type'></select-materialize>
            <textarea v-model='report.bugs[key].description' class="materialize-textarea" placeholder='Descrizione'></textarea>
            <button class='btn btn-danger' v-on:click="report.bugs.splice(key, 1)">Rimuovi</button>
            <hr>
            <br>
        </div>
        <button class='btn btn-primary' v-on:click="report.bugs.push({description: '', type: ''})">Aggiungi bug</button>
        <br><br>
        <div class='btn btn-primary' v-on:click='update()'>Aggiorna</div>
        <router-link class='btn btn-primary' :to="{ name: 'show', params: { hash: report.hash }}">Visualizza</router-link>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                types: [
                    { 
                        label: 'Low (e.g. wording, navigation, graphic)',
                        value: 'Low'
                    },
                    { 
                        label: 'Medium (e.g. form validation, unexpected results)',
                        value: 'Medium'
                    },
                    { 
                        label: 'High (e.g. entire section blocked, security issue)',
                        value: 'High'
                    }
                ],
                report: null,
            };
        },
        methods: {
        	update() {
                axios.put('/api/v1/reports/'+this.report.hash, this.report)
                .then(function(response) {
                    alert('Aggiornato correttamente');
                });
        	}
        },
        mounted() {
            var self = this;
            var hash = this.$route.params.hash;

            axios.get('/api/v1/reports/'+hash)
            .then(response => {
                self.report = response.data.resource;
            })

        }
    }
</script>

<style>
	.content {
		padding: 20px;
	}
</style>
