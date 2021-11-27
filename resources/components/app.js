require('./bootstrap')
/**
 * Inicio con Vue
 *  */
    window.Vue = require('vue')
    window.VueResource = require('vue-resource')
/**
 * Para modales dinamicos
 */
    import VModal from 'vue-js-modal' 
    Vue.use(VModal)
    Vue.use(VModal, { dialog: true })

 /**
 * Para la aplicaón de formatos numericos. Moneda.
 */
    import VueCurrencyFilter from 'vue-currency-filter'
    Vue.use(VueCurrencyFilter,
    {
        symbol : '$',
        thousandsSeparator: '.',
        fractionCount: 0,
        fractionSeparator: '',
        symbolPosition: 'front',
        symbolSpacing: true
    })

/**
 * Para uso de toast en alertas
 */
    // register the plugin on vue
    import Toasted from 'vue-toasted';

    Vue.use(Toasted)

/** 
 * Para creación de tablas en index de mantenedores
*/
    import {ServerTable, ClientTable, Event} from 'vue-tables-2';
    Vue.use(ClientTable, {}, false, 'bootstrap4');
/**
 * Para validación y formato de rut
 */
    import { rutValidator, rutFilter, rutInputDirective } from 'vue-dni';
    Vue.directive('rut', rutInputDirective);


/** Uso de vue-route para el enrutamiento de vistas 
 * con esto pretendo quitar el trabajo a los controladores
 * de laravel sobre las tareas de ruteo de vistas.
 * */
    
    

    Vue.component('app', require('./main/AppComponent'))   
    Vue.component('app-nav', require('./main/AppNavComponent')) 
    Vue.component('app-menu-mobile', require('./main/AppMenuMobile')) 
    Vue.component('app-menu-web', require('./main/AppMenuWeb')) 
    Vue.component('dash-admin', require('./home/DashboardAdmin')) 
    Vue.component('dash-teacher', require('./home/DashboardTeacher')) 
    Vue.component('dash-alumn', require('./home/DashboardAlumn')) 
/**
 * Para el uso de Vue Router
 */
    import router from './router'        
    const app = new Vue({
        router,
        el: '#app',
    })