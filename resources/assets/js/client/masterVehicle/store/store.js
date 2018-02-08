import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)

const state = {
    getData:[
        {id:1, name:'Arbi'},
        {id:2, name:'Timo'},
        {id:3, name:'Yuswa'}
    ],
    division: {}, // perantara data ke dalam GETTERS
    getDataDivision:{} // hasil perantara data dari GETTERS
}

const getters = {
    getDivision : state=>state.division = (
        axios.get('../api/division/getData')
        .then((response) => {
            var data = response.data.division;
            state.getDataDivision = data; // pengeluaran data
        })
    )

}

const mutations = {
}

const actions = {
}

export default new Vuex.Store({
    state,
    getters,
    mutations,
    actions
});