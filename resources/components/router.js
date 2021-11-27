import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default new Router({
    mode: 'history',
    base: process.env.BASE_URL,
    routes: [
      /**Rutas para usuarios */
        {
          path: '/users',
          name: 'users',
          component: require('./users/Index')        
        },

      /**Rutas para Dashboarsd */
        {
          path: '/dashboard',
          name: 'dashboard',
          component: require('./home/Dashboard')        
        },   
        {
          path: '/me',
          name: 'me',
          component: require('./home/Me')        
        },         
      /**Rutas para mantenedor de Profesionales */
        {
          path: '/teachers',
          name: 'teachers',
          component: require('./teachers/Index')        
        },
      /**Rutas para mantenedor de Apoderados */
        {
          path: '/attorneis',
          name: 'attorneis',
          component: require('./attorneis/Index')        
        },
      /**Rutas para mantenedor de Apoderados */
        {
          path: '/alumns',
          name: 'alumns',
          component: require('./alumns/Index')        
        },
        /**Rutas para mantenedor de Talleres */
        {
          path: '/courses',
          name: 'courses',
          component: require('./courses/Index')        
        },
      /**Rutas para mantenedor de Calendario de agendas */
        {
          path: '/schedules',
          name: 'schedules',
          component: require('./schedules/Schedule')        
        },
    ]
   
  })