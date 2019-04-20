new Vue({
    el: '#app',
    data() {
        return {
            company: [
                {
                    'name': 'Google',
                    'address': '123 Google Rd.'
                },
                {
                    'name': 'Apple',
                    'address': '100 Apple Rd.'
                }
            ],
            contact: [],
            demo_image_url: 'https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500'
        }
    },

    mounted() { 
        this.getCompanies()       
    },
    methods: {
        getCompanies () {            
            axios
                .get('http://localhost:8080/api/contact')
                .then(response => (
                    this.contact = response.data.data
                    // console.log(this.contact)                                    
                    )
                )             
                .catch(function (error) {
                    console.log(error)
                })            
        }
    }
})