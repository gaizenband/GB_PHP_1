Vue.component('header-comp',{
    props:['cartitems','addproduct','products','deleteitem', 'cookie'],
    template: ` <div class="head">
                    <h1>Shop</h1>
                    <div class="head_content">
                        <search></search>
                        <cart :products = 'products' :cartitems = 'cartitems' :addproduct='addproduct' :deleteitem='deleteitem' :cookie='cookie'></cart>
                    </div>
                </div>
`
})


Vue.component('search',{
    data(){
        return {
            searchLine:'',
        }
    },
    template: `
    <div class="find_content">
        <input type="text" v-model='searchLine'  @input='$parent.$emit("filtergoods", searchLine)' placeholder='Найти товар...'>
    </div>
    `
})

Vue.component('cart',{
    props:['cartitems','addproduct', 'products','deleteitem', 'cookie'],
    data(){
        return {
            isVisibleCart: false,
        }
    },
    methods: {
        calculateCart() {
            let totalPrice = null;
            this.cartitems.forEach(el => {
                totalPrice += el.count * this.products.find(elem => elem.id == el.id_item).price
            });
            return totalPrice;
        },
        getName(id){
            return this.products.find(el => el.id == id).product_name;
        },
        getPrice(id){
            return this.products.find(el => el.id == id).price;
        },
    },
    template: `
    <div class="cart_content">
        <button class="btn-cart" type="button" @click='isVisibleCart = !isVisibleCart'>Корзина</button>
        <div class="cart" v-if='isVisibleCart'>
            <p v-if='!cookie'>Please register with button below</p>
            <p v-if='!cartitems.length && cookie'>Пусто</p>
            <div class='cart_item' v-for="item of cartitems" :key='item.id_item'>
                <div class='cart_item_info'>
                    <p class='cart_item_name'>{{getName(item.id_item)}}</p>
                    Количество:<input type='number' class='cart_item_count' @input='$parent.$emit("addproduct",item.id_item,$event.target.value,cookie)' :value='item.count'> 
                    <p class='cart_item_price'>Стоимость: {{item.count * getPrice(item.id_item)}}</p>
                </div>
                <button @click='$parent.$emit("deleteitem",item.id_item)'>Удалить</button>
            </div>
            <p v-if='cartitems.length'>Итого: {{calculateCart()}}</p>
        </div>
    </div>
    `
})
