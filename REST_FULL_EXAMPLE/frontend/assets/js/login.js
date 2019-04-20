new Vue({
    el: '#app',
    data() {
        return {
            email: '',
            password: '',
            status: false,
            msg: ''
        }
    },

    mounted() {        
    },
    methods: {
        login () {            
            axios
                .post('http://localhost:8080/api/login', {email: this.email, password: this.password})
                .then(response => (
                    this.status = response.data.status,
                    (this.status == true) ? window.location = "page_after_login.html" : this.msg = 'Login failed!'                                     
                    )                    
                )             
                .catch(function (error) {
                    console.log(error);
                })
            
        }
    }
})