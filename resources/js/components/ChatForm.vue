<template>
    <div class="absolute inset-x-0 bottom-0">
        <input
            id="btn-input"
            type="text"
            name="message"
            class="
                shadow
                appearance-none
                border
                rounded
                w-full
                py-8
                px-3
                text-gray-700
                leading-tight
                focus:outline-none focus:shadow-outline
            "
            placeholder="Type your message here..."
            v-model="newMessage"
            @keyup.enter="sendMessage"
            @keyup="sendTypingEvent"
        />

        <div class="absolute bottom-0 right-0 px-2 pb-5">
            <button
                class="
                    bg-blue-500
                    hover:bg-blue-700
                    text-white
                    font-bold
                    py-2
                    px-4
                    rounded-full
                "
                id="btn-chat"
                @click="sendMessage"
            >
                Send
            </button>
        </div>
    </div>
</template>

<script>
export default {
    props: ["user"],
    data() {
        return {
            newMessage: "",
        };
    },
    methods: {
        sendTypingEvent() {
            window.Echo.join("chat").whisper("typing", this.user);
        },
        sendMessage() {
            console.log(this.newMessage);
            this.$emit("messagesent", {
                user: this.user,
                message: this.newMessage,
            });
            this.newMessage = "";
        },
    },
};
</script>
