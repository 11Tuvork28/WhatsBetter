<template>
    <div class="grid grid-cols-4 h-full">
        <div class="relative col-span-1">
            <div class="inset-x-0 top-0 border border-black h-full">
                <div class="border border-yellow-900">Search</div>
                chats
            </div>
        </div>
        <div class="relative col-span-3 border border-black h-full">
            <div class="border border-yellow-900">User info</div>
            <div class="h-5/6">
                <div v-for="msg in messages" :key="msg">
                    {{ message }}
                </div>
            </div>
            <ChatForm :user="props.user" />
        </div>
    </div>
</template>

<script lang="js">
import * as vue from 'vue';
import ChatForm from './ChatForm.vue'
export default {
    props: ["user"],
    components: {
        ChatForm
    },
    setup(props){
        const users = vue.ref([]);
        const messages = vue.ref([]);
        vue.onMounted(() => {window.Echo.join('chat')
            .here(users => {
                users = users;
            })
            .joining(user => {
                users.value.push(user);
            })
            .leaving(user => {
                users = users.value.filter(u => u.id !== user.id);
            })
            .listenForWhisper('typing', ({id, name}) => {
                users.value.forEach((user, index) => {
                    if (user.id === id) {
                        user.typing = true;
                        users.value.set(index, user);
                    }
                });
            })
            .listen('MessageSent', (event) => {
                messages.value.push({
                    message: event.message.message,
                    user: event.user
                });

                users.value.forEach((user, index) => {
                    if (user.id === event.user.id) {
                        user.typing = false;
                         users.value.set(index, user);
                    }
                });
            });})
            function fetchMessages() {
                axios.get('/messages').then(response => {
                    messages.value = response.data;
                });
            }

            function addMessage(message) {
                messages.value.push(message);
                axios.post('/messages', message).then(response => {
                        console.log(response.data);
                });
            }
            return{
                users,
                messages,
                addMessage,
                fetchMessages,
                props
            }
    }
}
</script>
<style lang="scss"></style>
