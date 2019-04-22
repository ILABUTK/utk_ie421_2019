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
            email: 'user1',
            photos: [],
            user_profile_photo: ''
        }
    },

    mounted() { 
        this.getCompanies() 
        this.getProfile()      
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
        },
        getProfile() { //demo of getting an image path from db.
            axios
                .post('http://localhost:8080/api/profile', { email: this.email})
                .then(response => (
                    photos = response.data.profile,
                    console.log(photos[0].photo),
                    this.user_profile_photo = 'http://127.0.0.1:5500/frontend/images/' + photos[0].photo
                )
                )
                .catch(function (error) {
                    console.log(error);
                })

        }
    }
})