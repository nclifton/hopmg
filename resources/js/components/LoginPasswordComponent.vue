<template>
    <div class="input-group">
        <input id="password"
               :type="passwordType"
               class="form-control"
               :name="passwordFieldName"
               required
               :placeholder="placeholder"
               :aria-placeholder="placeholder"
        >
        <div class="input-group-append">
            <button class="btn btn-link form-control" type="button" @click="showPassword = !showPassword">{{ showLabel }}</button>
        </div>

    </div>
</template>

<script>


    export default {
        name: "LoginPasswordComponent",
        props:{
            showPasswordText:{
                type: String,
                default: 'show'
            },
            hidePasswordText: {
                type: String,
                default: 'hide'
            },
            passwordFieldName: {
                type: String,
                default: 'password'
            },
            placeholder: {
                type:String,
                default: 'PASSWORD'
            }
        },
        data() {
            return {
                showPassword: false
            }
        },
        computed:{
            passwordType(){
                return this.showPassword ? 'text': 'password';
            },
            showLabel(){
                return this.showPassword ? this.hidePasswordText : this.showPasswordText;
            }

        },

    }
</script>

<style scoped>

</style>