<template>
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="dataTables_length" id="multi-filter-select_length">
                <label>Show
                    <select name="multi-filter-select_length" @change="Show"
                            aria-controls="multi-filter-select" 
                            class="form-control form-control-sm"
                            v-model="filter.show">
                        <option v-for="(row, index) in showList" :key="index" v-bind:value="row">{{row}}</option>
                    </select> entries</label>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="dataTables_filter">
                <button class="btn btn-icon btn-primary btn-round btn-sm"
                        @click="filter.showFilter = !filter.showFilter"
                        title="filter">
						<i class="fa fa-filter"></i>
				</button>
                <!-- <label>Search:
                    <input type="search" 
                    class="form-control form-control-sm"
                    placeholder="" aria-controls="multi-filter-select"
                    v-model="filter.search">
                </label> -->
            </div>
        </div>
    </div>
</template>
<script>
    import config from './../halper/config'
    export default {
        props: ['filter'],
        data() {
        return {
              showList:config.Grid.show,
            }
        },
        methods: {
            Show() {
                this.filter.page = 0;
               this.$parent.loadData();
            }
        },
    }
</script>