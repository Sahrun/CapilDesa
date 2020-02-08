<template>
    <div class="row">
        <div class="col-sm-12 col-md-5">
            <div class="dataTables_info" id="multi-filter-select_info" role="status" 
            aria-live="polite">Showing <b>{{((filter.page * filter.show) + 1)}}</b> to <b>{{((filter.page * filter.show)) + filter.count_page}}</b> of <b>{{filter.count}}</b> entries</div>
        </div>
        <div class="col-sm-12 col-md-7">
            <div class="dataTables_paginate paging_simple_numbers" id="multi-filter-select_paginate">
                <ul class="pagination">
                    <li class="paginate_button page-item previous" v-bind:class="[filter.page <= 0 ? 'disabled' : '']"
                     id="multi-filter-select_previous"><a href="#" aria-controls="multi-filter-select" 
                     data-dt-idx="0" tabindex="0" class="page-link" @click="OnPage(filter.page - 1)"
                     >Previous</a></li>
                    <li  v-for="(x, i)  in filter.pages " :key="i" 
                        class="paginate_button page-item" v-bind:class="[filter.page == i ? 'active' : '']">
                        <a aria-controls="multi-filter-select" data-dt-idx="1" tabindex="0" class="page-link" @click="OnPage(i)">
                        {{x}}
                        </a>
                        </li>
                    <li class="paginate_button page-item next" 
                    id="multi-filter-select_next" v-bind:class="[filter.pages <= (filter.page + 1) ? 'disabled' : '']"><a href="#" 
                    aria-controls="multi-filter-select" data-dt-idx="8" tabindex="0" class="page-link" @click="OnPage(filter.page + 1)">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['filter'],
        methods: {
            OnPage(page){
                this.filter.page=page;
                this.$parent.loadData();
            }

        },
    }
</script>