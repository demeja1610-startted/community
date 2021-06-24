export default {
    namespaced: true,
    state: {
        windowSize: null,
    },

    mutations: {
        setWindowSize: (state, payLoad) => {
            console.log(payLoad)
            state.windowSize = payLoad;
        }
    },

    actions: {
        windowSize({commit}, size) {
            commit('setWindowSize', size);
        }
    },
    getters: {
        windowSize: s => s.windowSize
    }
}
