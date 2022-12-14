<template>
    <p>{{ message }}</p>
    <div class="header">
        <button :class="{ activeButton: regActive }" v-on:click="swapActive">Registration</button>
        <button :class="{ activeButton: authActive }" v-on:click="swapActive">Authorization</button>
    </div>
</template>
<script>
export default {
    data() {
        return {
            regActive: true,
            authActive: false,
            message: 'hello word!'
        }
    },
    methods: {
        swapActive() {
            this.regActive = !this.regActive;
            this.authActive = !this.authActive;
        },
    }
}
</script>
