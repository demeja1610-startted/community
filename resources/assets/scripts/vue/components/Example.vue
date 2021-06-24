<template>
    <div class="text-color" v-resize="onResize">
        <p>{{ size }}</p>
        {{ someVar }}
        <button @click.prevent="changeVar">Click</button>
        <br>
        -------------------------------------------------
        <div v-if="values" v-for="(value, index) in values" :key="index">
            <Test :value="value"/>
        </div>
    </div>
</template>

<script>
import resize from 'vue-resize-directive'
import {mapActions, mapState} from 'vuex';
import Test from "./Test";

export default {
    name: "Example",
    components: {Test},
    directives: {
        resize
    },
    data: () => ({
        isActive: false,
        someVar: '123'
    }),
    props: {
        values: null,
    },
    mounted() {
        console.log(this.values)
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
        },

        changeVar() {
            this.someVar = 321;
        }
    }
}
</script>

<style lang="scss" scoped>
.text-color {
    color: black;
}
</style>
