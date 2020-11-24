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
            userOrders: {},
        },
        methods: {
            fetchProducts(url){
                return fetch(url)
                    .then(answer => answer.json())
                    .catch(error => console.log(error));
            },
            fetchCart(){
                return fetch(`cart.php?userId=${this.userInfo.id}`)
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
                    fetch(`cart.php?id=${id}&${cookie}&userId=${this.userInfo.id}`)
                    .then(answer =>answer.json())
                    .catch(error => console.log(error))
                    .then(data => this.cartGoods=[...data]);
                } else {
                    fetch(`cart.php?id=${id}&count=${value}&${cookie}&userId=${this.userInfo.id}`)
                    .then(answer =>answer.json())
                    .catch(error => console.log(error))
                    .then(data => this.cartGoods=[...data]);
                }
                
            },
            deleteItem(id){
                fetch(`cart.php?id=${id}&delete=1&${this.cookie}&userId=${this.userInfo.id}`)
                .then(answer =>answer.json())
                .catch(error => console.log(error))
                .then(data => this.cartGoods=[...data]);
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
                await this.fetchUser();
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
            },
            async quitUser(){
                await fetch(`login.php?fetchUser=0&name=${this.userInfo.user_name}`)
                    .then(answer => answer)
                    .catch(error => console.log(error))
                    .then(data => console.log(data));
                    
                    this.userInfo = this.cartGoods = this.cookie = document.cookie = '';
            },
            async placeOrder(adress){
                if(!adress){
                    return alert('Укажите адрес');
                }
                await fetch(`orders.php?userId=${this.userInfo.id}&adress=${adress}`)
                    .then(answer => answer)
                    .catch(error => console.log(error))
                    .then(data => console.log(data));

                    this.cartGoods = '';
                    this.fetchOrders();
                    this.fetchCart();
            },
            fetchOrders(){
                fetch(`orders.php?userId=${this.userInfo.id}`)
                .then(answer => answer.json())
                .catch(error => console.log(error))
                .then(data => console.log(data));
 
            }
        },
        async mounted() {
            this.fetchProducts(this.api)
                .then(data => {
                    this.products = [...data];
                    this.showedProducts = this.products;

                });
                await this.fetchUser();
                await this.fetchCart();
                this.fetchOrders();
        },
    }   
)