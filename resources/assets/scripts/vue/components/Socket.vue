<template>
    <div>
        Socket test Component
        <textarea name="" id="" cols="30" rows="10">{{ messages.join('\n') }}</textarea>
        <input type="text" @keyup.enter="sendMessage" v-model="textMessage">
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "Socket",
    data: () => ({
        messages: [],
        textMessage: '',
    }),
    mounted() {
        window.Echo.channel('socket-channel')
            .listen('Message', ({message}) => {
                console.log(message)
                this.messages.push(message)
            })
    },
    methods: {
        sendMessage() {
            axios.post('/messages', {body: this.textMessage})
            // this.messages.push(this.textMessage)
            this.textMessage = '';
        }
    }
}
</script>

<style scoped>

</style>
