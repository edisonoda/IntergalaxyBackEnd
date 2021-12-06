<template>
    <div class="text-center">
        <v-dialog
        v-model="dialog"
        width="500"
        >
        <template v-slot:activator="{ on, attrs }">
            <v-btn
            color="red"
            dark
            v-bind="attrs"
            v-on="on"
            >
            {{buttonText}}
            </v-btn>
        </template>

        <v-card>
            <v-card-title class="text-h5">
            Importante!
            </v-card-title>

            <v-card-text class="text-body-1 mt-5">
            Tem certeza que deseja realizar esta ação? Ela é irreversível.
            </v-card-text>

            <v-divider class="my-0"></v-divider>

            <v-card-actions>
                <v-btn
                    text
                    @click="dialog = false"
                >
                    Voltar
                </v-btn>
                <v-spacer></v-spacer>
                <form method="POST" v-bind:action=action>
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" v-bind:value="csrfToken">
                    <input type="hidden" name="id" v-bind:value=routeParam>
                    <v-btn
                        color="primary"
                        type="submit"
                    >
                        Continuar
                    </v-btn>
                </form>
            </v-card-actions>
        </v-card>
        </v-dialog>
    </div>
</template>

<script>
    export default {
        props:['buttonText', 'action', 'csrfToken', 'routeParam'],
        data () {
            return {
            dialog: false,
            }
        },
    }
</script>