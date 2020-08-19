<template>
    <div class="d-inline-block mt-2 ml-2">
        <div class="d-inline-block drop-find">
            <input class="d-inline-block" id="find" type="text" v-model="string" @keyup="findString">
            <div class="dropdown-select" v-if="showDrop">
                <ul v-for="item in items">
                    <li v-bind:data-id="item.id" @click="setItem(item)">
                        <div class="drop-line">
                            <div v-for="column in columns" class="find" v-bind:class="column">{{ item[column] }}</div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="d-inline-block">
            <div class="drop-btn" @click="getView"><i class="far fa-search"></i></div>
        </div>
        <div class="d-inline-block">
            <div class="drop-btn" @click="clearSearch"><i class="fas fa-undo"></i></div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        route: String,
        fields: String,
        search: String
    },
    data() {
        return {
            items: [],
            columns: [],
            message: '',
            showDrop: false,
            string: '',
        }
    },
    mounted() {
        this.columns = this.fields.split(',');
        this.string = this.search;
    },
    methods: {
        closePopup() {
            this.$root.$data.nope = false;
        }, findString(e) {
            let route = '/' + this.route + '/find';
            if (e.key === 'Enter') {
                this.getView();
                return false;
            }
            axios.post(route, {'string': this.string, 'columns': this.fields})
                .then((r) => {
                    this.showDrop = true;
                    this.items = r.data;
                });
        }, setItem(item) {
            document.location.href = '/' + this.route + '/' + item.id;
            return false;
        }, getView(){
            document.location.href = '/' + this.route + '/find/' + this.string;
        }, clearSearch() {
            document.location.href = '/' + this.route;
        }
    }
}
</script>
