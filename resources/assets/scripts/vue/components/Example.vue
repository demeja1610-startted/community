<template>
    <div class="text-color" v-resize="onResize">
        <div v-if="isActive" class="toggle-component">TOGGLE COMPONENT</div>
        <p>{{size}}</p>
        <button @click.prevent="clickEvent">Кликни</button>
    </div>
</template>

<script>
import resize from 'vue-resize-directive'
import {mapActions, mapState} from 'vuex';

export default {
    name: "Example",
    directives: {
        resize
    },
    data: () => ({
        isActive: false
    }),
    mounted() {
        console.log('mounted')
    },
    computed: {
        ...mapState('common', {
            size: 'windowSize'
        })
    },
    methods: {
        ...mapActions({
            windowSize: 'common/windowSize',
        }),

        clickEvent() {
            this.isActive = !this.isActive
        },
        onResize() {
            this.windowSize(window.innerWidth)
        }
    }
}
</script>

<style lang="scss" scoped>
.text-color {
    color: black;
}
</style>
