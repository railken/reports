<template>
    <div class="container">
        <div class='card'><router-view></router-view></div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

 <style>
    .text-center {
        text-align: center;
    }
    .container {
        max-width: 1024px;
        margin: 50px auto;
    }

    body {
        background-color: rgb(82, 86, 89);
        color: var(--primary-text-color);
    }

    .card {
        
         box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
    }
</style>