<template>
    <div class="text-color">
        <transition name="fade">
            <div v-if="isActive" class="toggle-component">TOGGLE COMPONENT</div>
        </transition>

        <p>{{ size }}</p>
        <button @click.prevent="clickEvent">Кликни</button>
    </div>
</template>

<script>
import resize from 'vue-resize-directive'
import {mapState} from 'vuex';

export default {
    name: "Example2",
    directives: {
        resize
    },
    data: () => ({
        isActive: false
    }),
    computed: {
        ...mapState('common', {
            size: 'windowSize'
        })
    },
    methods: {
        clickEvent() {
            this.isActive = !this.isActive
        },
    }
}
</script>

<style lang="scss">
.text-color {
    color: darkgreen;
    border: 1px solid black;
    padding: 15px;
}

.fade-enter-active, .fade-leave-active {
    transition: opacity .5s;
}

.fade-enter, .fade-leave-to /* .fade-leave-active до версии 2.1.8 */
{
    opacity: 0;
}
</style>
