const app = new Vue(
    {
        el: '#app',
        data: {
            products: [],
            api: 'server.php',
            cartData: '',     
            showedProducts:[],
            cartGoods:[],
            cookie:'',
            userInfo: {},
        },
        methods: {
            fetchProducts(url){
                return fetch(url)
                    .then(answer => answer.json())
                    .catch(error => console.log(error));
            },
            fetchCart(){
                return fetch(`cart.php?${this.cookie}`)
                    .then(answer => answer.json())
                    .catch(error => console.log(error))
                    .then(data => this.cartGoods=[...data]);
            },            
            filterGoods(searchLine){
                if (searchLine) {
                    this.showedProducts = this.products.filter(value => value.product_name.toLowerCase().includes(searchLine))
                } else {
                    this.showedProducts = this.products;
                }
            },
            addProduct(id,value,cookie){
                if(!this.cookie){
                    return alert('Please register!');
                }
                console.log(value);
                if(!value){
                    console.log('YES');
                    fetch(`cart.php?id=${id}&${cookie}`)
                    .then(answer =>answer.json())
                    .catch(error => console.log(error))
                    .then(data => this.cartGoods=[...data]);
                } else {
                    console.log('NO');
                    fetch(`cart.php?id=${id}&count=${value}&${cookie}`)
                    .then(answer =>answer.json())
                    .catch(error => console.log(error))
                    .then(data => this.cartGoods=[...data]);
                }
                
            },
            deleteItem(id){
                fetch(`cart.php?id=${id}&delete=1&${this.cookie}`)
                .then(answer =>answer.json())
                .catch(error => console.log(error))
                .then(data => this.cartGoods=[...data]);
            },
            createCookie(data){
                this.cookie = data;
                console.log('23e12qedaf')
            },
            async register(name,password,register,userName,e){
                e.preventDefault();
                await jQuery.ajax({
                    type: "POST",
                    url: 'login.php',
                    dataType: "json",
                    data: {functionname: 'registerUser', arguments: [name,password,register,userName]},
                    success: function(data) {
                        console.log(data);
                    },
                    error: function(data) {
                        console.log(data);
                    },
                })
                this.fetchUser();
                this.fetchCart();
            },
            fetchUser(){
                if(document.cookie){
                    this.cookie = document.cookie;
                    return fetch(`login.php?${document.cookie}&fetchUser=1`)
                        .then(answer => answer.json())
                        .catch(error => console.log(error))
                        .then(data => this.userInfo=data[0]);
                }

            }
        },
        mounted() {
            this.fetchProducts(this.api)
                .then(data => {
                    this.products = [...data];
                    this.showedProducts = this.products;

                });
                this.fetchUser();
                this.fetchCart();
                
        },
    }   
)