<template>
    <div class="d-flex flex-row align-center">
        <v-btn
        class="mx-2"
        v-on:click="$emit('decrement-quantity');"
        v-bind:disabled="count<2"
        fab
        dark
        small>
            <v-icon dark>
                mdi-minus
            </v-icon>
        </v-btn>
        <v-btn
        class="mx-2"
        v-on:click="$emit('increment-quantity');"
        fab
        dark
        small
        color="primary"
        >
            <v-icon dark>
                mdi-plus
            </v-icon>
        </v-btn>

        <v-text-field
        v-model="count"
        class="mx-2 col-3 pt-7"
        id="quantity"
        name="quantity"
        dense
        height="40"
        type="number"
        rounded outlined
        min="1"
        readonly
        >
        </v-text-field>
    </div>
</template>

<script>
    export default {
        props: ['quantity'],
        data: function() {
            return {
                count: this.quantity
            }
        },
        watch: {
            quantity: function(val){
                this.count = val;
            }
        },
        mounted(){
            setTimeout(() => {
                this.count = this.quantity
            }, 500)
        }
    }
</script>
