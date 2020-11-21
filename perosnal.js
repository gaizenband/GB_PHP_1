Vue.component('personal-link',{
    props:['register', 'cookie','userinfo'],
    data(){
        return {
            isVisiblePersonal: false,
            name:'',
            password:'',
            registerCheck:'',
            userName:'',
        }
    },
    template: ` <div class="link">
                    <button class="buy-btn personal-link" @click='isVisiblePersonal = !isVisiblePersonal'>Личный кабинет</button>
                    <div class="personal-info" v-if='isVisiblePersonal'>
                        <form action='#' method="POST" class="access" v-if="!cookie">
                            <p>Login:</p>
                                <input type='text' v-model="name" required>
                            <p>Password:</p>
                                <input type='password' v-model="password" required>
                            <div class='register'>
                                <p>Register:</p>
                                    <input type='checkbox' v-model="registerCheck">
                            </div>
                            <div>
                                <p>Your name:</p>
                                    <input type='text' v-model='userName' placeholder='optional'>
                            </div>
                            <input type='submit' @click='$emit("register",name,password,registerCheck,userName,$event)'>
                        </form>
                        <div class="info" v-if="cookie">
                            <p>Wellcome {{userinfo.first_name? userinfo.first_name:userinfo.user_name}}</p>
                        
                        </div>
                    </div>
                </div>
`
})
