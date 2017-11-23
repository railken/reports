<template>
    <div class='content' v-if='report'> 
        <div class='fluid'>
            <div class='text-left'>
                <h4>{{ report.project_name }}</h4>
            </div>
            <div class='fill'></div>
            <div class='text-right'>
                <img :src='report.project_icon' height='64'><br>
            </div>
        </div>
        <br>
        <div v-html='report.description'></div>
        <div v-for='bug, key in report.bugs'>
            <h5>Bug #{{ key+1 }}</h5>
            <p>
                <b>Type</b> <br>
                {{ bug.type }}
            </p>
            <p>
                <b>Description</b> <br>
                <div v-html='bug.description' class='description'></div>
            </p>
            <hr>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                report: null,
            };
        },
        methods: {
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

    .fluid {
        display: flex;
    }

    .fill {
        flex-grow: 1;
    }

    .description img {
        max-width: 100%;
        display: block;
    }
</style>
