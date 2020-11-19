const app = new Vue(
    {
        el: '#app',
        data: {
            products: [],
            api: 'server.php',
            cartData: '',     
            showedProducts:[],
            cartGoods:[],
        },
        methods: {
            fetchProducts(url){
                return fetch(url)
                    .then(answer => answer.json())
                    .catch(error => console.log(error));
            },
            fetchCart(){
                return fetch("cart.php")
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
            addProduct(id,value=0){
                if(!value){
                    fetch(`cart.php?id=${id}`)
                    .then(answer =>answer.json())
                    .catch(error => console.log(error))
                    .then(data => this.cartGoods=[...data]);
                } else {
                    fetch(`cart.php?id=${id}&count=${value}`)
                    .then(answer =>answer.json())
                    .catch(error => console.log(error))
                    .then(data => this.cartGoods=[...data]);
                }
                
            },
            deleteItem(id){
                fetch(`cart.php?id=${id}&delete=1`)
                .then(answer =>answer.json())
                .catch(error => console.log(error))
                .then(data => this.cartGoods=[...data]);
            },
        },
        mounted() {
            this.fetchProducts(this.api)
                .then(data => {
                    this.products = [...data];
                    this.showedProducts = this.products;

                });
                this.fetchCart();
        },
    }   
)