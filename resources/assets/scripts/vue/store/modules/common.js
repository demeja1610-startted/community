export default {
    namespaced: true,
    state: {
        windowSize: null,
    },

    mutations: {
        setWindowSize: (state, payLoad) => {
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
