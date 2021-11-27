<template>      
  <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li :class="active_menu.dashboard" @click="activeMenu('dashboard')">
                            <a data-toggle="tab"  class="main-menu" href="#Dashboard">
                                <img src="images/fondos/LOGO1.png" height="40" width="40"> Mi After
                            </a>
                        </li>
                        <li  v-if="allowed.d_admin.status" :class="active_menu.class"  @click="activeMenu('class')">
                            <a data-toggle="tab"  class="main-menu" href="#Classes">
                                <img src="images/calendario.png" height="29" width="29"> Clases
                            </a>
                        </li>
                         <li v-if="allowed.d_admin.status" :class="active_menu.modules"  @click="activeMenu('modules')">
                            <a data-toggle="tab"  class="main-menu" href="#Modules">
                                <img src="images/modules.png" height="29" width="29"> Módulos</a>
                        </li>
                    </ul>
                    <div class="tab-content custom-menu-content">
                        <div id="Dashboard" :class="active_menu.dashboard" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li >
                                    <router-link to="/dashboard">
                                       Dashboard 
                                    </router-link>                                 
                                </li>  
                                <li >
                                    <router-link to="/me">
                                       Mi perfil 
                                    </router-link>                                 
                                </li>                            
                            </ul>
                        </div>
                        <div id="Classes" :class="active_menu.class" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li>
                                    <router-link to="/schedules">
                                       Calendario
                                    </router-link>                                 
                                </li>                                                           
                            </ul>
                        </div>
                        <div id="Modules" :class="active_menu.modules"  class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li>
                                    <router-link to="/users">
                                       Usuarios
                                    </router-link>                                    
                                </li>
                                <li>
                                    <router-link to="/teachers">
                                       Profesionales
                                    </router-link>                                    
                                </li>
                                <li>
                                    <router-link to="/attorneis">
                                       Apoderados
                                    </router-link>                                    
                                </li>
                                <li>
                                    <router-link to="/alumns">
                                       Aprendices
                                    </router-link>                                    
                                </li>    
                                <li>
                                    <router-link to="/courses">
                                       Talleres
                                    </router-link>                                    
                                </li>                                
                            </ul>
                        </div>                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import Util from '../mixins/Util.js'
    export default {
        mixins: [Util],
        data () {
            return {               
            }
        },       
        created() {
        },
        methods: {
        
        }
    }
</script>
