<template>      
  <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <li><a data-toggle="collapse" data-target="#home" href="#">Inicio</a>
                                    <ul id="home" class="collapse dropdown-header-top">
                                       
                                        <li >
                                            <router-link to="/dashboard">
                                            Dashboard 
                                            </router-link>                                 
                                        </li>   
                                       
                                    </ul>
                                </li>


                                <li><a data-toggle="collapse" data-target="#class" href="#">Clases</a>
                                    <ul id="class" class="collapse dropdown-header-top">                                       
                                        <li>
                                            <router-link to="/schedules">
                                                Calendario
                                            </router-link>                                 
                                        </li>   
                                    </ul>
                                </li>

                                <li><a data-toggle="collapse" data-target="#mods" href="#">Módulos</a>
                                    <ul id="mods" class="collapse dropdown-header-top">
                                        <li>
                                            <router-link to="/users">
                                            Usuarios
                                            </router-link>                                    
                                        </li>
                                        <li>
                                            <router-link to="/teachers">
                                            Docentes
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
                                        
                                    </ul>
                                </li>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'create-request',
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
<style>