export default {

    state: {

        newOrder:0,

    },

    getters: {
    },

    mutations: {
        incementNewOrder(state) {
            return state.newOrder++
        },
        decementNewOrder(state) {
            return state.newOrder--
        }
    },
}
