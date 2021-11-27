
export default {
    data () {
        return {
            access_to_menu : ""
        }
    },       
    created() {    
         this.validateGodMenu() 
    },
    methods: {
        validateGodMenu () {            
        this.$http.get('/validate-god-menu').then(function(response) {
            this.access_to_menu = response.body
        }, function() {
            this.$toasted.global.APP_GENERAR_ERROR()
        })
    }
    }
}