<template>
    <div class="input-field col s12">
        <select v-on:change="updateInput($event.target.value)">
            <option value="" disabled selected>Seleziona un'opzione</option>
            <option v-for='option in options' :value='option.value' >{{ option.label }}</option>
        </select>

    </div>
</template>

<script>
import $ from 'jquery'

export default {
   
    props: [ 'options' , 'value'],
    mounted: function() {
        var self = this;

        $(this.$el).find("select").material_select();
        $(this.$el).on('change', function(e) {

            self.$emit('input', e.target.value);
        })

        console.log(this.value);
    },
    methods: {
        updateInput(val) {
        }
    },
    beforeDestroy: function() {
        $(this.$el).find("select").material_select('destroy');
    }
}
</script>