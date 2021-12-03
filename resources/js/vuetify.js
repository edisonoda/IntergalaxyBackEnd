import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
Vue.use(Vuetify)

export default new Vuetify({
    theme: {
        defaultTheme: 'dark',
        themes: {
            dark: {
                background: '#ffffff',
                accent: '#8c9eff',
                surface: '#FFFFFF',
                primary: '#6200EE',
                'primary-darken-1': '#3700B3',
                secondary: '#03DAC6',
                'secondary-darken-1': '#018786',
                error: '#B00020',
                info: '#2196F3',
                success: '#4CAF50',
                warning: '#FB8C00',
            },
        },
    },
})